<?php


// Frontend Route
Route::get('/','Frontend\FrontendController@index');
Route::get('about','Frontend\FrontendController@about')->name('about.us');
Route::get('contact','Frontend\FrontendController@ContactUs')->name('contact.us');
Route::get('shopping-cart','Frontend\FrontendController@ShoppingCart')->name('shopping.cart');
Route::post('contact/store','Frontend\FrontendController@contactSotre')->name('contact.store');
Route::get('Product-list','Frontend\FrontendController@productList')->name('product.list');
Route::get('category-wise-product/{category_id}','Frontend\FrontendController@categoryWiseProduct')->name('category.wise.product');
Route::get('brand-wise-product/{brand_id}','Frontend\FrontendController@brandWiseProduct')->name('brand.wise.product');
Route::get('product-details/{slug}','Frontend\FrontendController@ProductDetails')->name('product.details.info');
Route::post('/find-product','Frontend\FrontendController@findProduct')->name('find.product');
Route::get('/get-product','Frontend\FrontendController@getproduct')->name('get.product');

//shopping Cart
Route::post('/add-to-cart','Frontend\CartController@addCart')->name('insert.cart');
Route::get('/show-cart','Frontend\CartController@showCart')->name('insert.show');
Route::post('/update-cart','Frontend\CartController@updateCart')->name('update.cart');
Route::get('/delete-cart/{rowId}','Frontend\CartController@deleteCart')->name('delete.cart');

//customer
Route::get('/customer-login','Frontend\CheckOutController@customerlogin')->name('login.customer');
Route::get('/customer-signup','Frontend\CheckOutController@customerSignUP')->name('signup.customer');
Route::post('/signup-store','Frontend\CheckOutController@signpuStore')->name('signup.store');
Route::get('/email-varify','Frontend\CheckOutController@emailVarify')->name('email.varify');
Route::post('/varify-store','Frontend\CheckOutController@varifyStore')->name('varify.store');

Route::get('/check-out','Frontend\CheckOutController@checkout')->name('check.out');
Route::post('/store-check-out','Frontend\CheckOutController@storeCheckOut')->name('store.check.out');

Auth::routes();

//customer deshboard
Route::group(['middleware'=>['auth','customer']],function(){
	Route::get('/deshboard','Frontend\DeshboardController@deshboard')->name('deshboard');
	Route::get('/customer-edit-profile','Frontend\DeshboardController@editprofile')->name('customer.edit.profile');
	Route::post('/customer-update-profile','Frontend\DeshboardController@updateprofile')->name('customer.update.profile');
	Route::get('/customer-password-change','Frontend\DeshboardController@passwordChange')->name('customer.password.change');
	Route::post('/customer-password-update','Frontend\DeshboardController@passwordUpdate')->name('password_update');
	
	Route::get('/payment','Frontend\DeshboardController@Payment')->name('customer.payment');
	Route::post('/payment-store','Frontend\DeshboardController@PaymentStore')->name('payment.store');
	Route::get('/order-list','Frontend\DeshboardController@OrderList')->name('order.list');
	Route::get('/customer-order-details/{id}','Frontend\DeshboardController@customerOrderDetails')->name('customer.order.details');
	Route::get('/order-details-print/{id}','Frontend\DeshboardController@OrderDetailsPrint')->name('customer.order.details.print');
});

