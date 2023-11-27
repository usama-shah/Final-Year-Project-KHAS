<?php

namespace App\Http\Controllers\AdminControllers\Products;

use App\Http\Controllers\Controller;
use App\Mail\PhoneReturn;
use App\Models\Charges;
use App\Models\Phone;
use App\Models\PurchasedPhones;
use App\Models\ReturnCompleted;
use App\Models\Returns;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ReturnsController extends Controller
{
    public function add()
    {
        return view('AdminViews.Returns.add_return');

    }

    public function pending()
    {

        $returns = Returns::where('status', 'Pending')->get();
        return view('AdminViews.Returns.pending_returns', compact('returns'));

    }
    public function completed()
    {
        return view('AdminViews.Returns.completed_returns');
    }

    public function updateStatus(Request $request)
    {

        $return = Returns::find($request->id);
        $return->status = $request->status;
        $return->save();

        Mail::to($return->user->email)->send(new PhoneReturn($return));
        return redirect()->back()->with('success', "Return Status Updated");

    }

    public function getPhone(Request $request)
    {

        $p_id = $request->phone_id;
        if (!empty($p_id)) {

            $phone = Phone::find($p_id);

            if (empty($phone)) {
                return redirect()->route('return.add')->with('error_msg', "The phone you are attempting to access is not available.");

            }
            if (count($phone->purchasedPhones) > 0) {

                if ($phone->purchasedPhones[0]->status == "Returned") {

                    return redirect()->route('return.add')->with('error_msg', "The phone you are attempting to access is already returned.");
                }
            }
            if ($phone->status == "Sold") {

                $purchaser = User::find($phone->purchasedPhones[0]->user_id);
                $transaction = Transaction::where('phone_id', $p_id)->where('user_id', $purchaser->id)

                    ->first();
                return view('AdminViews.Returns.add_return', compact(['phone', 'purchaser', 'transaction']));
            }
            return redirect()->route('return.add')->with('error_msg', "The phone you are attempting to access is not available for return as it has not been sold yet.");

        }
    }

    public function saveReturn(Request $request)
    {

        $phone = Phone::find($request->phone_id);
        if (!$phone) {
            return redirect()->route('return.add')->with('error_msg', "Phone not found.");

        }
        $purchaseDetails = PurchasedPhones::where('phone_id', $request->phone_id)->first();
        if ($purchaseDetails) {

            if ($purchaseDetails->status == "Delivered") {
                return redirect()->route('return.add')->with('error_msg', "Cannot return this phone it is already delivered.");
            }

        }

        //Customer Data
        $customer = User::where('email', $purchaseDetails->purchaser->email)->first();
        ///Refunding
        $charges = (($phone->price * Charges::first()->inspection_fee) / (100));

        $customer->balance = $customer->balance + ($phone->price - $charges);

        $customer->save();
        $transaction_id = 'Khas_' . Str::random(19);

        Transaction::create([
            'user_id' => $customer->id,
            'method' => "Wallet",
            'purchase_id' => $purchaseDetails->purchase_id,
            'phone_id' => $phone->id,
            'amount' => $phone->price,
            'transaction_type' => 'refund',
            'status' => 'success',
            'transaction_id' => $transaction_id,
        ]);
        ///Seler Data
        $seller = User::where('email', $phone->user->email)->first();
        $seller->onhold = $seller->onhold - $phone->price;
        $seller->save();
        ///Remove on hold balance

        $purchaseDetails->status = "Returned";
        $purchaseDetails->save();

        $return = new ReturnCompleted();
        $return->user_id = $customer->id;
        $return->phone_id = $phone->id;
        $return->payment = "Refunded";
        $return->status = "Returned";
        $return->return_by = Auth::guard('admin')->user()->id;
        $return->save();

        return redirect()->route('return.add')->with('success', "The product has been returned, and the payment has been successfully refunded to the user's wallet.");

//   Mail::to($customer->email)->send(new PhoneRejected($inspection, $customer, $admin, $phone, $purchaseDetails, 'customer'));
//   Mail::to($seller->email)->send(new PhoneRejected($inspection, $seller, $admin, $phone, $purchaseDetails, 'seller'));

    }

}
