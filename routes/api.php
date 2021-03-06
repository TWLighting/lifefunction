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
//user page
//Route::get('/user/auth/sign-up','UserAuthController@signUpPage');
//Route::post('/user/auth/sign-up','UserAuthController@signUpProcess');
//Route::get('/user/auth/sign-in','UserAuthController@signInPage');
//Route::post('/user/auth/sign-in','UserAuthController@signInProcess');
//Route::get('/user/auth/sign-out','UserAuthController@signOut');

//使用路由群組改寫

Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/sign-up', ['uses' => 'UserAuthController@signUpProcess']);
        Route::get('/sign-up', 'UserAuthController@signUpPage');
        Route::get('/sign-in', 'UserAuthController@signInPage');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        Route::get('/sign-out', 'UserAuthController@signOut');
    });
});



//商品

//Route::get('/merchandise','MerchandiseContorller@merchandiseListPage');
//
//Route::get('/merchandise/create','MerchandiseContorller@merchandiseCreateProcess');
//
//Route::get('/merchandise/manage','MerchandiseContorller@merchandiseManageListPage');


//使用路由群組改寫
Route::group(['prefix' => 'merchandise'], function () {
    Route::get('/', 'MerchandiseContorller@merchandiseListPage');

    Route::get('/create', 'MerchandiseContorller@merchandiseCreateProcess');

    Route::get('/manage', 'MerchandiseContorller@merchandiseManageListPage');


    //Route::get('/merchandise/{merchandise_id}','MerchandiseContorller@merchandiseItemPage');
    //
    //Route::get('/merchandise/{merchandise_id}/edit','MerchandiseContorller@merchandiseItemEditPage');
    //
    //Route::put('/merchandise/{merchandise_id}','MerchandiseContorller@merchandiseItemUpdateProcess');
    //
    //Route::post('/merchandise/{merchandise_id}/buy','MerchandiseContorller@merchandiseItemBuyProcess');

    //使用路由群組改寫
    Route::group(['prefix' => 'merchandise'], function () {
        Route::get('/', 'MerchandiseContorller@merchandiseItemPage');

        Route::get('/edit', 'MerchandiseContorller@merchandiseItemEditPage');

        Route::put('/', 'MerchandiseContorller@merchandiseItemUpdateProcess');

        Route::post('/buy', 'MerchandiseContorller@merchandiseItemBuyProcess');
    });
});

//交易
Route::get('/transaction', 'TransactionController@transactionListPage');
