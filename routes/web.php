<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('test20',[MyController::class,'my_data']);

Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
Route::get('addClient',[ClientController::class,'create'])->name('addClient');
Route::get('/clients', [ClientController::class, 'index'])->middleware('verified')->name('clients');
Route::get('editClients/{id}',[ClientController::class, 'edit'])->name('editClients');
Route::put('updateClients/{id}',[ClientController::class, 'update'])->name('updateClients');
Route::get('showClients/{id}',[ClientController::class, 'show'])->name('showClient');
Route::delete('delClient',[ClientController::class, 'destroy'])->name('delClient');
Route::get('trashClients',[ClientController::class, 'trash'])->name('trashClient');
Route::get('restoreClients/{id}',[ClientController::class, 'restore'])->name('restoreClients');
Route::delete('forceDeleteClient',[ClientController::class, 'forceDelete'])->name('foceDelete');

Route::post('insertStudent',[StudentController::class,'store'])->name('insertStudent');
Route::get('addStudent',[StudentController::class,'create'])->name('addStudent');
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('editStudents/{id}',[StudentController::class, 'edit'])->name('editStudents');
Route::put('updateStudents/{id}',[StudentController::class, 'update'])->name('updateStudents');
Route::get('showStudents/{id}',[StudentController::class, 'show'])->name('showStudent');
Route::delete('delStudent', [StudentController::class, 'destroy'])->name('delStudent');
Route::get('trashtudents',[StudentController::class, 'trash'])->name('trashStudent');
Route::get('restoreStudents/{id}',[StudentController::class, 'restore'])->name('restoreStudents');
Route::delete('forceDeleteStudent', [StudentController::class, 'forceDelete'])->name('forceDelete');


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
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
