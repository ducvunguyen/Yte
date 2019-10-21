<?php

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


// Route::group(['prefix' => 'admin'], function(){
// 	Route::get('/', 'AdminController@index')->name('dashboard');
// 	Route::get('/getadd', 'AdminController@getadd')->name('getadd');
// 	Route::post('/add', 'AdminController@add')->name('add');


// });

Route::group([
			'namespace' =>'Admin',
			'prefix'=>'admin',
			'as'	=> 'admin.',
			'middleware' => ['checkAdmin', 'web'],		
], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	//package
	Route::group([
				'prefix'=>'package',
				'as'	=> 'package.'

		], function(){
		Route::get('/', 'PackagesController@showDataPackage')->name('showPackage');
		Route::get('/viewPackage/{id}', 'PackagesController@showDetailPackage')->name('detailPackage');
		Route::get('/addPackage', 'PackagesController@showFormAddPackage')->name('showAddPackage');
		Route::post('/postPackage', 'PackagesController@addPackage')->name('addPackage');
		Route::get('/editPackage/{id}', 'PackagesController@showFormEditPackage')->name('ShowEditPackage');
		Route::post('/update/{id}', 'PackagesController@update')->name('update');
		Route::get('/destroy/{id}', 'PackagesController@destroy')->name('destroy');
	});

	//Service
	Route::group([
				'as'	=> 'service.',
				'prefix' => 'service',
	], function(){
		Route::get('/', 'ServicesController@index')->name('dashboard');
		Route::get('/edit/{id}', 'ServicesController@showFormEdit')->name('edit');
		Route::post('/update{id}', 'ServicesController@Update')->name('update');
		Route::get('/addservice', 'ServicesController@addService')->name('addService');
		Route::post('/add', 'ServicesController@add')->name('add');
		Route::get('/destroy/{id}', 'ServicesController@destroy')->name('destroy');
	});

	//about
	Route::group([
				'as'	=> 'about.',
				'prefix' => 'about',
	], function(){
		Route::get('/', 'AboutController@index')->name('dashboard');
		Route::get('/edit/{id}', 'AboutController@showFormEdit')->name('edit');
		Route::post('/update{id}', 'AboutController@Update')->name('update');
		Route::get('/addabout', 'AboutController@addAbout')->name('addAbout');
		Route::post('/add', 'AboutController@add')->name('add');
		Route::get('/destroy/{id}', 'AboutController@destroy')->name('destroy');
	});

	//banner
	Route::group([
				'as'	=> 'banner.',
				'prefix' => 'banner',
	], function(){
		Route::get('/', 'BannerController@index')->name('dashboard');
		Route::get('/edit/{id}', 'BannerController@showFormEdit')->name('edit');
		Route::post('/update{id}', 'BannerController@Update')->name('update');
		Route::get('/addbanner', 'BannerController@addAbout')->name('addBanner');
		Route::post('/add', 'BannerController@add')->name('add');
		Route::get('/destroy/{id}', 'BannerController@destroy')->name('destroy');
	});

	Route::group([
				'as'	=> 'partner.',
				'prefix' => 'partner',
	], function(){
		Route::get('/', 'PartnerController@index')->name('dashboard');
		Route::get('/edit/{id}', 'PartnerController@showFormEdit')->name('edit');
		Route::post('/update{id}', 'PartnerController@Update')->name('update');
		Route::get('/addpartner', 'PartnerController@addAbout')->name('addPartner');
		Route::post('/add', 'PartnerController@add')->name('add');
		Route::get('/destroy/{id}', 'PartnerController@destroy')->name('destroy');
	});

	Route::group([
				'as'	=> 'ourteam.',
				'prefix' => 'ourteam',
	], function(){
		Route::get('/', 'OurteamController@index')->name('dashboard');
		Route::get('/edit/{id}', 'OurteamController@showFormEdit')->name('edit');
		Route::post('/update{id}', 'OurteamController@Update')->name('update');
		Route::get('/addourteam', 'OurteamController@addAbout')->name('addOurteam');
		Route::post('/add', 'OurteamController@add')->name('add');
		Route::get('/destroy/{id}', 'OurteamController@destroy')->name('destroy');
	});
});


Route::group([
	'namespace' => 'Admin',
	'as'	=> 'login.',
	'prefix'=> 'login',

], function(){
	Route::get('/', 'AdminLoginController@showlogin')->name('showlogin');
	Route::post('/login', 'AdminLoginController@login')->name('login');
	Route::any('logout', 'AdminLoginController@logout')->name('logout');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
