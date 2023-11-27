<?php

use App\Http\Controllers\UserControllers\Payment\WalletController;
use App\Http\Controllers\UserControllers\HomePage\Home;
use App\Http\Controllers\UserControllers\Payment\PaymentController;
use App\Http\Controllers\UserControllers\Payment\WithdrawMethod;
use App\Http\Controllers\UserControllers\Products\CartController;
use App\Http\Controllers\UserControllers\Products\CompareController;
use App\Http\Controllers\UserControllers\Products\FavoriteController;
use App\Http\Controllers\UserControllers\Products\PhoneController;
use App\Http\Controllers\UserControllers\Profile\Settings;
use App\Http\Controllers\UserControllers\Profile\UserProfile;
use App\Http\Controllers\UserControllers\Purchase\CheckoutController;
use App\Http\Controllers\UserControllers\Purchase\PurchaseController;
use App\Http\Controllers\UserControllers\Registration\ForgotPassword;
use App\Http\Controllers\UserControllers\Registration\GoogleLogin;
use App\Http\Controllers\UserControllers\Registration\Login;
use App\Http\Controllers\UserControllers\Registration\Logout;
use App\Http\Controllers\UserControllers\Registration\Singup;
use App\Http\Controllers\UserControllers\Registration\VerifyEmail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

////Migration Route
Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return "Migrations completed";
});

//////DB Seed Route
Route::get('/seed', function () {
    Artisan::call('db:seed', ['--force' => true]);
    return "Seeding completed";
});


Route::get('/support', function () {
    return view('UserViews/Support/support');
});

Route::get('/dashboard', function () {
    return view('UserViews/Dashboard/dashboard');
});

Route::get('/sales', function () {
    return view('UserViews/Sales/sales');
});

/////Page not found
Route::get('/page_not_found', function () {
    return view('UserViews/Error404');
})->name('not_found');
Route::get('/thank-you', function () {
    return view('UserViews/PaymentSuccess');
})->name('thankyou');

Route::middleware('auth')->group(function () {

    Route::controller(Settings::class)->group(function () {
        Route::get('/profile', 'showProfile')->name('profile.show');
        Route::get('/profile_settings', 'showProfileSettings')->name('profile_settings.show');
        Route::POST('/profile_settings', 'updateInfo')->name('profile_settings.update');
        Route::POST('/update_address', 'updateAddress')->name('profile_settings.address');
    });
    Route::controller(PhoneController::class)->group(function () {
        Route::get('/add-phone', 'addPhone')->name('phones.add');
        Route::get('/update-phone/{id}', 'addPhone')->name('phones.update');
        Route::POST('/create-phone', 'createPhone')->name('phones.create');
        Route::GET('/manage-phones', 'phoneList')->name('phones.list');
        Route::GET('/delete-phone/{id}', 'deletePhone')->name('phones.delete');
        Route::GET('/phone-details/{id}', 'phoneDetails')->name('phones.show');
        Route::GET('/inspection_report/{id}', 'inspectionReport')->name('phones.inspection');
        Route::POST('/product_return', 'returnProduct')->name('phones.return');

    });

    Route::controller(FavoriteController::class)->group(function () {
        // Route::get('/favorites', 'index')->name('favorites.index');
        Route::post('/favorite/add/{phone}', 'store')->name('favorites.add');
        Route::GET('/favorite/remove/{favorite}', 'destroy')->name('favorites.remove');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/add', 'store')->name('cart.add');
        Route::get('/cart/remove/{id}', 'destroy')->name('cart.remove');
    });

    Route::controller(CheckoutController::class)->group(function () {

        Route::get('/checkout', 'index')->name('checkout.show');

    });
    Route::controller(PurchaseController::class)->group(function () {

        Route::get('/purchases', 'index')->name('purchases.show');

    });
    Route::controller(CompareController::class)->group(function () {

        Route::post('/compare/add', 'add')->name('compare.add');
        Route::get('/compare/remove/{id}', 'remove')->name('compare.remove');
        Route::get('/compare', 'index')->name('compare.index');

    });
    Route::controller(WalletController::class)->group(function () {

        Route::get('/wallet', 'history')->name('wallet.show');
        Route::POST('/deposit', 'deposit')->name('wallet.deposit');
        Route::POST('/withdraw', 'withdraw')->name('wallet.withdraw');

    });
    Route::controller(WithdrawMethod::class)->group(function () {

        Route::POST('/add-payment-method', 'store')->name('payMethod.add');
        Route::GET('/remove-payment-method/{id}', 'remove')->name('payMethod.remove');

    });
});

