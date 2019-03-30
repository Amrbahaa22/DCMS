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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
	function(){

	Route::prefix('users')->name('users.')->middleware(['auth'])->group(function(){
	
		Route::get('/index','Dentalcliniccontroller@index')->name('index');

		//doctors route
		Route::resource('doctors','Doctorcontroller')->except(['show']);
		//employees route
		Route::resource('employees','Employeecontroller')->except(['show']);

		Route::resource('patients','Patientcontroller')->except(['show']);

});


});


Route::get('/', function () {
    return redirect()->route('users.index');
});


Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
