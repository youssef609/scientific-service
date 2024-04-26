<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController ;
use App\Http\Controllers\LoginController ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[IndexController::class ,'index'] )->name('index.index') ; 

Route::get('/index/{index}', [IndexController::class,'show'])->name('index.show') ;

Route::get('/index/create', [IndexController::class,'create'])->name('index.create') ;//signup-stu

Route::post('/index', [IndexController::class ,'store'])->name('index.store') ; //signup-stu  

Route::post('/index/student-services', [LoginController::class ,'store'])->name('index.store-login-stu') ; //login-stu 