Route::controller(PhoneController::class)->group(function () {

    Route::GET('/phone-details/{id}', 'phoneDetails')->name('phones.show');

});
Route::controller(UserProfile::class)->group(function () {
    Route::get('/profile/{id}', 'showProfile')->name('profile.show');

});
Route::controller(Home::class)->group(function () {
    Route::get('/', 'index')->name('home.show');
    Route::get('/category/{column}/{value}', 'index')->name('home.show');

});
Route::controller(PaymentController::class)->group(function () {
    Route::POST('/charge', 'charge')->name('pay.now');

});
Route::get('/session', function () {
    return session('compare');
});
Route::middleware('prevent-login')->group(function () {

    Route::controller(Singup::class)->group(function () {
        Route::get('/signup', 'signup');
        Route::post('/signup', 'store');
    });
    Route::controller(Login::class)->group(function () {

        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'dologin');

    });
    Route::controller(GoogleLogin::class)->group(function () {

        Route::get('login/google', 'googleLogin')->name('login.google');
        Route::get('login/google/callback', 'googleLoginCallBack')->name('login.googleCallback');

    });

    Route::controller(ForgotPassword::class)->group(function () {
        Route::get('/forgot_password', 'forgot_password')->name('password.forgot');
        Route::POST('/forgot_password', 'sendPasswordResetLinkEmail')->name('password.send');
        Route::POST('/set_password', 'setPassword')->name('password.reset');
        Route::get('/reset_password', 'resetPassword')->name('password.set');
    });
    Route::controller(VerifyEmail::class)->group(function () {
        Route::post('/verify_email', 'verifyEmail');
        Route::get('/verify_email', 'verifyEmail');
        Route::get('/email_verification', 'email_verification')->name('verification.send');
        Route::get('/resend-email', 'resendVerificationCode');
    });

});
Route::controller(Logout::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/sales_list', function () {
    return view('AdminViews.Sales.salesList');
});
Route::get('/removed_product', function () {
    return view('AdminViews.Product.removed_product');
});

Route::get('/boost_products', function () {
    return view('AdminViews.Product.Ads.boost_products');
});
Route::get('/current_ads', function () {
    return view('AdminViews.Product.Ads.current_ads');
});


Route::get('/product_report', function () {
    return view('AdminViews.Product.product_report');
});
Route::get('/txn_ledger', function () {
    return view('AdminViews.Finance.txn_ledger');
});
Route::get('/wallets', function () {
    return view('AdminViews.Finance.wallets');
});

Route::get('/charges_and_discounts', function () {
    return view('AdminViews.Finance.charges_and_discounts');
});

Route::get('/pending_refunds', function () {
    return view('AdminViews.Finance.pending_refunds');
});
Route::get('/approved_refunds', function () {
    return view('AdminViews.Finance.approved_refunds');
});
Route::get('/deposits', function () {
    return view('AdminViews.Finance.deposits');
});

Route::get('/pending_sales', function () {
    return view('AdminViews.Sales.pending_sales');
});
Route::get('/failed_sales', function () {
    return view('AdminViews.Sales.failed_sales');
});
Route::get('/completed_sales', function () {
    return view('AdminViews.Sales.completed_sales');
});
Route::get('/sales_report', function () {
    return view('AdminViews.Sales.sales_report');
});
Route::get('/add_employee', function () {
    return view('AdminViews.HR management.Manage Employees.add_employee');
});
Route::get('/employee_list', function () {
    return view('AdminViews.HR management.Manage Employees.employee_list');
});
Route::get('/add_designation', function () {
    return view('AdminViews.HR management.Manage Employees.add_designation');
});
Route::get('/designation_list', function () {
    return view('AdminViews.HR management.Manage Employees.designation_list');
});
Route::get('/add_attendance', function () {
    return view('AdminViews.HR management.Attendance.add_attendance');
});
Route::get('/manage_attendance', function () {
    return view('AdminViews.HR management.Attendance.manage_attendance');
});
Route::get('/absents', function () {
    return view('AdminViews.HR management.Attendance.absents');
});
Route::get('/on_leave', function () {
    return view('AdminViews.HR management.Attendance.on_leave');
});
Route::get('/issue_leave', function () {
    return view('AdminViews.HR management.Attendance.issue_leave');
});
Route::get('/event_holidays', function () {
    return view('AdminViews.HR management.Attendance.event_holidays');
});
Route::get('/attendance_report', function () {
    return view('AdminViews.HR management.Attendance.attendance_report');
});
Route::get('/salary_settings', function () {
    return view('AdminViews.HR management.Salary.salary_settings');
});
Route::get('/salary_list', function () {
    return view('AdminViews.HR management.Salary.salary_list');
});
Route::get('/benifits_and_deductions', function () {
    return view('AdminViews.HR management.Salary.benifits_and_deductions');
});
Route::get('/generate_payroll', function () {
    return view('AdminViews.HR management.Salary.generate_payroll');
});
Route::get('/pay_salary', function () {
    return view('AdminViews.HR management.Salary.pay_salary');
});
Route::get('/salary_history', function () {
    return view('AdminViews.HR management.Salary.salary_history');
});
Route::get('/salary_report', function () {
    return view('AdminViews.HR management.Salary.salary_report');
});

/////////Rider Routes//////////////
Route::get('/rider-dashboard', function () {
    return view('RiderViews/Dashboard/dashboard');
});
Route::get('/rider-wallet', function () {
    return view('RiderViews/Wallet/wallet');
});
Route::get('/rider-support', function () {
    return view('RiderViews/Support/support');
});
Route::get('/orders-hisory', function () {
    return view('RiderViews/Orders/orders');
});
Route::get('/pending-orders', function () {
    return view('RiderViews/Orders/pending_orders');
});
Route::get('/new-orders', function () {
    return view('RiderViews/Orders/new-orders');
});
