<?php

namespace App\Http\Controllers\AdminControllers\Roles;

use App\Http\Controllers\Controller;
use App\Mail\NewAdminAccount;
use App\Models\Admin;
use App\Models\Modules;
use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\Mailer\Exception\TransportException;

class RolesController extends Controller
{

    public function addAdmin($id = null)
    {
        $role = Roles::all();
        $admin = null;
        if (!empty($id)) {
            $admin = Admin::find($id);
        }
        return view('AdminViews.Roles.assign_roles', compact('role'), compact('admin'));
    }

    public function addRole($id = null)
    {
        $modules = Modules::whereNull('parent_id')->get();
        $role = null;
        if (!empty($id)) {
            $role = Roles::find($id);
        }
        return view('AdminViews.Roles.add_role', compact('modules'), compact('role'));
    }

    public function adminList()
    {
        $admins = DB::table('admins')
            ->leftJoin('roles', 'admins.role', '=', 'roles.id')
            ->select('admins.*', 'roles.role as role_name')
            ->get();

        return view('AdminViews.Roles.admins_list', compact('admins'));
    }
    public function roleList()
    {
        $roles = DB::table('roles')
            ->join('admins', 'roles.created_by', '=', 'admins.id')
            ->select('roles.*', 'admins.name as admin_name')
            ->get();

        return view('AdminViews.Roles.roles_list', compact('roles'));
    }
    public function store(Request $request, $id = null)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore($id),
            ],
            'phone' => 'required|string|min:10|max:15',
            'role' => 'required|string|max:255',
        ]);

        // Generate a random 8-character password

        // Try to find an admin with the given email
        $admin = Admin::find($id);

        $password = Str::random(8);
        // If the admin doesn't exist, create a new one
        if (!$admin) {
            $admin = new Admin;
            $admin->password = Hash::make($password);
        }

        else{
            $admin->password=$admin->password;
        }
// Update the admin's attributes
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');
        $admin->role = $request->input('role');

// Save the admin
        $admin->save();

        // Send an email to the admin with registration details, login page link, and generated password
        $mailData = [
            'admin' => $admin,
            'password' => $password,
        ];

        if(empty($id)){
        try {

            Mail::to($request->input('email'))->send(new NewAdminAccount($mailData));
        } catch (TransportException $e) {

            $admin = Admin::findOrFail($admin->id);
            $admin->delete();
            return redirect()->back()->withErrors([
                'error' => 'Unable To Send Email.Make Sure the Email Exist.',
            ]);
            die();
        }}
        // Redirect to the desired location (e.g., admin list) with a success message
        return redirect()->route('admin.list')->with('admin_status', 'Admin account created successfully and an email has been sent with the login details!');
    }

    public function createRole(Request $request, $id = null)
    {
        // dd($request->all());
        // Validate the form data
        $validatedData = $request->validate([
            'role' => [
                'required',
                'max:255',
                Rule::unique('roles', 'role')->ignore($id),
            ],
            'module_id.*' => 'required|numeric',
            'sub_module_id.*' => 'required|numeric',
            'create.*' => 'nullable|boolean',
            'read.*' => 'nullable|boolean',
            'update.*' => 'nullable|boolean',
            'delete.*' => 'nullable|boolean',
        ]);

        // Create a new role with the given name
        $role = Roles::create(['role' => $validatedData['role'], 'created_by' => Auth::guard('admin')->user()->id]);

        // Loop through each sub_module_id and create a new permission for the role
        foreach ($validatedData['sub_module_id'] as $index => $subModuleId) {
            $permissionData = [
                'roles_id' => $role->id,
                'module_id' => $validatedData['module_id'][$index],
                'sub_modules_id' => $subModuleId,
                'create' => isset($validatedData['create'][$index]) ? $validatedData['create'][$index] : 0,
                'view' => isset($validatedData['read'][$index]) ? $validatedData['read'][$index] : 0,
                'update' => isset($validatedData['update'][$index]) ? $validatedData['update'][$index] : 0,
                'delete' => isset($validatedData['delete'][$index]) ? $validatedData['delete'][$index] : 0,
            ];

            // Create the new permission
            $permission = Permissions::create($permissionData);
        }

        // Redirect the user back to the form with a success message
        return redirect()->back()->with('admin_status', 'Role and permissions have been saved successfully.');
    }
}
