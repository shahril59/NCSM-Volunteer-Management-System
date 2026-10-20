<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});
Route::view('/mykpm', 'home')->name('home');
Route::get('/mykpm/about', [PageController::class, 'about'])->name('about');

//customer route using function in CustomerController just to display form addnewcustomer
Route::get('mykpm/addnewcustomer', [CustomerController::class,
            'addnewcustomerfunctionform'])->name('addnewcustomerform');

//route after user click on submit in form addnewcustomer, must be the same routename in form action
Route::post('mykpm/submitcustomer',
[CustomerController::class, 'postnewcustomer'])->name('submitcustomer');

Route::get('mykpm/viewcustomer', 
[CustomerController::class, 'viewcustomer'])->name('viewcustomer');

// path to display form updatecustomer.blade.php
Route::get('mykpm/editcustomer/{custmykad}',
[CustomerController::class, 'editcustomer'])->name('editcustomer');

// path after user click UPDATE in updatecustomer.blade.php,
//must be the same routename in form action
Route::post('mykpm/updatecustomer/{custmykad}',
[CustomerController::class, 'updatecustomer'])->name('updatecustomer');



// path to display form deletecustomer.blade.php
Route::get('mykpm/deletecustomer/{custmykad}',
[CustomerController::class, 'deletecustomerconfirm'])->name('deletecustomerconfirm');


// path after user click confirm delete deletecustomer.blade.php,
//make sure you call the same routename in the form action
Route::post('mykpm/deletecustomer/{custmykad}',
[CustomerController::class, 'deletecustomer'])->name('deletecustomer');

