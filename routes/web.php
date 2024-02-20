<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesControllers;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TagesControllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'indexUser']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/Register', [AuthController::class, 'Register']);
Route::get('/ForgetPassword', [AuthController::class, 'ForgetPassword']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/User/Register', [AuthController::class, 'User_Register']);
Route::post('/User/Login', [AuthController::class, 'User_Login']);

// router Admin
Route::get('/Home', [Controller::class, 'index']);
Route::get('/Users', [UserController::class, 'index']);
Route::get('/Products', [ProductController::class, 'index']);
Route::get('/Categories', [CategoriesControllers::class, 'index']);
Route::post('/addProduct', [ProductController::class, 'add']);
Route::get('/DeletProduct/{id}', [ProductController::class, 'delet']);
Route::post('/UpdateProduct/{id}', [ProductController::class, 'update']);
Route::post('/addCategory', [CategoriesControllers::class, 'add']);
Route::post('/updateCategory/{id}', [CategoriesControllers::class, 'update']);
Route::get('/DeletCategory/{id}', [CategoriesControllers::class, 'delet']);
Route::get('/Tags', [TagesControllers::class, 'index']);
Route::post('/addTags', [TagesControllers::class, 'add']);
Route::post('/updateTags/{id}', [TagesControllers::class, 'update']);
Route::get('/DeletTage/{id}', [TagesControllers::class, 'delet']);
Route::get('/Orders', [SaleController::class, 'index']);
Route::get('/Permissions', [PermissionController::class, 'index']);
Route::post('/DeletePermission', [PermissionController::class, 'destroy']);
Route::post('/addPermission', [PermissionController::class, 'add']);

// router User 
Route::get('/Home/User', [UserController::class, 'indexUser']);
Route::get('/AllProduct', [UserController::class, 'getAllProduct']);
Route::get('/SearchProduct/{search}', [UserController::class, 'SearchProduct']);
Route::get('/FilterProduct/{search}', [UserController::class, 'FilterProduct']);
Route::get('/SearchProductPrice/{search}', [UserController::class, 'SearchProductPrice']);
Route::get('/orderds/{id}', [SaleController::class, 'orderdsUser']);
Route::post('/OrderProduct', [SaleController::class, 'OrderProduct']);
Route::post('/Payment', [SaleController::class, 'Payment']);


Route::post('/sendMail', [MailController::class, 'sendMail']);
Route::post('/restMyPassword', [UserController::class, 'restMyPassword']);
Route::get('/password/reset/{token}', [UserController::class, 'resete_password'])->name('password/reset/');


