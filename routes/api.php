<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::middleware('client')->get('/articles', function (Request $request) {
Route::middleware('client')->get('/articles', function (Request $request) {    
    // working code
    //$dataset = DB::table('oauth_access_tokens')->get();
    
    //$dataset = DB::table('oauth_access_tokens')->where('client_id', 3)->get();
    $dataset = DB::table('oauth_access_tokens')->where('client_id', $request->oauth_client_id)->get();
    
    return $dataset->toJson();
    
    return $request->oauth_client_id;
    //return $request->oauth_id;
    
    //return $request->user();

});


// working code
//Route::get('/articles', function (Request $request) {
//    return 'ff';
//})->middleware('client');


//Route::get('/articles', function (Request $request) {
//    return 'ff';
//});