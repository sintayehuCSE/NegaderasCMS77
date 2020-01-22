<?php

Route::view('/', 'login');
Route::view('/index', 'index');
Route::view('/a', 'jobvacancy');
Route::post('/contact', 'contactFormcontroller@store');
Route::view('/contact', 'contact');
Route::view('/h','hotels');
//Route::view('/login-custom', 'login')->name('login-custom');
//Route::view('/register-custom', 'negad.register')->name('register-custom');

Route::get('busu', function () {
    return view('user.bususer');
});



////////////////////////////////////////////////////////////////////////////////
////////////////// registration/////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
Route::get('/hotelregistration', 'HotelController@index');
Route::post('/hotelregistration', 'HotelController@register');
Route::get('/busregistration', 'BusController@index')->name('fff');
Route::post('/busregistration', 'BusController@register');
Route::get('/travelregistration', 'TravelAgencyController@index');
Route::post('/travelregistration', 'TravelAgencyController@register');
Route::get('/companyregistration', 'CompanyController@index');
Route::post('/companyregistration', 'CompanyController@register');
Route::get('trackregistration', 'TrackerController@index');
Route::post('trackregistration', 'TrackerController@register');
Route::get('/paregister', 'PersonalRegisterController@index');
Route::post('/paregister', 'PersonalRegisterController@register');
//////////////////////////////////////////////////////////////////////////////////


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



///////////////////////////////////////////////////////////////////////////////////
/////////////*************for bus service provider********/////////////////////////
///////////////////////////////////////////////////////////////////////////////////
Route::post('/busregister', 'BusPostController@create');
Route::get('/busdash', function () {
    return view('negad.bus.busdash');
});
Route::get('/viewbus', 'BusPostController@edit');
Route::view('/addbus', 'negad.bus.addbus');
Route::delete('/busdelete', 'BusPostController@destroy')->name('bus.destroy');  
Route::patch('/busupdate', 'BusPostController@update')->name('bus.update');
////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////
///////////////////***********for personal user*****************////////////////////
////////////////////////////////////////////////////////////////////////////////////
Route::get('/bususer', function () {
    return view('user.bususer');
});
Route::get('/bususer', 'BusTicketController@index');
Route::post('/bususer', 'BusTicketController@list');
Route::patch('/count', 'BusTicketController@update');
Route::get('/test', function () {
    return view('user.test');
});
Route::get('/hoteluser', 'HotelBookController@store');
Route::post('/hoteluser', 'HotelBookController@show');
Route::get('/job', 'CompanyPostController@show')->name('companyPost.show');
Route::post('/search', 'CompanyPostController@store');
/////////////////////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////////
/////////////////////for HOTEL service provider///////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
Route::get('/hoteldash', function () {
    return view('negad.hotel.hoteldash');
});
Route::get('/hoteladd', function () {
    return view('negad.hotel.add');
});
Route::get('/hotelview', function () {
    return view('negad.hotel.view');
});
Route::get('/addroom', 'HotelBookController@index');    

Route::post('/addroom', 'HotelBookController@create')->name('addroom.create');
Route::patch('/update', 'HotelBookController@update')->name('hotel.update');  
Route::delete('/delete', 'HotelBookController@destroy')->name('hotel.destroy');  
Route::get('/view', 'HotelBookController@edit')->name('hotel.edit');
////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
////////////////////////for company//////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
Route::get('/companyregistration', 'CompanyController@index');
Route::post('/companyregistration', 'CompanyController@register');
Route::get('/postjob', function () {
    return view('negad.company.job');
});
Route::post('/postjob', 'CompanyPostController@create');
Route::get('/viewpost', 'CompanyPostController@edit');
Route::patch('/postupdate', 'CompanyPostController@update')->name('post.update');
Route::delete('/postdelete', 'CompanyPostController@destroy')->name('post.delete');  
/////////////////////////////////////////////////////////////////////////////////////////



Route::get('/personal_user', function () {
    return view('user.dash');
});
Route::get('/company', function () {
    return view('negad.company.companydash');
});
Route::get('/hotel', function () {
    return view('negad.hotel.hoteldash');
});
Route::get('/track', function () {
    return view('negad.trackdash');
});
Route::get('/travel', function () {
    return view('negad.traveldash');
});
Route::get('/abdu', function () {
    return view('www.themrau.com');
});
