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


Route::middleware('client')->get('/articles', function (Request $request) {    
    // working code
    //$dataset = DB::table('oauth_access_tokens')->get();
    
    $dataset = DB::table('oauth_access_tokens')->where('client_id', $request->oauth_client_id)->get();
    
    return $dataset->toJson();
});

// working code
//Route::get('/articles', function (Request $request) {
//    return 'ff';
//})->middleware('client');

Route::get('/client_credentials-client_id', function (Request $request) {    
    return "oauth_client_id:" . $request->oauth_client_id;
})->middleware('client');



Route::get('/password_grant-user_id', function (Request $request) {    
    return "user_id:" . Auth::user()->id;
})->middleware('auth:api');
