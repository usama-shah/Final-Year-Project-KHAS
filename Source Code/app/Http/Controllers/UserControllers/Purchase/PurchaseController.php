<?php

namespace App\Http\Controllers\UserControllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function index()
    {

        // $phones = Phone::where('user_id', Auth::user()->id)->get();
        return view('UserViews.Purchase.purchases');
    }
}
