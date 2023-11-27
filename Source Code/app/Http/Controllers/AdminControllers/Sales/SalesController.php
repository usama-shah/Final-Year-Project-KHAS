<?php

namespace App\Http\Controllers\AdminControllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Charges;
use App\Models\PurchasedPhones;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function pending()
    {

        $phones = PurchasedPhones::where('status', 'ordered')->orWhere('status', 'Inspected')->get();
        return view('AdminViews.Sales.pending_sales', compact('phones'));

    }

    public function completed()
    {
        $phones = PurchasedPhones::where('status', 'Delivered')->get();

        return view('AdminViews.Sales.completed_sales', compact('phones'));

    }

    public function failed()
    {
        $phones = PurchasedPhones::where('status', 'Returned')->get();

        return view('AdminViews.Sales.failed_sales',compact('phones'));

    }

    public function updateSale(Request $request)
    {

        $phone = PurchasedPhones::where('phone_id', $request->id)->first();
        if (!empty($phone)) {
            $phone->status = "Delivered";
            $phone->save();
            $charges = (($phone->price * Charges::first()->inspection_fee) / (100));

            $chargedPrice = $phone->phone->price - $charges;
            $user = User::find($phone->phone->user_id);

            $user->onhold = $user->onhold-$phone->phone->price;

            $user->balance = $user->balance + $chargedPrice;
            $user->save();
            return redirect()->back()->with('success', "Sale Status Updated");
        }
        return redirect()->back()->with('error_msg', "Phone Not Found");

    }
}
