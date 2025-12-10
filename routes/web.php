<?php

use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavbarController;
use App\Models\Footer;
use App\Models\Home;
use App\Models\Navbar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $navbar = Navbar::first();
    $footer = Footer::all();
    $home = Home::all();
    $about = Home::where('section_name', 'about')->get()->keyBy('sub_section');
    return view('alfa-karir.home', compact('navbar', 'footer', 'home', 'about'));
})->name('index');
Route::get('/admin', function () {
    return view('careersite.content-management');
})->name('all');

Route::resource('navbar', controller: NavbarController::class);
Route::resource('footer', controller: FooterController::class);
Route::resource('home', controller: HomeController::class);
Route::get('/detail/{section_name}', [HomeController::class, 'detail'])->name('detail');