<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.Portfolio');
});

Route::get('register',[authcontroller::class,'showregister'])->name('register.form')
Route::post('register',[authcontroller::class,'register'])->name('register')

Route::get('login',[authcontroller::class,'showlogin'])->name('login.form')
Route::post('login',[authcontroller::class,'login'])->name('login')
Route::get('dashboard', function(){
    return view('dashboard');
    
})
