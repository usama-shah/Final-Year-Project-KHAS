<?php

use App\Http\Controllers\AdminControllers\Brands\BrandsController;
use App\Http\Controllers\AdminControllers\Category\CategoryController;
use App\Http\Controllers\AdminControllers\Dashboard\Dashboard;
use App\Http\Controllers\AdminControllers\Finance\WalletController;
use App\Http\Controllers\AdminControllers\ManageUsers\Users;
use App\Http\Controllers\AdminControllers\Modules\ModulesContorller;
use App\Http\Controllers\AdminControllers\Products\InspectionController;
use App\Http\Controllers\AdminControllers\Products\ProductsController;
use App\Http\Controllers\AdminControllers\Products\ReturnsController;
use App\Http\Controllers\AdminControllers\Registration\Login;
use App\Http\Controllers\AdminControllers\Registration\Settings;
use App\Http\Controllers\AdminControllers\Roles\RolesController;
use App\Http\Controllers\AdminControllers\Sales\SalesController;
use Illuminate\Support\Facades\Route;

Route::controller(Login::class)->group(function () {
    Route::get('admin/logout', 'logout')->name('admin.logout');
});
Route::middleware('redirect_if_admin_authenticated')
    ->group(function () {

        Route::controller(Login::class)->group(function () {
            // Route::get('/profile', );
            // Route::get('/wishlist', );
            Route::get('admin', 'login')->name('amdin');
            Route::get('admin/login', 'login')->name('admin.login.view');
            Route::POST('admin/login', 'doLogin')->name('admin.login');
            //  Route::POST('admin/add_admin', 'store')->name('admin.create');
        });
    });
Route::middleware('admin_auth')
    ->prefix('admin')
    ->group(function () {

        Route::controller(Login::class)->group(function () {

        });

        Route::controller(Dashboard::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard.view');
        });
        Route::controller(Users::class)->group(function () {
            Route::get('/users_list', 'userList')->name('users.list');
            Route::get('/get_users_list', 'getUsers')->name('users.getall');
            Route::get('/get_single_user_data/{id}', 'getUserData')->name('users.getone');
            Route::get('/add_user', 'addUser')->name('users.add');
            Route::POST('/add_new_user', 'createUser')->name('users.create');
            Route::get('/users_report', 'usersReport')->name('users.report');
            Route::put('/update_user/{id}', 'updateUser')->name('users.update');
            Route::POST('/reset_user_password/{id}', 'sendPasswordResetLink')->name('users.password');
        });

        Route::controller(Settings::class)->group(function () {

            Route::get('/profile_settings', 'settings')->name('admin.settings');
            Route::post('/profile_settings', 'updateAccount')->name('admin.settings.update');
            Route::post('/update_password', 'updatePassword')->name('admin.settings.update.password');

        });
        Route::controller(SalesController::class)->group(function () {

            Route::get('/pending_sales', 'pending')->name('admin.sales.pending');
            Route::get('/failed_sales', 'failed')->name('admin.sales.failed');
            Route::get('/completed_sales', 'completed')->name('admin.sales.completed');
            Route::get('/change_sale_status/{id}', 'updateSale')->name('sale.complete');

        });
        Route::controller(ProductsController::class)->group(function () {

            Route::get('/products_list', 'list')->name('admin.products.show');
            Route::get('/removed_products_list', 'removedlist')->name('admin.removed_products.show');
            Route::get('/get_products_list', 'getProducts')->name('admin.products.get');
            Route::get('/get_removed_products_list', 'getRemovedProducts')->name('admin.removed_products.get');
            Route::post('/delete_product', 'deleteProduct')->name('admin.products.delete');
            Route::post('/recover_product', 'recoverProduct')->name('admin.products.recover');

        });
        Route::controller(InspectionController::class)->group(function () {

            Route::get('/inspection_list', 'list')->name('admin.inspection.list');
            Route::post('/inspection_get_phones', 'getPhone')->name('admin.inspection.get_phone');
            Route::get('/inspection_add/{id?}', 'add')->name('admin.inspection.add');
            Route::POST('/inspection_create', 'create')->name('admin.inspection.create');
            Route::get('/get_inspections_list', 'getInspections')->name('admin.inspections.get');
            Route::post('/delete_inspection', 'deleteInspection')->name('admin.inspections.delete');
            Route::post('/edit_inspection', 'editInspection')->name('admin.inspections.edit');
            // Route::post('/recover_product', 'recoverProduct')->name('admin.products.recover');

        });
        Route::controller(RolesController::class)->group(function () {
            Route::GET('/add_admin/{id?}', 'addAdmin')->name('admin.add');
            Route::POST('/create_admin/{id?}', 'store')->name('admin.create');
            Route::GET('/admin_list', 'adminList')->name('admin.list');
            Route::GET('/add_role/{id?}', 'addRole')->name('role.add');
            Route::POST('/create_role/{id?}', 'createRole')->name('role.create');
            Route::GET('/role_list', 'roleList')->name('role.list');

        });
        Route::controller(ModulesContorller::class)->group(function () {
            Route::GET('/add_module/{id?}', 'addModules')->name('module.add');
            Route::GET('/modules_list', 'modulesList')->name('module.list');
            Route::PUT('/update_module/{id}', 'createModule')->name('module.update');
            Route::GET('/delete_module/{id}', 'deleteModule')->name('module.delete');
            Route::POST('/create_module', 'createModule')->name('module.create');

        });
        Route::controller(CategoryController::class)->group(function () {
            Route::GET('/add_category/{id?}', 'addCategory')->name('category.add');
            Route::GET('/category_list', 'categoryList')->name('category.list');
            Route::PUT('/update_category/{id}', 'createCategory')->name('category.update');
            Route::GET('/delete_category/{id}', 'deleteCategory')->name('category.delete');
            Route::POST('/create_category', 'createCategory')->name('category.create');
        });
        Route::controller(BrandsController::class)->group(function () {
            Route::GET('/add_brand/{id?}', 'addBrand')->name('brand.add');
            Route::GET('/brand_list', 'brandList')->name('brand.list');
            Route::PUT('/update_brand/{id}', 'createBrand')->name('brand.update');
            Route::GET('/delete_brand/{id}', 'deleteBrand')->name('brand.delete');
            Route::POST('/create_brand', 'createBrand')->name('brand.create');
        });
        Route::controller(WalletController::class)->group(function () {
            Route::GET('/withdraw_requests', 'index')->name('withdraw.requests');
            Route::get('/get_withdraw_requests', 'get_withdraw_requests')->name('withdraw.get_requests');
            Route::POST('/approve_withdraw', 'approveWithdraw')->name('withdraw.approve');
            Route::POST('/reject_withdraw', 'rejectWithdraw')->name('withdraw.reject');
            Route::GET('/txn_ledger', 'allTransactions')->name('admin.transactions');
            Route::get('/withdraw_history', function () {
                return view('AdminViews.Finance.withdraw_history');
            });
        });
        Route::controller(ReturnsController::class)->group(function () {
            Route::GET('/add_return', 'add')->name('return.add');
            Route::GET('/pending_returns', 'pending')->name('return.pending');
            Route::GET('/completed_returns', 'completed')->name('return.completed');
            Route::POST('/update_status', 'updateStatus')->name('return.update');
            Route::POST('/get_phone_1', 'getPhone')->name('return.getphone');
            Route::POST('/save_return', 'saveReturn')->name('return.save');

        });
    });
