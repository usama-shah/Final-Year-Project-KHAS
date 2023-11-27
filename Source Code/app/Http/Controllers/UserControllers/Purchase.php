<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Purchase extends Controller
{
    public function cart(){

        return view('UserViews.Purchase.cart');
    }
    public function checkout(){

        return view('UserViews.Purchase.checkout');
    }
}
