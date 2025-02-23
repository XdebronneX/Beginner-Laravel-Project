<?php

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
Route::get('/', function () {
        return view('welcome'); 
});
// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/home', [App\Http\Controllers\TransactionController::class, 'index'])->name('home');

Route::resource('disease', 'DiseaseController')->middleware('auth');
//Route::resource('disease', 'DiseaseController');
Route::get('/disease/restore/{id}',['uses' => 'DiseaseController@restore','as' => 'disease.restore']);

Route::resource('breed', 'BreedController')->middleware('auth');
//Route::resource('breed', 'BreedController');
Route::get('/breed/restore/{id}',['uses' => 'BreedController@restore','as' => 'breed.restore']);

Route::resource('customer', 'CustomerController')->middleware('auth');
//Route::resource('customer', 'CustomerController');
Route::get('/customer/restore/{id}',['uses' => 'CustomerController@restore','as' => 'customer.restore']);

//test
Route::resource('employee', 'EmployeeController')->middleware('auth');
//Route::resource('employee', 'EmployeeController');
Route::get('/employee/restore/{id}',['uses' => 'EmployeeController@restore','as' => 'employee.restore']);

Route::resource('service', 'GroomingServiceController')->middleware('auth');
//Route::resource('service', 'GroomingServiceController');
Route::get('/service/restore/{id}',['uses' => 'GroomingServiceController@restore','as' => 'service.restore']);

Route::resource('pet', 'PetController')->middleware('auth');
//Route::resource('pet', 'PetController');
Route::get('/pet/restore/{id}',['uses' => 'PetController@restore','as' => 'pet.restore']);


Route::resource('consult', 'ConsultController')->middleware('auth');
//Route::resource('customer', 'CustomerController');
Route::get('/consult/restore/{id}',['uses' => 'ConsultController@restore','as' => 'consult.restore']);


Route::get('/Profile', [
        'uses' => 'EmployeeController@getProfile',
        'as' => 'employee.profile']);

Route::get('/Signup', [
        'uses' => 'EmployeeController@getSignup',
        'as' => 'employee.signup']);

Route::post('/Signup', [
        'uses' => 'EmployeeController@postSignup',
        'as' => 'employee.signup']);

// Route::group(['middleware' => 'auth'], function() {
//        Route::get('profile', [
//         'uses' => 'EmployeeController@getProfile',
//         'as' => 'user.profile',
//         ]);
//       });

Route::get('logout', [
        'uses' => 'EmployeeController@getLogout',
        'as' => 'employee.logout']);

Route::get('signin', [
                'uses' => 'EmployeeController@getSignin',
                'as' => 'employee.signin']);

Route::post('/signin', [
        'uses' => 'EmployeeController@postSignin',
        'as' => 'employee.signin']);

Route::get('/consultation','ConsultController@search')->middleware('auth');

Route::resource('comment', 'CommentController')->middleware('auth');

Route::get('/reviews/showServices/{id}',['uses' => 'CommentController@showServices','as' => 'reviews.showServices']);
Route::post('/reviews/updateComment/{id}',['uses' => 'CommentController@updateComment','as' => 'reviews.updateComment']);

Route::resource('transact', 'TransactionController')->middleware('auth');


Route::get('add-to-cart/{id}', [
    'uses' => 'TransactionController@getAddToCart',
    'as' => 'service.addToCart'
]);

Route::get('shopping-cart', [
    'uses' => 'TransactionController@getCart',
    'as' => 'service.shoppingCart'
]);

Route::get('remove/{id}',[
        'uses'=>'TransactionController@getRemoveItem',
        'as' => 'service.remove'
    ]);

Route::post('checkout',[
        'uses' => 'TransactionController@storeCheckout',
        'as' => 'service.checkout',
        'middleware' =>'auth'
    ]);
Route::get('/search', [
        'uses' => 'TransactionController@search',
        'as' => 'service.searchingindex'])->middleware('auth');