<?php

namespace App\Http\Controllers\UserControllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        return view('UserViews.Product.cart', compact('items', 'totalQuantity', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_id' => 'required|exists:phones,id',
            // 'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        if(!$user){

            return redirect()->route('login');
        }
        $phone = Phone::find($request->phone_id);
        if ($phone->status != "Available") {

            return response()->json(['message' => 'Item is not available.'], 404);
        }
        // Check if the item already exists in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('phone_id', $request->phone_id)
            ->first();

        if ($cartItem) {

            return response()->json(['message' => 'Item already exist in the cart.'], 404);

        } else {
            // Add a new item to the cart
            Cart::create([
                'user_id' => $user->id,
                'phone_id' => $request->phone_id,
                // 'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Item added to the cart successfully!'], 200);
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $user = Auth::user();
    //     $cartItem = Cart::where('user_id', $user->id)
    //         ->where('id', $id)
    //         ->first();

    //     if (!$cartItem) {
    //         return redirect()->route('cart.index')->withErrors('Item not found in your cart.');
    //     }

    //     $cartItem->quantity = $request->quantity;
    //     $cartItem->save();

    //     return redirect()->route('cart.index')->with('success', 'Item quantity updated successfully!');
    // }

    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$cartItem) {
            // return response()->json(['status' => 'error', 'message' => 'Item not found in your cart.'], 404);
            return redirect()->back()->with('error', "Item not found in cart");

        }

        $cartItem->delete();
        return redirect()->back()->with('success', "Item removed from cart.");

        // return response()->json(['status' => 'success', 'message' => 'Item removed from the cart successfully!'], 200);
    }

}
