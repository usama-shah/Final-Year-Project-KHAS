<?php

namespace App\Http\Controllers\UserControllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Phone;
use Illuminate\Http\Request;

class Home extends Controller
{

    public function index(Request $request)
    {
        $query = Phone::query();
//// Applying category filters
        if ($request->has('category_filters')) {
            $categoryFilters = $request->input('category_filters');
///// Save category filters in session
            session(['category_filters' => $categoryFilters]);
            foreach ($categoryFilters as $filter) {
                $columnName = $filter['name'];
                $columnValue = $filter['value'];

                if (!empty($columnName) && !empty($columnValue)) {
                    if ($columnValue != "all") {

                        $query->where($columnName, $columnValue);
                    }
                }
            }
        }
        //// Applying min and max price filters
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            if (!empty($minPrice)) {
                $query = $query->where('price', '>=', $minPrice);
            }

            if (!empty($maxPrice)) {
                $query = $query->where('price', '<=', $maxPrice);
            }
        }

        ////If user clicks on the caterory in menu
        if (!empty($request->column) && !empty($request->value)) {
            $query->where($request->column, $request->value);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $searchTerms = explode(' ', $search);

            foreach ($searchTerms as $term) {
                $query = $query->where(function ($q) use ($term) {
                    $q->where('title', 'LIKE', '%' . $term . '%')
                        ->orWhere('description', 'LIKE', '%' . $term . '%');
                });
            }
        }

        if ($request->has('sort_date')) {
            if ($request->sort_date == 'newest') {
                $query = $query->orderBy('created_at', 'desc');
            } elseif ($request->sort_date == 'oldest') {
                $query = $query->orderBy('created_at', 'asc');
            }
        }

        if ($request->has('sort_price')) {
            if ($request->sort_price == 'highest') {
                $query = $query->orderBy('price', 'desc');
            } elseif ($request->sort_price == 'lowest') {
                $query = $query->orderBy('price', 'asc');
            }
        }

        $phones = $query->paginate(10);

        // Preserve the filter values in the pagination links
        $phones->appends($request->only(['search', 'sort_date', 'sort_price', 'category_filters']));

        if ($request->ajax()) {
            return response()->json([
                'html' => view('UserViews.Home.phonelist', ['phones' => $phones])->render(),
                'isEmpty' => $phones->isEmpty(),
            ]);
        }

        $brands = Brands::all();
        $categories = Category::all();
        return view('UserViews.Home.home', ['phones' => $phones, 'brands' => $brands, 'categories' => $categories]);
    }

}
