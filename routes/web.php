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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::any('/login', 'Auth\LoginController@login')->name('login');

Route::any('/logout', 'Auth\LoginController@logout')->name('logout');
Route::any('/home', 'HomeController@index')->name('home');
 //dashboard
Route::any('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']] ,function(){
    //users
    Route::resource('user',AllUsersController::class);
    //employee
    Route::resource('employee',EmployeesController::class);
    //departments
    Route::resource('department',DepartmentsController::class);
    //Customer
    Route::resource('customer',CustomersController::class);
    //vendors
    Route::resource('vendor',VendorsController::class);
    //level
    Route::resource('level',LevelsController::class);
    //title
    Route::resource('title',TitlesController::class);
    //roles
    Route::resource('role',RolesController::class);
});
Route::group(['prefix'=>'admin','namespace'=>'Leaves'] ,function(){
    //leaves
    Route::resource('leave',LeavesController::class);
    //pending
    Route::get('/Pending-Leaves', 'LeavesController@pending')->name('pendingLeave');
    Route::get('/My-Leaves', 'LeavesController@employeeLeave')->name('myLeaves');
    //approved
    Route::put('/Leave-Approved/{id}', 'LeavesController@approve')->name('approve');
    Route::get('/Approved-Leave', 'LeavesController@leaveApproved')->name('leaveApproved');
    //rejected
    Route::put('/Leave-Rejected/{id}', 'LeavesController@reject')->name('reject');
    Route::get('/Rejected-Leave', 'LeavesController@leaveRejected')->name('leaveRejected');
    //leave type
    Route::resource('leaveType',LeaveTypesController::class);
});
Route::group(['prefix'=>'admin','namespace'=>'Task'] ,function(){
    //todos
    Route::resource('todo',ToDosController::class);
    //pending
    Route::put('/Todo-Pending/{id}', 'ToDosController@pending')->name('pending');
    Route::get('/Pending-Tasks', 'ToDosController@pendingTask')->name('pendingTask');
    //complete
    Route::put('/Todo-Complete/{id}', 'ToDosController@complete')->name('complete');
    Route::get('/Completed-Tasks', 'ToDosController@completeTask')->name('completedTask');
});
Route::group(['prefix'=>'admin','namespace'=>'Enquiry'] ,function(){
    //enquiry source
    Route::resource('enquirysource',EnquirySourcesController::class);
    //enquiry category
    Route::resource('enquirycategory',EnquiryCategoryController::class);
     //enquiry
    Route::resource('enquiry',EnquiryController::class);
    //enquiry response
    Route::resource('enquiryresponse',EnquiryResponsesController::class);
});
Route::group(['prefix'=>'admin','namespace'=>'Account'] ,function(){
    //income
    Route::resource('income',IncomesController::class);
    //income category
    Route::resource('incomecategory',IncomesCategoryController::class);
     //expense
    Route::resource('expense',ExpensesController::class);
    //expense category
    Route::resource('expensecategory',ExpensesCategoryController::class);
    //cash in
    Route::resource('cashIn',CashInsController::class);
    //cash out
    Route::resource('cashOut',CashOutsController::class);
     //invoices
    Route::resource('invoice',InvoicesController::class);
});
Route::group(['prefix'=>'admin','namespace'=>'Setting'] ,function(){
    //general
    Route::get('general-setting', 'GeneralSettingsController@index')->name('general');
    //password
    Route::get('change-password', 'PasswordSettingsController@index')->name('password');
    //payment
    Route::get('payment', 'PaymentSettingsController@index')->name('payment');
    //email
    Route::get('email', 'EmailSettingsController@index')->name('email');
});
Route::group(['prefix'=>'admin','namespace'=>'Profile'] ,function(){
    //bank account
    Route::resource('bankaccount',BankAccountsController::class);
});