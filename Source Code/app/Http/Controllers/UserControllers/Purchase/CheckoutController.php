<?php

namespace App\Http\Controllers\UserControllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Purchase;
use App\Models\PurchasedPhones;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->with('phones')->get();
// Initialize the sums
        $totalQuantity = 0;
        $totalPrice = 0;

// Calculate the sum of all quantity and price rows
        foreach ($items as $item) {
            $totalQuantity += $item->quantity;
            $totalPrice += $item->quantity * $item->phones->price;
        }
        $totalPrice = number_format($totalPrice);
        if ($totalQuantity == 0) {
            return redirect()->back()->with('error_msg', 'No product available in cart to checkout.');
        }
        return view('UserViews.Purchase.checkout', compact('items', 'totalQuantity', 'totalPrice'));
    }

    public function saveCheckout(Request $request)
    {
        $user = Auth::user();
        $items = Cart::where('user_id', $user->id)->with('phones')->get();

        $totalPrice = 0;
        $itemUnavailable = false;
        foreach ($items as $item) {
            if ($item->phones->status != "Available") {
                session(['global_error' => 'The item (ID: ' . $item->phones->id . ") is not available to purchase. Kindly remove it from cart and try again!"]);
                $itemUnavailable = true;
                break;
            }
            $totalPrice = $totalPrice + $item->phones->price;
        }

        if ($itemUnavailable) {
            return false;
        }

        $purchase = Purchase::create([
            'user_id' => auth()->user()->id, // Assuming the user is authenticated
            'recivers_name' => $request->recivers_name,
            'recivers_email' => $request->recivers_email,
            'recivers_phone' => $request->recivers_phone,
            'recivers_address' => $request->recivers_address,
            'recivers_city' => $request->recivers_city,
            'recivers_zip_code' => $request->recivers_zip_code,
            // 'delivery_option' => $request->delivery_option,
            'delivery_option' => "Default",
            'total_price' => $totalPrice,
        ]);

        if (!$purchase) {
            return false;
        }

        foreach ($items as $item) {

            $purchasedPhone = PurchasedPhones::create([
                'user_id' => auth()->user()->id,
                'phone_id' => $item->phones->id,
                'purchase_id' => $purchase->id,
                'status' => 'ordered',
            ]);

            if (!$purchasedPhone) {
                // Rollback the transaction if a purchased phone cannot be created
                $purchase->delete();
                return false;
            }

            $seller = $item->phones->user;
            $seller->onhold = $seller->onhold ? ($seller->onhold + $item->phones->price) : ($item->phones->price);
            $seller->save();

        }

        return $purchase;
    }

}
