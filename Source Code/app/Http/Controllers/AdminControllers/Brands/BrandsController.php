<?php

namespace App\Http\Controllers\AdminControllers\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function addBrand($id = null)
    {
        $brand = null;
        if ($id) {
            $brand = Brands::find($id);
        }

        return view('AdminViews.Product.manage_brands.add_brand', compact('brand'));
    }
    public function brandList()
    {
        $brands = Brands::all();
        return view('AdminViews.Product.manage_brands.brand_list', compact('brands'));
    }

    public function createBrand(Request $request, $id = null)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('brands', 'name')->ignore($id),
            ],
            'parent_id' => 'nullable',
        ]);

        if ($id) {

            // Find the brand by its ID
            $brand = Brands::findOrFail($id);

// Update the brand with the validated data
            $brand->update($validatedData);
            return redirect()->route('brand.list')->with('success', 'Brand updated successfully.');

        } else {

            Brands::create($validatedData);
            return redirect()->route('brand.list')->with('success', 'Brand created successfully.');
        }

    }

    public function deleteBrand($id)
    {
        $brand = Brands::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }


        // Delete the brand if there are no child brands
        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully'], 200);
    }

}
