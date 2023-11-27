<?php
use App\Models\Permissions;

if (!function_exists('permission')) {
    function permission($id)
    {

        if (auth()->guard('admin')->check()) {
            $adminRole = auth()->guard('admin')->user()->role;
            $permission = Permissions::where('roles_id', $adminRole)
                ->where('sub_modules_id', $id)
                ->first();
            if ($permission && $permission->view) {
                return true;
            }   
        }
        return false;

    }
}
