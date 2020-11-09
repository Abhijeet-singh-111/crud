<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Subcatecontorller;
use App\Http\Controllers\Itemscontroller;
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

// Route::view('/', 'index');
Route::get('/',[CategoriesController::class,'index']);
Route::get('/add-categorie',[CategoriesController::class,'addcate']);
Route::post('/add-categorie',[CategoriesController::class,'postform']);
Route::get('/edit-categorie/{id}',[CategoriesController::class,'formeditview']);
Route::post('/edit-categorie/{id}',[CategoriesController::class,'formedit']);
Route::get('/delete-categorie/{id}',[CategoriesController::class,'formdelete']);

Route::get('/list-subcategorie',[Subcatecontorller::class,'index']);
Route::get('/add-subcategorie',[Subcatecontorller::class,'addsubcate']);
Route::post('/add-subcategorie',[Subcatecontorller::class,'postform']);
Route::get('/edit-subcategorie/{id}',[Subcatecontorller::class,'formeditview']);
Route::post('/edit-subcategorie/{id}',[Subcatecontorller::class,'formedit']);
Route::get('/delete-subcategorie/{id}',[Subcatecontorller::class,'formdelete']);

Route::get('/list-items',[Itemscontroller::class,'index']);
Route::get('/add-item',[Itemscontroller::class,'create']);
Route::post('/add-item',[Itemscontroller::class,'store']);
Route::get('/edit-item/{id}',[Itemscontroller::class,'edit']);
Route::post('/edit-item/{id}',[Itemscontroller::class,'update']);
Route::get('/delete-item/{id}',[Itemscontroller::class,'destroy']);
