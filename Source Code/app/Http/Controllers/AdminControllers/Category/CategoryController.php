<?php

namespace App\Http\Controllers\AdminControllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory($id = null)
    {

        $category = null;
        if ($id) {
            $category = Category::find($id);
        }
        $categories = Category::whereNull('parent_id')->get();
        return view('AdminViews.Product.manage_categories.add_category', compact('category', 'categories'));
    }
    public function categoryList()
    {
        $categories = Category::whereNull('parent_id')->with('subcategories')->get();
        return view('AdminViews.Product.manage_categories.category_list', compact('categories'));
    }

    public function createCategory(Request $request, $id = null)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',

            ],
            'icon' => 'nullable',
            'parent_id' => 'nullable',
            'column_name' => 'nullable',
            'suffix' => 'nullable',
            'prefix' => 'nullable',
        ]);

        if ($id) {

            // Find the category by its ID
            $category = Category::findOrFail($id);

// Update the category with the validated data
            $category->update($validatedData);
            return redirect()->route('category.list')->with('success', 'Category updated successfully.');

        } else {

            Category::create($validatedData);
            return redirect()->route('category.list')->with('success', 'Category created successfully.');
        }

    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'category not found'], 404);
        }

        // Check for child categorys
        $childcategorys = Category::where('parent_id', $id)->count();
        if ($childcategorys > 0) {
            return response()->json(['error' => 'Cannot delete category with child categories. Please delete child categorys first.'], 400);
        }

        // Delete the category if there are no child categorys
        $category->delete();

        return response()->json(['message' => 'category deleted successfully'], 200);
    }

}
