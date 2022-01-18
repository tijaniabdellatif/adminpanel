<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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

Auth::routes();


Route::prefix('dashboard')->group(function(){


           Route::get('/home',[\App\Http\Controllers\HomeController::class,'home'])->name('dashboard.home');

           Route::prefix('families')->group(function(){

               Route::get('/visualize',[\App\Http\Controllers\FamilyController::class,'index'])->name('families.index');
               Route::post('/sub/',[\App\Http\Controllers\FamilyController::class,'getSubFamily'])->name('sub');
           });

           Route::prefix('animals')->group(function(){

               Route::post("store",[\App\Http\Controllers\AnimalController::class,'store'])->name('animal.store');
               Route::get('index',[\App\Http\Controllers\AnimalController::class,'index'])->name('animal.index');
               Route::delete('destroy/{id}',[\App\Http\Controllers\AnimalController::class,'destroy'])->name('animal.destroy');
           });
});


