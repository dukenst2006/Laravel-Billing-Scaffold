<?php



Route::get('/', 'PagesController@home')->name('home');
Auth::routes();

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::group(['middleware' => 'auth'], function(){
	Route::get('user/invoice/{invoice}', function ($invoiceId) {
	    return Auth::user()->downloadInvoice($invoiceId, [
	        'vendor'  => 'Outline Roofing',
	        'product' => 'Outline Roofing CRM and Backoffice',
	        'user' => Auth::user(),
	    ]);
	});

	Route::get('images/{foldername}/{filename}', 'ImagesController@getImage');
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
	
	// Company Stuff
	Route::resource('company', 'CompanyController');

	// User Stuff
	Route::resource('user/password', 'PasswordController');
	Route::resource('user-profile', 'UserProfileController');
	Route::put('subscription/update-credit-card', 'SubscriptionController@updateCC')->name('subscription.updateCC');
	Route::resource('subscription', 'SubscriptionController');
	Route::resource('users', 'UsersController');

});


