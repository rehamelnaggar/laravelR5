<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;

Route::get('test20',[MyController::class,'my_data']);

Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
Route::get('addClient',[ClientController::class,'create'])->name('addClient');
Route::get('/clients', [ClientController::class, 'index'])->name('clients');

Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('addStudent',[StudentController::class,'create'])->name('addStudent');
Route::get('Students',[StudentController::class,'index'])->name('Students');

Route::get('/', function () {
    return view('welcome');
});

Route::get('reham/{id?}', function($id = 0){
    return 'Welcome to my first web site ' . $id;
})->whereNumber('id');

Route::get('course/{name}', function($name){
    return 'My name is: ' . $name;
})->whereIn('name',['reham', 'reem','rana']);

Route::prefix('cars')->group(function(){
    Route::get('bmw', function(){
        return 'Category is BMW';
    });

    Route::get('mercedes',function(){
        return 'Category is Mercedes';
    });
});

Route::get('form1',function(){
    return view('form1');
});

Route::post('recForm1', [MyController::class,'receiveData'])->name('receiveForm1');

// Route::fallback(function(){
//     // return 'The required is not found';
//     return redirect('/');
// });