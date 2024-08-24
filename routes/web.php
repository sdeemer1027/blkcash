<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BraintreeController;
//use App\Http\Controllers\MoneyRequestController;

use App\Http\Controllers\SettingsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home'); // Redirect to 'home' route if logged in
    } else {
        return view('welcome'); // Show 'welcome' view for guests
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/dashboardcount', [HomeController::class, 'dashboardcount'])->name('dashboardcount');

Route::get('/get-token', 'App\Http\Controllers\ProfileController@getToken')->name('get-token');
Route::post('/credit-cards/add', 'App\Http\Controllers\CreditCardController@addCreditCard')->middleware('auth');
Route::get('/credit-cards/add', 'App\Http\Controllers\CreditCardController@addCreditCard')->middleware('auth');

Route::post('/credit-cards', 'App\Http\Controllers\CreditCardController@store')->name('credit-cards.store');

Route::get('/persnalsettings', 'App\Http\Controllers\SettingsController@index')->name('settings.index');


Route::get('/payments', [WalletController::class, 'paymentPage'])->middleware(['auth', 'verified'])->name('payments.page');
//Route::get('/payments', [WalletController::class, 'paymentPage'])->name('payments.page');
//Route::get('/payments/card', [WalletController::class, 'paymentPageCard'])->name('payments.page');
Route::post('/payments/process', [WalletController::class, 'processPayment'])->name('payments.process');

Route::get('/transaction', [WalletController::class, 'transaction'])->name('transactions.index');

Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
Route::post('/wallet/approve-reject', [WalletController::class, 'approveReject'])->name('wallet.approve-reject');
//Route::get('/wallet/bank', [WalletController::class, 'bank'])->name('wallet.bank');

Route::post('/request/cancel', [WalletController::class, 'cancelRequest'])->name('request.cancel');
Route::post('/request/remind', [WalletController::class, 'remindRequest'])->name('request.remind');

//Route::get('/braintree/form', [BraintreeController::class, 'index'])->name('braintree.form');
//Route::post('/braintree/addBankAccount', [BraintreeController::class, 'addBankAccount'])->name('braintree.addBankAccount');
//Route::get('/braintree/client-token', [BraintreeController::class, 'getClientToken'])->name('braintree.clientToken');

Route::get('/braintree/form', [BraintreeController::class, 'index'])->name('braintree.form');
Route::post('/braintree/addBankAccount', [BraintreeController::class, 'addBankAccount'])->name('braintree.addBankAccount');
Route::get('/braintree/client-token', [BraintreeController::class, 'getClientToken'])->name('braintree.clientToken');

//Route::post('/request-money', [MoneyRequestController::class, 'requestMoney']);

Route::post('/search-users', [UserController::class, 'searchUsers'])->name('search.users');


Route::get('/dashboard', [WalletController::class, 'paymentPage'])->middleware(['auth', 'verified'])->name('dashboard');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
     Route::get('/myprofile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
