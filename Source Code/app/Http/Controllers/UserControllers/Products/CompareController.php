<?php

namespace App\Http\Controllers\UserControllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class CompareController extends Controller
{

    public function index(Request $request)
    {
        $compare = $request->session()->get('compare', []);
        $phones = Phone::findMany($compare);
        return view('UserViews.Product.compare', compact('phones'));
    }

    public function add(Request $request)
    {
        $compare = $request->session()->get('compare', []);
        if (count($compare) >= 3) {

            return response()->json(['message' => 'Can not add more than 3 phones in compare list at a time.'], 400);

        }
        if (in_array($request->phone_id, $compare)) {
            return response()->json(['message' => 'Phone is already in the comparison list!'], 400);
        }

        $compare[] = $request->phone_id;

        $request->session()->put('compare', $compare);

        return response()->json(['message' => 'Phone added to comparison list!'], 200);
    }
    public function remove(Request $request, )
    {
        $compareList = $request->session()->get('compare', []);

        if (($key = array_search($request->id, $compareList)) !== false) {
            unset($compareList[$key]);
        }

        // Re-index the array and save it back to the session
        $compareList = array_values($compareList);
        $request->session()->put('compare', $compareList);
        return redirect()->back()->with('success', 'Phone removed from comparison list!');

    }

}
