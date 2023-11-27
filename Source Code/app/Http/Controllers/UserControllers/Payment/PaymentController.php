<?php

namespace App\Http\Controllers\UserControllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserControllers\Purchase\CheckoutController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        $request->validate([
            'recivers_name' => 'required|string|max:255',
            'recivers_email' => 'required|email',
            'recivers_phone' => 'required|string|max:20',
            'payment_method' => 'required',
            'recivers_address' => 'required|string|max:255',
            'recivers_city' => 'required|string|max:255',
            'recivers_zip_code' => 'required|string|max:10',
            // 'delivery_option' => 'required|string|max:255',
        ]);


        if ($request->payment_method == "wallet") {

            if (intval($request->totalPrice) > intval(Auth::user()->balance)) {
                return redirect()->back()->with('error_msg', 'Insufficeint wallet balance to perform this transaction.');

            }
        }
        $checkoutController = new CheckoutController();
        $checkout = $checkoutController->saveCheckout($request);
        if (!$checkout) {
            return redirect()->back()->with('error_msg', 'Unable to Process the checkout.');
        }
        if ($request->payment_method == "wallet") {
            $transaction_id = 'Khas_' . Str::random(19);

            if ($this->proccessTransactionAndEmails($checkout, $transaction_id, 'Wallet')) {
                return redirect()->route('thankyou')->with('success', 'Payment successful!');

            }
        } else {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $request->input('stripeToken');

            // Create a customer in Stripe
            $customer = \Stripe\Customer::create([
                'name' => Auth::user()->first_name . " " . Auth::user()->last_name,
                'email' => Auth::user()->email,
                'source' => $token,
            ]);

            // Create the charge with the customer ID
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $checkout->total_price * 100,
                'currency' => 'PKR',
                'description' => 'Product Purchase , Customer ID - ' . Auth::user()->id,
            ]);

            // Handle the result of the charge

            if ($charge) {

                if ($this->proccessTransactionAndEmails($checkout, $charge->id, 'Card')) {
                    return redirect()->route('thankyou')->with('success', 'Payment successful!');

                }
            }
        }

        return redirect()->back()->with('error_msg', 'Payment unsuccessful!');

    }

    public function proccessTransactionAndEmails($checkout, $tranID, $method)
    {

        $checkout->stripe_transaction_id = $tranID;
        $checkout->save();

        // Mail::to($checkout->recivers_email)->send(new OrderConfirmation($checkout));

        // Get all items from the cart
        $user = auth()->user();
        $cartItems = $user->cartItems;

        foreach ($cartItems as $item) {

            // Get the phone's user email
            $phone = $item->phones;
            $phoneUser = $phone->user;
            $email = $phoneUser->email;
            if ($method == "Wallet") {

                $user->balance = $user->balance - $phone->price;
                $user->save();
            }
//////////////Transction Data For the Seller
            Transaction::create([
                'user_id' => $phoneUser->id,
                'method' => $method,
                'purchase_id' => $checkout->id,
                'phone_id' => $phone->id,
                'amount' => $phone->price,
                'transaction_type' => 'sold',
                'status' => 'on hold',
                'transaction_id' => $tranID,
            ]);

            ////////Transaction data For the customer
            Transaction::create([
                'user_id' => $user->id,
                'method' => $method,
                'purchase_id' => $checkout->id,
                'phone_id' => $phone->id,
                'amount' => $phone->price,
                'transaction_type' => 'purchase',
                'status' => 'success',
                'transaction_id' => $tranID,
            ]);

            // Send the NewOrder mail to the seller
            //  Mail::to($email)->send(new NewOrder($checkout, $phone, $phoneUser));
            $phone->status = "Sold";
            $phone->save();

        }
        //Make the Cart Empty
        foreach ($cartItems as $item) {
            $item->delete();
        }

        return true;
    }
}










