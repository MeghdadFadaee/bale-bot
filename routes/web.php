<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::any('blockout', function (){
  
  $url = 'https://qepd.co.ir/fa-IR/DouranPortal/6423';
  @$content = file_get_contents($url);
  return $content;
});