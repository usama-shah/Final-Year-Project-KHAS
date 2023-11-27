<?php

namespace App\Http\Controllers\AdminControllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{

    function list() {

        return view('AdminViews.Product.products_list');
    }
    function removedlist() {

        return view('AdminViews.Product.removed_product');
    }

    public function getProducts(Request $request)
    {
        // Get the columns to display
        // $columns = ['id', 'title', 'last_name', 'email', 'banned', 'email_verified_at', 'phone', 'last_login', 'photo'];
        $columns = ['id', 'title', 'user_id', 'created_at', 'main_image', 'deleted_at'];

        $query = Phone::select($columns);



        // Get the total number of records
        $filteredCount = $total = $query->count();

        // Apply search filter if necessary
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $search = $request->input('search')['value'];
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'like', "%{$search}%");
                }
            });
            $filteredCount = $query->count();
        }

        // Apply order if necessary
        if ($request->has('order')) {
            $orderCol = $columns[$request->input('order')[0]['column']];
            $orderDir = $request->input('order')[0]['dir'];
            $query->orderBy($orderCol, $orderDir);
        }

        //Applying Pagination
        $perPage = $request->input('length');
        $page = $request->input('start') / $perPage + 1;

        $query->skip(($page - 1) * $perPage)->take($perPage);

        // Get the records
        $result = $query->get();

        //Modeify the records
        $data = [];

        foreach ($result as $row) {
            $action = '
                <a target="_blank" href="' . route('phones.show', $id = $row->id) . '" class="btn btn-success btn-sm ">
                    <i class="bi bi-eye"></i>
                </a>';
            if ($row->trashed()) {

                $action = $action . ' <button data-id="' . $row->id . '"  class="btn btn-info btn-sm recover_product">
                        <i class="bi bi-arrow-clockwise"></i>
                        </button> ';
            } else {
                $action = $action . ' <button data-id="' . $row->id . '"  class="btn btn-danger btn-sm delete_product">
                <i class="bi bi-trash"></i>
                </button> ';
            }

            $photo = '<img src=' . $row->main_image . ' width="50">';
            // $lastLogin = Carbon::parse($row->last_login)->diffForHumans();
            $data[] = [
                'id' => $row->id,
                'photo' => $photo,
                'title' => $row->title,
                'date' => $row->created_at->format('d/m/Y H:i'),

                'user' => $row->user->first_name . " " . $row->last_name,
                // 'name' => $row->title . " " . $row->last_name,
                // 'email' => $row->email,
                // 'phone' => $row->phone,
                // 'status' => $status,
                // 'last_login' => $lastLogin,
                'action' => $action,
            ];
        }
        // Prepare the response
        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filteredCount,
            'data' => $data,
        ];
        return response()->json($response);

    }
    public function getRemovedProducts(Request $request)
    {
        // Get the columns to display
        // $columns = ['id', 'title', 'last_name', 'email', 'banned', 'email_verified_at', 'phone', 'last_login', 'photo'];
        $columns = ['id', 'title', 'user_id', 'created_at', 'main_image', 'deleted_at'];

        $query = Phone::select($columns)->onlyTrashed();



        // Get the total number of records
        $filteredCount = $total = $query->count();

        // Apply search filter if necessary
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $search = $request->input('search')['value'];
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'like', "%{$search}%");
                }
            });
            $filteredCount = $query->count();
        }

        // Apply order if necessary
        if ($request->has('order')) {
            $orderCol = $columns[$request->input('order')[0]['column']];
            $orderDir = $request->input('order')[0]['dir'];
            $query->orderBy($orderCol, $orderDir);
        }

        //Applying Pagination
        $perPage = $request->input('length');
        $page = $request->input('start') / $perPage + 1;

        $query->skip(($page - 1) * $perPage)->take($perPage);

        // Get the records
        $result = $query->get();

        //Modeify the records
        $data = [];

        foreach ($result as $row) {
            $action = '
                <a target="_blank" href="' . route('phones.show', $id = $row->id) . '" class="btn btn-success btn-sm ">
                    <i class="bi bi-eye"></i>
                </a>';
            if ($row->trashed()) {

                $action = $action . ' <button data-id="' . $row->id . '"  class="btn btn-info btn-sm recover_product">
                        <i class="bi bi-arrow-clockwise"></i>
                        </button> ';
            } else {
                $action = $action . ' <button data-id="' . $row->id . '"  class="btn btn-danger btn-sm delete_product">
                <i class="bi bi-trash"></i>
                </button> ';
            }

            $photo = '<img src=' . $row->main_image . ' width="50">';
            // $lastLogin = Carbon::parse($row->last_login)->diffForHumans();
            $data[] = [
                'id' => $row->id,
                'photo' => $photo,
                'title' => $row->title,
                'date' => $row->created_at->format('d/m/Y H:i'),

                'user' => $row->user->first_name . " " . $row->last_name,
                // 'name' => $row->title . " " . $row->last_name,
                // 'email' => $row->email,
                // 'phone' => $row->phone,
                // 'status' => $status,
                // 'last_login' => $lastLogin,
                'action' => $action,
            ];
        }
        // Prepare the response
        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filteredCount,
            'data' => $data,
        ];
        return response()->json($response);

    }

    public function deleteProduct(Request $request)
    {

        try {
            $phone = Phone::findOrFail($request->product_id);
            // Get the model instance using the provided ID

            // Delete the record
            // $phone->save();
            $phone->delete();

            // Return a success response
            return response()->json([
                'message' => 'Phone deleted successfully',
            ]);
        } catch (\Exception $e) {
            // Return an error response with the exception message
            return response()->json([
                'message' => 'Failed to delete phone',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function recoverProduct(Request $request)
    {
        try {
            $phone = Phone::withTrashed()->findOrFail($request->product_id);
            // Get the model instance using the provided ID, including soft-deleted records

            // Restore the soft-deleted record
            $phone->restore();

            // Return a success response
            return response()->json([
                'message' => 'Phone recovered successfully',
            ]);
        } catch (\Exception $e) {
            // Return an error response with the exception message
            return response()->json([
                'message' => 'Failed to recover phone',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
