<?php

namespace App\Http\Controllers\UserControllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Stripe;

class WalletController extends Controller
{

    public function deposit(Request $request)
    {

        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = $request->user();
        $amount = $request->input('amount'); // Amount in cents

        try {

            $token = $request->input('stripeToken');

            // Create a customer in Stripe
            $customer = \Stripe\Customer::create([
                'name' => $user->first_name . " " . $user->last_name,
                'email' => $user->email,
                'source' => $token,
            ]);
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $amount * 100,
                'currency' => 'PKR',
                'description' => 'Wallet Deposit',
            ]);

            if ($charge) {

                $user->balance += $amount;
                $user->save();
                // log the transaction
                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $amount,
                    'transaction_type' => 'deposit',
                    'status' => 'success',
                    'transaction_id' => $charge->id,
                ]);

                return redirect()->back()->with('success', 'Money deposited successfully!');
            } else {
                // log the failed transaction
                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $amount / 100,
                    'transaction_type' => 'deposit',
                    'status' => 'failed',
                    // No transaction id for failed transactions
                ]);

                return redirect()->back()->with('error_msg', 'Deposit failed!');
            }

        } catch (Exception $ex) {
            Log::error('Error: ' . $ex->getMessage());
            return back()->with('error', $ex->getMessage());
        }
    }

    public function history(Request $request)
    {
        $user = $request->user();
        $transactions = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('UserViews.Wallet.wallet', ['transactions' => $transactions]);
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'withdrawMethod'=>'required',
        ]);

        $user = $request->user();
        $amount = $request->input('amount');

        if ($user->balance < $amount) {
            return back()->with('error_msg', 'Insufficient balance!');
        }
        // Check for any pending withdraw transactions
        $pendingTransactions = Transaction::where('user_id', $user->id)
            ->where('transaction_type', 'withdraw')
            ->where('status', 'pending')
            ->get();

        $pendingAmount = 0;
        if (!$pendingTransactions->isEmpty()) {
            $pendingAmount = $pendingTransactions->sum('amount');
        }

        $updatedBalance = $user->balance - $pendingAmount;

        if ($updatedBalance < $amount) {
            return back()->with('error_msg', 'Insufficient balance considering pending withdrawals!');
        }

        $transaction_id = 'Khas_' . Str::random(19);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'transaction_type' => 'withdraw',
            'status' => 'pending',
            'method' => $request->withdrawMethod,
            'transaction_id' => $transaction_id,
        ]);

        if ($transaction) {
            return back()->with('success', 'Withdrawal request created!');
        }
    }


}
