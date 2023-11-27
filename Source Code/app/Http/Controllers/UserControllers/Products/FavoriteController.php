<?php

namespace App\Http\Controllers\UserControllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites;
        return view('favorites.index', compact('favorites'));
    }

    public function store($id)
    {
        $user = auth()->user();
        if (!$user) {

            return redirect()->route('login');
        }
        $phone = Phone::find($id);

        if ($phone) {
            // Check if the phone is already in the user's favorites
            $existingFavorite = $user->favorites()->where('phone_id', $id)->first();

            if ($existingFavorite) {
                return response()->json(['message' => 'Phone is already in favorites.'], 409);
            }

            // Create a new favorite entry
            $favorite = new Favorite();
            $favorite->user_id = $user->id;
            $favorite->phone_id = $phone->id;
            $favorite->save();

            return response()->json(['message' => 'Phone added to favorites.'], 200);
        }

        return response()->json(['message' => 'Phone not found.'], 404);
    }

    public function destroy(Request $request)
    {
       
        $record = Favorite::find($request->favorite);
        $record->delete();
        return redirect()->back()->with('success', 'Phone removed from favorites.');
    }

}
