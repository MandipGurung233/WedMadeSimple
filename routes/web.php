<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\logging;
use App\Http\Controllers\followSystem;
use App\Http\Controllers\PaymentController;

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

Route::get('/',[home::class,'home']);
Route::get('/about',[home::class,'about']);
Route::get('/blog',[home::class,'blog']);
Route::get('/service',[home::class,'service']);
Route::get('/contact',[home::class,'contact']);
Route::get('/makeUp',[home::class,'makeUp']);
Route::get('/venue',[home::class,'venued']);
Route::get('/adminDashboard',[home::class,'adminDash']);
Route::get('/custDash',[home::class,'customerDash']);
Route::get('/vendDash',[home::class,'vendorDash']);

/*Register*/
Route::get('/customer',[home::class,'customer']);
Route::get('/vendor',[home::class,'vendor']);

/* Login */
Route::get('/adminLogin',[home::class,'adminLogin']);
Route::get('/custLogin',[home::class,'custLogin']);
Route::get('/vendorLogin',[home::class,'vendorLogin']);
Route::get('/logout',[logging::class,'logout']);

/* Admin dashboard*/
Route::get('approved/{id}', [home::class,'approved']);
Route::get('appro', [home::class,'appro']);
Route::get('customize/{email}', [home::class,'customize']);
Route::get('customizeVenue/{email}', [home::class,'customizeVenue']);
Route::get('/generate', [home::class,'generate']);
Route::delete('destroy/{id}', [home::class,'destroy']);
Route::delete('destroyApprove/{id}', [home::class,'destroyApprove']);

/*Authentication */
Route::post('/customerRegister',[logging::class,'customerRegister']);
Route::post('/vendorRegister',[logging::class,'vendorRegister']);
Route::post('/vendorLogin',[logging::class,'vendorLogin']);
Route::post('/customerLogin',[logging::class,'customerLogin']);
Route::post('/adminLogin',[logging::class,'adminLogin']);

/*Vendor page details*/
Route::get('/details',[home::class,'details']);
Route::get('/post',[home::class,'post']);
Route::get('/auction',[home::class,'auction']);
Route::post('vendorDetails/{emails}',[home::class,'vendorDetails']);
Route::post('vendorPost/{emails}',[home::class,'vendorPost']);
Route::post('auction/{emails}',[home::class,'auctions']);

/*Book details */
Route::post('book/{emails}',[home::class,'book']);
Route::get('books/{venEmail}',[home::class,'books']);
Route::get('payment/{amount}',[home::class,'payment']);
Route::get('/bookingHistory',[home::class,'bookingHistory']);
Route::get('/anyBooking',[home::class,'anyBook']);

/*Customer newsfeed */
Route::get('/newsFeed',[home::class,'newsFeed']);

/*contact details */
Route::post('/contact',[home::class,'contacts']);
Route::delete('deleteContact/{id}',[home::class,'deleteContact']);
Route::delete('deletePost/{id}',[home::class,'deletePost']);

/*Follow system*/
Route::post('followSystem/{userEmail}',[followSystem::class,'following']);
Route::post('deleteFollow/{iid}',[followSystem::class,'deleteFollow']);

/*Feature page*/
Route::get('customizeFeature/{id}', [followSystem::class,'customizeFeature']);

/*random*/
Route::post('/random',[followSystem::class,'random']);

Route::delete('destroyed/{id}', [home::class,'destroyBooking']);
Route::delete('cancel/{id}', [home::class,'destroyCustomer']);

Route::get('/markasread/{id}',[home::class, 'markasread'])->name('markasread');
Route::get('/mark_as_read/{id}',[home::class, 'mark_as_read'])->name('mark_as_read');

Route::post('/khalti/payment/verify',[PaymentController::class,'verifyPayment'])->name('khalti.verifyPayment');
Route::post('/khalti/payment/store',[PaymentController::class,'storePayment'])->name('khalti.storePayment');
