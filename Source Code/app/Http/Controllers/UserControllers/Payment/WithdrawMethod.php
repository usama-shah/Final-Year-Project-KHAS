<?php

namespace App\Http\Controllers\UserControllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WithdrawMethod extends Controller
{

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'bank_name' => 'required',
                'account_number' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $paymentMethod = new PaymentMethod;
            $paymentMethod->bank_name = $request->bank_name;
            $paymentMethod->account_number = $request->account_number;
            $paymentMethod->user_id = Auth::id();
            $paymentMethod->save();

            return response()->json([
                'success' => true,
                'data' => $paymentMethod,
                'message' => 'Payment method saved successfully',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function remove(Request $request)
    {

        $pay = PaymentMethod::find($request->id);
        $pay->delete();
        return back()->with('success', "Withdraw Method Removed.");
    }
}
