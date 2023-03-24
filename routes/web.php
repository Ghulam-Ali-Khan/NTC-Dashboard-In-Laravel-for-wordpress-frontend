<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('loginPost', [App\Http\Controllers\LoginController::class, 'loginPost'])->name('loginPost');
    
Route::middleware(['auth'])->group(function () {
    

// Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login.post');

// Route::get('/', function () {
//     return view('login', ['name' => 'Hi']);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get("show_user","users@showUser");
Route::get('show_user',[users::class,'showUser']);


// Route::view('home','web.home')->name('home');
// Route::view('blogs','web.tenders')->name('tenders');
// Route::view('policies','web.policies')->name('policies');



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/insertRole', [App\Http\Controllers\RolesController::class, 'insertRole'])->name('insertRole');
Route::post('/insertPermission', [App\Http\Controllers\PermissionsController::class, 'insertPermission'])->name('insertPermission');
Route::post('/insertTender', [App\Http\Controllers\TendersController::class, 'insertTender'])->name('insertTender');
Route::post('/insertPolicy', [App\Http\Controllers\PoliciesController::class, 'insertPolicy'])->name('insertPolicy');
Route::post('/insertApplyDownloads', [App\Http\Controllers\ApplyDownloadsController::class, 'insertApplyDownloads'])->name('insertApplyDownloads');
// Route::get('/home', function () {
//     $tenders = DB::table('tenders')->select('id','name','type','tender_no','tender_pdf','tender_desp','tender_extension_corrigendum','tender_deadline')->get();
//     return view('web.home', compact('tenders'));
// });

Route::get('/users', [App\Http\Controllers\UsersController::class, 'fetchUsers'])->name('users');
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'fetchRoles'])->name('roles');
Route::get('/permissions', [App\Http\Controllers\PermissionsController::class, 'fetchPermissions'])->name('permissions');
Route::get('/tenders', [App\Http\Controllers\TendersController::class, 'fetchTenders'])->name('tenders');
Route::get('/policies', [App\Http\Controllers\PoliciesController::class, 'fetchPolicies'])->name('policies');
Route::get('/apply-downloads', [App\Http\Controllers\ApplyDownloadsController::class, 'fetchApplyDownloads'])->name('apply-downloads');


Route::post('/updatePermission', [App\Http\Controllers\PermissionsController::class, 'updatePermission'])->name('updatePermission');
Route::post('/updateTender', [App\Http\Controllers\TendersController::class, 'updateTender'])->name('updateTender');
Route::post('/updatePolicy', [App\Http\Controllers\PoliciesController::class, 'updatePolicy'])->name('updatePolicy');
Route::post('/updateApplyDownloads', [App\Http\Controllers\ApplyDownloadsController::class, 'updateApplyDownloads'])->name('updateApplyDownloads');

Route::get('/deletePermission/{id}', [App\Http\Controllers\PermissionsController::class, 'destroy'])->name('deletePermission');
Route::get('/deleteTender/{id}', [App\Http\Controllers\TendersController::class, 'destroy'])->name('deleteTender');
Route::get('/deletePolicy/{id}', [App\Http\Controllers\PoliciesController::class, 'destroy'])->name('deletePolicy');
Route::get('/deleteApplyDownloads/{id}', [App\Http\Controllers\ApplyDownloadsController::class, 'destroy'])->name('deleteApplyDownloads');
// Route::get('/updateTender/{id}', [App\Http\Controllers\TendersController::class, 'edit'])->name('updateTender');

Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
});
