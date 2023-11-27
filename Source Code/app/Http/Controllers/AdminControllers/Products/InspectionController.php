<?php

namespace App\Http\Controllers\AdminControllers\Products;

use App\Http\Controllers\Controller;
use App\Mail\PhoneAccepted;
use App\Mail\PhoneRejected;
use App\Models\Admin;
use App\Models\Charges;
use App\Models\Inspection;
use App\Models\Phone;
use App\Models\PurchasedPhones;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InspectionController extends Controller
{

    public function getPhone(Request $request)
    {

        $p_id = $request->product_id;
        if (!empty($p_id)) {

            $phone = Phone::find($p_id);

            if (empty($phone)) {
                return redirect()->route('admin.inspection.add')->with('error_msg', "The phone you are attempting to access is not available.");

            }
            if (!empty($phone->inspection)) {

                return redirect()->route('admin.inspection.add')->with('error_msg', "The phone you are attempting to access is already inspected.");
            }
            if ($phone->status == "Sold") {

                $purchaser = User::find($phone->purchasedPhones[0]->user_id);
                $transaction = Transaction::where('phone_id', $p_id)->where('user_id', $purchaser->id)

                    ->first();
                return view('AdminViews.Product.manage_inspection.add_inspection', compact(['phone', 'purchaser', 'transaction']));
            }
            return redirect()->route('admin.inspection.add')->with('error_msg', "The phone you are attempting to access is not available for inspection as it has not been sold yet.");

        }
    }
    public function deleteInspection()
    {

    }
    public function add(Request $request)
    {

        if (empty($request->id)) {

            return view('AdminViews.Product.manage_inspection.add_inspection');
        }

    }

    public function create(Request $request)
    {

        $request->validate([
            'phone_id' => 'required',
            'status' => 'required',
        ]);

        if (!empty(Inspection::where('phone_id', $request->phone_id)->first())) {
            return redirect()->route('admin.inspection.add')->with('error_msg', "The phone you are attempting to access is already inspected.");

        }
        $validatedData = $request->all();

        $inspection = Inspection::Create(['phone_id' => $request->phone_id, 'inspected_by' => Auth::guard('admin')->user()->id], $validatedData);

        ///Seler Data
        $seller = User::where('email', $request->seller_email)->first();
        $purchaseDetails = PurchasedPhones::where('phone_id', $inspection->phone_id)->first();
        $purchaseDetails->status = "Inspected";
        ///Phone Data
        $phone = Phone::find($inspection->phone_id);
        //Customer Data
        $customer = User::where('email', $request->customer_email)->first();
        $admin = Admin::find($inspection->inspected_by);

        if ($inspection->status == "Rejected") {

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

            $seller->onhold = $seller->onhold - $phone->price;
            $seller->save();

            Mail::to($customer->email)->send(new PhoneRejected($inspection, $customer, $admin, $phone, $purchaseDetails, 'customer'));
            Mail::to($seller->email)->send(new PhoneRejected($inspection, $seller, $admin, $phone, $purchaseDetails, 'seller'));

        } else {
            //Mail::to($customer->email)->send(new PhoneAccepted($inspection, $customer, $admin, $phone, $purchaseDetails, 'customer'));
            Mail::to($seller->email)->send(new PhoneAccepted($inspection, $seller, $admin, $phone, $purchaseDetails, 'seller'));
        }

        return redirect()->route('admin.inspection.add')->with('success', "Inspection Report Updated");

    }

    function list() {

        $inspections = Inspection::all();
        return view('AdminViews.Product.manage_inspection.inspection_report', compact(['inspections']));
    }
    public function getInspections()
    {

    }
    public function editInspection()
    {

    }

}
