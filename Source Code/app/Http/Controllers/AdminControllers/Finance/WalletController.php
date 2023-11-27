<?php

namespace App\Http\Controllers\AdminControllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WalletController extends Controller
{
    public function index()
    {
        // Get all withdraw requests
        $withdrawRequests = Transaction::where('transaction_type', 'withdraw')->get();
        // Pass them to the view
        return view('AdminViews.Finance.withdraw_requests', compact('withdrawRequests'));
    }
    public function get_withdraw_requests(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $searchValue = $request->get('search')['value'];
        $orderColumn = $request->get('order')[0]['column'];
        $orderDir = $request->get('order')[0]['dir'];
        $status = $request->get('status');
        $status2 = $request->get('status2');

        $columns = ['transaction_id', 'user_name', 'balance', 'amount', 'status', 'created_at'];

        $query = Transaction::where('transaction_type', 'withdraw')
            ->where(function ($query) use ($status, $status2) {
                $query->where('status', $status)
                    ->orWhere('status', $status2);
            })
            ->with('user')
            ->where(function ($query) use ($searchValue) {
                $query->where('transaction_id', 'like', '%' . $searchValue . '%')
                    ->orWhereHas('user', function ($q) use ($searchValue) {
                        $q->where('first_name', 'like', '%' . $searchValue . '%')
                            ->orWhere('last_name', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere('amount', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', 'like', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'like', '%' . $searchValue . '%');
            });

        $total = $query->count();

        $data = $query->offset($start)
            ->limit($length)
            ->orderBy($columns[$orderColumn], $orderDir)
            ->get()
            ->map(function ($transaction) {
                $transaction->load('payMethod');
                $transaction->load('admin');
                return [
                    'id' => '<a href="#" class="transaction-link" data-transaction=\'' . json_encode($transaction) . '\'>' . $transaction->transaction_id . '</a>', 'user_name' => $transaction->user->first_name . " " . $transaction->user->last_name,
                    'balance' => 'RS ' . $transaction->user->balance,
                    'amount' => 'RS ' . $transaction->amount,
                    'status' => $transaction->status,
                    'created_at' => $transaction->created_at->format('F d, Y h:i A'),
                    'action' => $transaction->status === 'pending' ? '<button class="btn btn-success btn-sm approveBtn" data-transaction-id="' . $transaction->id . '"><i class="bi bi-check2"></i></button> <button class="btn-sm btn btn-danger rejectBtn" data-transaction-id="' . $transaction->id . '"><i class="bi bi-x"></i></button>' : '<button class="btn muted ' . ($transaction->status == 'rejected' ? 'btn-danger' : 'btn-secondary') . ' disabled">' . $transaction->status . '</button>',
                ];
            });

        $recordsFiltered = $searchValue ? $data->count() : $total;

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }

    public function approveWithdraw(Request $request)
    {
        // validate the incoming request
        $validated = $request->validate([
            'password' => 'required',
        ]);

        // validate the provided password
        if (!Hash::check($request->password, Auth::guard('admin')->user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid password.',
            ], 401); // Unauthorized response
        }

        // logic to approve the withdraw
        // here I'm assuming that you're passing the ID of the withdraw transaction as a URL parameter
        $transaction = Transaction::find($request->transaction_id);

        // check if the transaction exists and is a withdraw
        if (!$transaction || $transaction->transaction_type != 'withdraw') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid transaction.',
            ], 404); // Not Found response
        }
        if ($transaction->status == 'paid') {
            return response()->json([
                'success' => false,
                'message' => 'Request already approved!',
            ], 404);
        }

        // approve the withdraw
        $transaction->status = 'paid';
        $transaction->action_by = Auth::guard('admin')->user()->id;
        $transaction->save();

        // deduct the amount from the user's balance
        $user = $transaction->user;
        $user->balance -= $transaction->amount;
        $user->save();

        // return a success response
        return response()->json([
            'success' => true,
            'message' => 'Withdraw approved successfully.',
        ], 200); // OK response
    }
    public function rejectWithdraw(Request $request)
    {
        // validate the incoming request
        $validated = $request->validate([
            'password' => 'required',
        ]);

        // validate the provided password
        if (!Hash::check($request->password, Auth::guard('admin')->user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid password.',
            ], 401); // Unauthorized response
        }

        // logic to approve the withdraw
        // here I'm assuming that you're passing the ID of the withdraw transaction as a URL parameter
        $transaction = Transaction::find($request->transaction_id);

        // check if the transaction exists and is a withdraw
        if (!$transaction || $transaction->transaction_type != 'withdraw') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid transaction.',
            ], 404); // Not Found response
        }
        if ($transaction->status == 'rejected') {
            return response()->json([
                'success' => false,
                'message' => 'Request already rejected!',
            ], 404);
        }

        // approve the withdraw
        $transaction->status = 'rejected';
        $transaction->message = $request->message;
        $transaction->reason = $request->reason;
        $transaction->action_by = Auth::guard('admin')->user()->id;
        $transaction->save();

        // return a success response
        return response()->json([
            'success' => true,
            'message' => 'Withdraw rejected successfully.',
        ], 200); // OK response
    }

    public function allTransactions()
    {

        $transactions = Transaction::all();
        return view('AdminViews.Finance.txn_ledger', compact('transactions'));
    }

}
