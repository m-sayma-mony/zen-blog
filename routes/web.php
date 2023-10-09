<?php

use App\Http\Controllers\Backend\BackendBlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


// Frontend 

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blog', [BlogController::class,'index'])->name('blog');
Route::get('/about', [AboutController::class,'index'])->name('about');

// Backend 

Route::get('admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
Route::get('admin/category/create', [CategoryController::class,'create'])->name('admin.category.create');
Route::post('admin/category/store', [CategoryController::class,'store'])->name('admin.category.store');
Route::get('admin/category/manage', [CategoryController::class,'index'])->name('admin.category.manage');
Route::get('admin/category/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
Route::post('admin/category/update/{id}', [CategoryController::class,'update'])->name('admin.category.update');
Route::post('admin/category/delete/{id}', [CategoryController::class,'delete'])->name('admin.category.delete');



Route::resource('blogs', BackendBlogController::class);