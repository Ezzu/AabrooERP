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

Auth::routes();

// **********************
// *************
//
//  Admin Route Groups
//
// *************
// **********************

Route::group(['as' => 'admin.', 'prefix' => 'admin/'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // ********************************
    //  Donars Class Routes
    // ********************************
    Route::resource('donars_class', 'Admin\DonarsClassController');

    // ********************************
    //  Donars Routes
    // ********************************
    Route::resource('donars', 'Admin\DonarsController');

    // ********************************
    //  Solid Waste Donars Routes
    // ********************************
    Route::resource('swdonars', 'Admin\SWDonarsController');

    // ********************************
    //  Areas Routes
    // ********************************
    Route::resource('areas', 'Admin\AreasController');
    Route::get('students/{id}/active', ['uses' => 'Admin\AreasController@active', 'as' => 'areas.active']);
    Route::get('students/{id}/inactive', ['uses' => 'Admin\AreasController@inactive', 'as' => 'areas.inactive']);

    // ********************************
    //  Payment Types Routes
    // ********************************
    Route::resource('payment_types', 'Admin\PaymentTypesController');

    // ********************************
    //  Student Routes
    // ********************************
    Route::resource('students', 'Admin\StudentsController');
    Route::get('students/{id}/print', ['uses' => 'Admin\StudentsController@print', 'as' => 'students.print']);

    // ********************************
    //  Students Donars Routes
    // ********************************
    Route::resource('students_donars', 'Admin\StudentsDonarsController');
    Route::post('students_donars/datatables', ['uses' => 'Admin\StudentsDonarsController@datatables', 'as' => 'students_donars.datatables']);

    // ********************************
    //  Branches Routes
    // ********************************
    Route::resource('branches', 'Admin\BranchesController');
    Route::get('branches/{id}/active', ['uses' => 'Admin\BranchesController@active', 'as' => 'branches.active']);
    Route::get('branches/{id}/inactive', ['uses' => 'Admin\BranchesController@inactive', 'as' => 'branches.inactive']);    

    // ********************************
    //  Departments Routes
    // ********************************
    Route::resource('departments', 'Admin\DepartmentsController');
    Route::get('departments/{id}/active', ['uses' => 'Admin\DepartmentsController@active', 'as' => 'departments.active']);
    Route::get('departments/{id}/inactive', ['uses' => 'Admin\DepartmentsController@inactive', 'as' => 'departments.inactive']);    

    // ********************************
    //  Job Titles Routes
    // ********************************
    Route::resource('job_titles', 'Admin\JobTitlesController');
    Route::get('job_titles/{id}/active', ['uses' => 'Admin\JobTitlesController@active', 'as' => 'job_titles.active']);
    Route::get('job_titles/{id}/inactive', ['uses' => 'Admin\JobTitlesController@inactive', 'as' => 'job_titles.inactive']);    

    // ********************************
    //  Banks Routes
    // ********************************
    Route::resource('banks', 'Admin\BanksController');
    Route::get('banks/{id}/active', ['uses' => 'Admin\BanksController@active', 'as' => 'banks.active']);
    Route::get('banks/{id}/inactive', ['uses' => 'Admin\BanksController@inactive', 'as' => 'banks.inactive']);    
    
    // ********************************
    //  Employees Routes
    // ********************************
    Route::resource('employees', 'Admin\EmployeesController');
    Route::post('employees/{id}/qualification_delete', ['uses' => 'Admin\EmployeesController@delete_qualification', 'as' => 'qualifications.delete']);
    Route::get('employees/{id}/active', ['uses' => 'Admin\EmployeesController@active', 'as' => 'employees.active']);
    Route::get('employees/{id}/inactive', ['uses' => 'Admin\EmployeesController@inactive', 'as' => 'employees.inactive']);    

        
    // ********************************
    //  SW Employees Routes
    // ********************************
    Route::resource('swemployees', 'Admin\SWEmployeesController');
    Route::get('swemployees/{id}/active', ['uses' => 'Admin\SWEmployeesController@active', 'as' => 'swemployees.active']);
    Route::get('swemployees/{id}/inactive', ['uses' => 'Admin\SWEmployeesController@inactive', 'as' => 'swemployeescd.inactive']);    
});