//Backend
Route::group(['middleware'=>['auth','admin']],function(){
	//Admin deshboard
	Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('users')->group(function(){
		Route::get('/view','Backend\UsersController@view')->name('users.view');
		Route::get('/add','Backend\UsersController@add')->name('users.add');
		Route::post('/store','Backend\UsersController@store')->name('users.store');
		Route::get('/edit/{id}','Backend\UsersController@edit')->name('users.edit');
		Route::post('/update/{id}','Backend\UsersController@update')->name('users.update');
		Route::post('/delete','Backend\UsersController@delete')->name('users.delete');
	});

	Route::prefix('profile')->group(function(){
		Route::get('/view','Backend\ProfileController@view')->name('profile.view');
		Route::get('/edit','Backend\ProfileController@edit')->name('profile.edit');
		Route::post('/update','Backend\ProfileController@update')->name('profile.update');
		Route::get('/password/view','Backend\ProfileController@password_view')->name('profile.password_view');
		Route::post('/password/update','Backend\ProfileController@password_update')->name('profile.password_update');
	});

	Route::prefix('logos')->group(function(){
		Route::get('/view','Backend\LogoController@view')->name('logos.view');
		Route::get('/add','Backend\LogoController@add')->name('logos.add');
		Route::post('/store','Backend\LogoController@store')->name('logos.store');
		Route::get('/edit/{id}','Backend\LogoController@edit')->name('logos.edit');
		Route::post('/update/{id}','Backend\LogoController@update')->name('logo.update');
		Route::post('/delete','Backend\LogoController@delete')->name('logos.delete');
	});

	Route::prefix('sliders')->group(function(){
		Route::get('/view','Backend\SlidersController@view')->name('sliders.view');
		Route::get('/add','Backend\SlidersController@add')->name('sliders.add');
		Route::post('/store','Backend\SlidersController@store')->name('sliders.store');
		Route::get('/edit/{id}','Backend\SlidersController@edit')->name('sliders.edit');
		Route::post('/update/{id}','Backend\SlidersController@update')->name('sliders.update');
		Route::post('/delete','Backend\SlidersController@delete')->name('sliders.delete');
	});

	Route::prefix('contacts')->group(function(){
		Route::get('/view','Backend\ContactController@view')->name('contacts.view');
		Route::get('/add','Backend\ContactController@add')->name('contacts.add');
		Route::post('/store','Backend\ContactController@store')->name('contacts.store');
		Route::get('/edit/{id}','Backend\ContactController@edit')->name('contacts.edit');
		Route::post('/update/{id}','Backend\ContactController@update')->name('contacts.update');
		Route::post('/delete','Backend\ContactController@delete')->name('contacts.delete');
		//communication contacts
		Route::get('communication/view','Backend\ContactController@communication')->name('contacts.communication.view');
		Route::post('communication/delete','Backend\ContactController@communicationDelete')->name('communication.contacts.delete');

	});

	Route::prefix('aboutus')->group(function(){
		Route::get('/view','Backend\AboutusController@view')->name('aboutus.view');
		Route::get('/add','Backend\AboutusController@add')->name('aboutus.add');
		Route::post('/store','Backend\AboutusController@store')->name('aboutus.store');
		Route::get('/edit/{id}','Backend\AboutusController@edit')->name('aboutus.edit');
		Route::post('/update/{id}','Backend\AboutusController@update')->name('aboutus.update');
		Route::post('/delete','Backend\AboutusController@delete')->name('aboutus.delete');
	});

	Route::prefix('categories')->group(function(){
		Route::get('/view','Backend\CategoryController@view')->name('categories.view');
		Route::get('/add','Backend\CategoryController@add')->name('categories.add');
		Route::post('/store','Backend\CategoryController@store')->name('categories.store');
		Route::get('/edit/{id}','Backend\CategoryController@edit')->name('categories.edit');
		Route::post('/update/{id}','Backend\CategoryController@update')->name('categories.update');
		Route::post('/delete','Backend\CategoryController@delete')->name('categories.delete');
	});

	Route::prefix('brands')->group(function(){
		Route::get('/view','Backend\BrandController@view')->name('brands.view');
		Route::get('/add','Backend\BrandController@add')->name('brands.add');
		Route::post('/store','Backend\BrandController@store')->name('brands.store');
		Route::get('/edit/{id}','Backend\BrandController@edit')->name('brands.edit');
		Route::post('/update/{id}','Backend\BrandController@update')->name('brands.update');
		Route::post('/delete','Backend\BrandController@delete')->name('brands.delete');
	});

	Route::prefix('colors')->group(function(){
		Route::get('/view','Backend\ColorController@view')->name('colors.view');
		Route::get('/add','Backend\ColorController@add')->name('colors.add');
		Route::post('/store','Backend\ColorController@store')->name('colors.store');
		Route::get('/edit/{id}','Backend\ColorController@edit')->name('colors.edit');
		Route::post('/update/{id}','Backend\ColorController@update')->name('colors.update');
		Route::post('/delete','Backend\ColorController@delete')->name('colors.delete');
	});

	Route::prefix('sizes')->group(function(){
		Route::get('/view','Backend\SizeController@view')->name('sizes.view');
		Route::get('/add','Backend\SizeController@add')->name('sizes.add');
		Route::post('/store','Backend\SizeController@store')->name('sizes.store');
		Route::get('/edit/{id}','Backend\SizeController@edit')->name('sizes.edit');
		Route::post('/update/{id}','Backend\SizeController@update')->name('sizes.update');
		Route::post('/delete','Backend\SizeController@delete')->name('sizes.delete');
	});

	Route::prefix('products')->group(function(){
		Route::get('/view','Backend\ProductController@view')->name('products.view');
		Route::get('/add','Backend\ProductController@add')->name('products.add');
		Route::post('/store','Backend\ProductController@store')->name('products.store');
		Route::get('/edit/{id}','Backend\ProductController@edit')->name('products.edit');
		Route::post('/update/{id}','Backend\ProductController@update')->name('products.update');
		Route::post('/delete','Backend\ProductController@delete')->name('products.delete');
		Route::get('/details/{id}','Backend\ProductController@details')->name('products.details');
	});

	Route::prefix('customers')->group(function(){
		Route::get('/view','Backend\CustomerController@view')->name('customers.view');
		Route::get('/draft/view','Backend\CustomerController@draftView')->name('customers.draft');
		Route::post('/delete','Backend\CustomerController@delete')->name('customers.delete');
	});

	Route::prefix('orders')->group(function(){
		Route::get('/pending-list','Backend\OrderController@pendinglist')->name('orders.pending');
		Route::get('/details/{id}','Backend\OrderController@details')->name('orders.details');
		Route::get('/approval-list','Backend\OrderController@approvallist')->name('orders.approval');
		Route::post('/approved','Backend\OrderController@approved')->name('orders.approved');
	});

});
