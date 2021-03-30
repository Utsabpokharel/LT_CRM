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
Route::group(['prefix'=>'admin','namespace'=>'Admin'] ,function(){
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
    //leave type
    Route::resource('leaveType',LeaveTypesController::class);    
});
Route::group(['prefix'=>'admin','namespace'=>'Task'] ,function(){
    //todos     
    Route::resource('todo',ToDosController::class);      
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