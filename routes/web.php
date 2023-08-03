<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/',[App\Http\Controllers\postController::class, 'index'])->name('home');

Route::post('follow/{user}',[App\Http\Controllers\FollowsController::class,'store'])->name('f.store');;

Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create'])->name('p.create');
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('p.show');
Route::post('/p', [App\Http\Controllers\PostController::class, 'store'])->name('p.store');

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('p.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('p.update');
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
