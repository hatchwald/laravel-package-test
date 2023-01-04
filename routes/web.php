<?php
use Illuminate\Support\Facades\Route;
use MTR\PostPackage\Http\Controllers\PostController;

Route::get("/post",[PostController::class,'index'])->name('posts.index');
Route::get("/post/create",[PostController::class,'create'])->name('posts.details');
Route::post("/post/create",[PostController::class,'store'])->name('posts.store');
Route::get("/post/{post}",[PostController::class,'show'])->name('posts.show');
Route::get("/post/search/{key}",[PostController::class,'search'])->name('posts.search');
Route::put("/post/{post}",[PostController::class,'update'])->name('posts.update');