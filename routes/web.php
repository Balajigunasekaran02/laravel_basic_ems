<?php

use App\Http\Controllers\EmployeeController;
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

// Route::get('/test', function () {
//     return '<h1>Hello world</h1>';
// });

//call the controller
// Route::get('/home',[HomeController::class,'home']);

//set the roue name
// Route::get('/article',function(){
//     return '<h1>Home Page</h1>';
// })->name('article');

//Group routes
// Route:: group(['prefix' => 'admin'],function(){
//     Route::get('/about_us', function () {
//         return '<h1>About us</h1>';
//     });
//     Route::get('/contact_us', function () {
//         return '<h1>Contact Us</h1>';
//     });
// });


//Employee - separate routes
// Route::get('/employees',[EmployeeController::class,'index'])->name('employee.index');
// Route::get('/employees/create',[EmployeeController::class,'create'])->name('employee.create');
// Route::post('/employees/store',[EmployeeController::class,'store'])->name('employee.store');

// Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('employee.edit');


// Route::get('/employees/{id}/show',[EmployeeController::class,'show'])->name('employee.show');
// Route::post('/employees/{id}/update',[EmployeeController::class,'update'])->name('employee.update');
// Route::delete('/employees/destroy/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');


//This Route is for all employee routes - common Route usoing Resource method
Route::resource('employee', EmployeeController::class);
