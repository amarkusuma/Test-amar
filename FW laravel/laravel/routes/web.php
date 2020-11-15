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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => 'auth' ], function()
{
     Route::get('/company', 'CompanyController@index')->name('company');
     Route::get('/add-company', 'CompanyController@create')->name('add-company');
     Route::get('/company-edit/{id}', 'CompanyController@edit')->name('company.edit');
     Route::post('/edit-company', 'CompanyController@update')->name('company.update');

     Route::get('/delete-company/{id}', 'CompanyController@destroy')->name('company.delete');

     Route::get('/employee', 'EmployeeController@index')->name('employee');
     Route::get('/add-employee', 'EmployeeController@create')->name('add-employee');
     
     Route::get('/delete-employee/{id}', 'EmployeeController@destroy')->name('employee.delete');
});