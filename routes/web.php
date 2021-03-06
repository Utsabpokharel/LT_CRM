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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::any('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::middleware(['auth', 'employee'])->group(function () {
        //Customer
        Route::resource('customer', CustomersController::class);

        Route::middleware(['auth', 'admin'])->group(function () {
            //users
            Route::resource('user', AllUsersController::class);
            //employee
            Route::resource('employee', EmployeesController::class);
            //departments
            Route::resource('department', DepartmentsController::class);
            //vendors
            Route::resource('vendor', VendorsController::class);
            //level
            Route::resource('level', LevelsController::class);
            //title
            Route::resource('title', TitlesController::class);
            //notifications
            Route::get(
                '/notification',
                [DashboardController::class, 'notifications']
            )->name('notification');
            Route::get('/LeaveApplymarkasread', function () {
                auth()->user()->unreadNotifications->where('type', 'App\Notifications\LeaveApply')->markAsRead();
                return redirect()->route('leave.index');
            })->name('LeaveApplymarkasread');
            Route::get('/Usermarkasread', function () {
                auth()->user()->unreadNotifications->where('type', 'App\Notifications\UserNotify')->markAsRead();
                return redirect()->route('user.index');
            })->name('Usermarkasread');
            //middleware for superadmin
            Route::middleware(['auth', 'super'])->group(function () {
                //roles
                Route::resource('role', RolesController::class);
            });
        });
    });
});
Route::group(['prefix' => 'admin', 'namespace' => 'Leaves', 'middleware' => ['auth']], function () {
    Route::middleware(['auth', 'employee'])->group(function () {
        //leaves
        Route::resource('leave', LeavesController::class);
        //pending
        Route::get('/Pending-Leaves', 'LeavesController@pending')->name('pendingLeave');
        Route::get('/My-Leaves', 'LeavesController@employeeLeave')->name('myLeaves');

        Route::middleware(['auth', 'admin'])->group(function () {
            //approved
            Route::put('/Leave-Approved/{id}', 'LeavesController@approve')->name('approve');
            Route::get('/Approved-Leave', 'LeavesController@leaveApproved')->name('leaveApproved');
            //rejected
            Route::put('/Leave-Rejected/{id}', 'LeavesController@reject')->name('reject');
            Route::get('/Rejected-Leave', 'LeavesController@leaveRejected')->name('leaveRejected');
            //leave type
            Route::resource('leaveType', LeaveTypesController::class);
        });
    });
});
Route::group(['prefix' => 'admin', 'namespace' => 'Task', 'middleware' => ['auth', 'employee']], function () {

    Route::middleware(['auth', 'admin'])->group(function () {
        //pending
        Route::put('/Todo-Pending/{id}', 'ToDosController@pending')->name('pending');
        Route::get('/Pending-Tasks', 'ToDosController@pendingTask')->name('pendingTask');
        //complete
        Route::put('/Todo-Complete/{id}', 'ToDosController@complete')->name('complete');
        Route::get('/Completed-Tasks', 'ToDosController@completeTask')->name('completedTask');
    });
    //todos
    Route::resource('todo', ToDosController::class);
    //all  tasks
    Route::get('/allTasks', 'ToDosController@alltask')->name('alltask');
    //assigned tasks
    Route::get('/assignedTasks', 'ToDosController@assigned')->name('assigned');
    //received tasks
    Route::get('/receivedTasks', 'ToDosController@received')->name('received');
    //re-assign
    Route::put('/Todo-reassign/{id}', 'ToDosController@reaassign')->name('reaassign');
    //edit re-assign
    Route::any('/Todo-editreassign/{id}', 'ToDosController@editreaassign')->name('editre-assign');
    Route::any('/Todo-updatereassign/{id}', 'ToDosController@updateReassign')->name('updateReassign');
    //task re-assign
    Route::put('/Todo-ReAssign/{id}', 'ToDosController@ReAssign')->name('ReAssign');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Enquiry', 'middleware' => ['auth', 'employee']], function () {
    //enquiry source
    Route::resource('enquirysource', EnquirySourcesController::class);
    //enquiry category
    Route::resource('enquirycategory', EnquiryCategoryController::class);
    //enquiry
    Route::resource('enquiry', EnquiryController::class);
    //enquiry response
    Route::resource('enquiryresponse', EnquiryResponsesController::class);
});
Route::group(['prefix' => 'admin', 'namespace' => 'Account', 'middleware' => ['auth', 'employee']], function () {
    //income
    Route::resource('income', IncomesController::class);
    //income category
    Route::resource('incomecategory', IncomesCategoryController::class);
    //expense
    Route::resource('expense', ExpensesController::class);
    //expense category
    Route::resource('expensecategory', ExpensesCategoryController::class);
    //cash in
    Route::resource('cashIn', CashInsController::class);
    //cash out
    Route::resource('cashOut', CashOutsController::class);
    //invoices
    Route::resource('invoice', InvoicesController::class);
});
Route::group(['prefix' => 'admin', 'namespace' => 'Setting', 'middleware' => ['auth', 'customer']], function () {
    //change password
    Route::get('/change-password', 'PasswordSettingsController@changepassword')->name('password');
    Route::put('/Update-Password', 'PasswordSettingsController@password_update')->name('password.update');
    Route::middleware(['auth', 'admin'])->group(function () {
        //general
        Route::get('general-setting', 'GeneralSettingsController@index')->name('general');
        //payment
        Route::get('payment', 'PaymentSettingsController@index')->name('payment');
        //email
        Route::get('email', 'EmailSettingsController@index')->name('email');
    });
});
Route::group(['prefix' => 'admin', 'namespace' => 'Profile', 'middleware' => ['auth', 'customer']], function () {
    Route::middleware(['auth', 'employee'])->group(function () {
        //bank account
        Route::resource('bankaccount', BankAccountsController::class);
    });
    //profile
    Route::get('My-Profile', 'ProfileController@index')->name('profile');
    Route::get('Update-Profile', 'ProfileController@update')->name('updateprofile');
    //personal details
    Route::any('Personal-Details', 'PersonalDetailsController@store')->name('personal.store');
    Route::any('Edit-Personal-Details/{id}', 'PersonalDetailsController@edit')->name('personal.edit');
    Route::any('Update-Personal-Details/{id}', 'PersonalDetailsController@update')->name('personal.update');
    //work details
    Route::any('Work-Details', 'WorkDetailsController@store')->name('work.store');
    Route::any('Edit-Work-Details/{id}', 'WorkDetailsController@edit')->name('work.edit');
    Route::any('Update-Work-Details/{id}', 'WorkDetailsController@update')->name('work.update');
    //education details
    Route::any('Education-Details', 'EducationDetailsController@store')->name('education.store');
    Route::any('Edit-Education-Details/{id}', 'EducationDetailsController@edit')->name('education.edit');
    Route::any('Update-Education-Details/{id}', 'EducationDetailsController@update')->name('education.update');
});
