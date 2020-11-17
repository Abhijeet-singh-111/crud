<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcateContorller;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use auth;
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

Route::group(['middleware'=>'auth'],function(){

Route::get('/list-categorie',[CategoriesController::class,'index']);
Route::get('/add-categorie',[CategoriesController::class,'addcate']);
Route::post('/add-categorie',[CategoriesController::class,'postform']);
Route::get('/edit-categorie/{id}',[CategoriesController::class,'formeditview']);
Route::post('/edit-categorie/{id}',[CategoriesController::class,'formedit']);
Route::get('/delete-categorie/{id}',[CategoriesController::class,'formdelete']);

Route::get('/list-subcategorie',[SubcateContorller::class,'index']);
Route::get('/add-subcategorie',[SubcateContorller::class,'addsubcate']);
Route::post('/add-subcategorie',[SubcateContorller::class,'postform']);
Route::get('/edit-subcategorie/{id}',[SubcateContorller::class,'formeditview']);
Route::post('/edit-subcategorie/{id}',[SubcateContorller::class,'formedit']);
Route::get('/delete-subcategorie/{id}',[SubcateContorller::class,'formdelete']);

Route::get('/list-items',[ItemsController::class,'index']);
Route::get('/add-item',[ItemsController::class,'create']);
Route::post('/add-item',[ItemsController::class,'store']);
Route::get('/edit-item/{id}',[ItemsController::class,'edit']);
Route::post('/edit-item/{id}',[ItemsController::class,'update']);
Route::get('/delete-item/{id}',[ItemsController::class,'destroy']);

});

Route::get('/',[SignupController::class,'index']);
Route::post('/',[SignupController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'AuthUser'])->name('login');

Route::post('/logout',[LoginController::class, 'Logout']);


