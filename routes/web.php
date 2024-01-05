<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookRentUserController;

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

Route::get('/', [PublicController::class, 'index']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/register' , [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profile'])->middleware(['only_client']);
    Route::get('/book-rent-user/{slug}', [BookRentUserController::class, 'index'])->middleware(['only_client']);
    Route::post('/book-rent-user', [BookRentUserController::class, 'store'])->middleware(['only_client']);
    

    Route::middleware(['only_admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/books', [BookController::class, 'index']);
        Route::get('/book-add', [BookController::class, 'create']);
        Route::post('/book', [BookController::class, 'store']);
        Route::get('/book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('/book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('/book-deleted', [BookController::class, 'deleted_book']);
        Route::get('/book-restore/{slug}', [BookController::class, 'restore']);
        Route::get('/book-force-delete/{slug}', [BookController::class, 'force_delete']);
        Route::get('/book-edit/{slug}', [BookController::class, 'edit']);
        Route::put('/book-update/{slug}', [BookController::class, 'update']);

        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/add-category', [CategoryController::class, 'create']);
        Route::post('/category', [CategoryController::class, 'store']);
        Route::get('/category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('/category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('/category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('/category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('/category-deleted', [CategoryController::class, 'deleted_category']);
        Route::get('/category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user-inactive', [UserController::class, 'inactive_list']);
        Route::get('/user-active/{slug}', [UserController::class, 'activated_user']);
        Route::get('/user-detail/{slug}', [UserController::class, 'show']);
        Route::get('/user-ban/{slug}', [UserController::class, 'ban']);
        Route::get('/user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('/user-ban-list', [UserController::class, 'ban_list']);
        Route::get('/user-buka-blokir/{slug}', [UserController::class, 'un_block']);
        Route::get('/user-nonaktifkan/{slug}', [UserController::class, 'deactive']);

        Route::get('/book-rent', [BookRentController::class, 'index']);
        Route::post('/book-rent', [BookRentController::class, 'store']);
        Route::get('/book-return-form', [BookRentController::class, 'returnBook']);
        Route::post('/book-return', [BookRentController::class, 'saveReturnBook']);

        

        Route::get('/rent-logs', [RentLogController::class, 'index']);
    });
    

    
    
});

    

    

