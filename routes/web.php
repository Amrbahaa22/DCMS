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
		//Dentalclinic route
		// Route::get('index','Dentalcliniccontroller@index')->name('index');
		//
		Route::resource('main','Dentalcliniccontroller');
		//doctors route
		Route::resource('doctors','Doctorcontroller')->except(['show']);
		//createbonus to doctor route
		Route::resource('bonus','Bonuscontroller');
		//employees route
		Route::resource('employees','Employeecontroller')->except(['show']);
		//patients route
		Route::resource('patients','Patientcontroller');
		//Doctorprocesspatientcontroller route
		Route::resource('docpatients','Doctorprocesspatientcontroller')->except(['index','create','store','delete']);
		

		Route::get('patient_sessions/create/{id}', ['as' => 'patient_sessions.create','uses' => 'Sessioncontroller@create']);
		//Session route
		Route::resource('patient_sessions','Sessioncontroller')->except(['create']);
		//patient lab route
		Route::resource('AddLab','Patientlabcontroller');

});

		// labs route
		Route::resource('labs','Labcontroller');
		// expenses route
		Route::resource('expenses','Expensescontroller');
		//todat patiens route
		Route::resource('patients','Todaypatientscontroller');
		//report route
		Route::resource('report','Reportcontroller');
		//workhour route
		Route::resource('workhours','Workedhourscontroller');
});


Route::get('/', function () {
    return redirect()->route('users.main.index');
});


Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
