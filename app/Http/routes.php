<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where all Application Routes have been registered including the
| Rest Resources

*/

Route::get('/', function () {
    return view('landing');
});
/**
*Rest Resources
 */
Route::group(['middleware' => 'App\Http\Middleware\Cors'], function(){
    Route::resource('merchant', 'MerchantController');
    Route::resource('merchant.method.client.amount', 'PaymentMethodController');
});

Route::auth();

Route::group(['middleware'=>['web']], function()
{
    /**
     *Static Pages Routes
     */
    Route::get('/home', 'HomeController@index');
    Route::get('/pay-school', 'PageController@pay');
    Route::get('/features', 'PageController@feature');
    Route::get('/about-upg', 'PageController@about');

    Route::group(['middleware' => 'App\Http\Middleware\ClientMiddleware'], function()
    {
        /**
         *Client Pages Routes
         */
        Route::get('/account', 'ClientController@account');
        Route::get('/vendor-area', 'ClientController@dashboard');
        Route::get('/paymethods', 'ClientController@paymethods');
        Route::get('/pasttransactions', 'ClientController@pasttransactions');
        Route::post('company-info-save','CompanyInfoController@storeCompanyInfo');
        Route::post('/payment', 'EditPaymentMethod@update');
    });

    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
    {
        /**
         *Admin Pages Routes
         */
        Route::get('/clientarea', 'adminController@client');
        Route::get('/admin-area', 'adminController@dashboard');
        Route::get('/completedtrans', 'adminController@completed');
        Route::get('/dashboard', 'adminController@dashboard');
        Route::get('/management', 'adminController@userManagement');
        Route::get('/adminaccount', 'adminController@account');
        Route::get('/client-profile', 'adminController@client_profile');

    });

    /**
     *Cross Origins Resources, Respond to external server requests
     */
    Route::get('breweries', ['middleware' => 'Cors', function()
    {
        return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
    }]);
});

