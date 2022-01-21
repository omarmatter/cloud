<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/home', 'HomeController@index')->name('home');
// employee
Route::get('employee','EmployeeController@index');
Route::post('employee/store','EmployeeController@store');
Route::get('employee/show/{id}','EmployeeController@show');
Route::put('employee/update/{id}','EmployeeController@update');
Route::get('employee/delete/{id}','EmployeeController@destroy');

// salary
Route::get('salary/','SalaryController@index');
Route::get('employee/salary','SalaryController@employeeIndex');
Route::post('salary/store','SalaryController@store');
Route::get('salary/show/{id}','SalaryController@show');
Route::put('salary/update/{id}','SalaryController@update');
Route::get('salary/delete/{id}','SalaryController@destroy');


// holiday
Route::resource('holiday/',HolidaysController::class);
Route::post('holiday/store','HolidaysController@store');
Route::get('holiday/show/{id}','HolidaysController@show');
Route::put('holiday/update/{id}','HolidaysController@update');
Route::get('holiday/delete/{id}','HolidaysController@destroy');
Route::get('holiday/accept/{id}','HolidaysController@accept');
Route::patch('holiday/reject/','HolidaysController@reject');

// rejected_holiday
Route::resource('rejectedHoliday/',RejectedHolidaysController::class);


// message
Route::resource('message/',MessageController::class);
Route::post('message/store','MessageController@store');
Route::get('message/show/{id}','MessageController@show');
Route::put('message/update/{id}','MessageController@update');
Route::get('message/delete/{id}','MessageController@destroy');

Route::resource('role/',RoleController::class);
Route::resource('payroll/',ChecksController::class);
Route::resource('job/',JobTypeController::class);
Route::resource('onAccount/',OnaccountController::class);
Route::get('/{page}', 'AdminController@index');



// role
Route::post('role/store','RoleController@store');
Route::get('role/show/{id}','RoleController@show');
Route::put('role/update/{id}','RoleController@update');
Route::get('role/delete/{id}','RoleController@destroy');

// jobType
Route::post('job/store','JobTypeController@store');
Route::get('job/show/{id}','JobTypeController@show');
Route::put('job/update/{id}','JobTypeController@update');
Route::get('job/delete/{id}','JobTypeController@destroy');

});

