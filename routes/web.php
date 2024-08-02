<?php

use Illuminate\Support\Facades\Route;
use mypackage\testpackage\ExampleClass;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $text=new ExampleClass();
    dd($text->hello()); 
  
});
