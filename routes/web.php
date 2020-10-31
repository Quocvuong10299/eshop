<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//
Route::get('/', function () {
    return view('admin.dashboard.dashboard');
});

//User
Route::get('/user/sign-up', [UserController::class, 'signUpView']);
Route::post('/user/sign-up', [UserController::class, 'signUpAction']);

Route::group(['prefix' => 'admin'], function () {
    //Trang dang nhap cua admin
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    //Admin dang ky tai khoan moi
    Route::get('/sign-up', [AdminController::class, 'showSignUpView'])->name('admin.signUp');
    Route::post('/sign-up', [AdminController::class, 'handleSignUp'])->name('admin.handleSignUp');

    //Kiem tra co ton tai email
    Route::get('/check/email/{email}', [AdminController::class, 'checkAdminEmailExists']);

    //Kiem tra co khop password
    Route::post('/check/password', [AdminController::class, 'checkPassword']);

    //Activated Admin
    Route::get('/activated', [AdminController::class, 'activated']);
    Route::get('/reactivated', [AdminController::class, 'reActivated'])->name('reactivated');

    //ForgotPassword
    Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('admin.forgot.password');
    Route::get('/reset-password', [AdminController::class, 'resetPassword']);
    Route::post('/reset-password', [AdminController::class, 'handleResetPassword']);
    Route::get('/user', [AdminUserController::class, 'index']);

    //Dang xuat admin
    Route::get('/log-out',[AdminController::class,'logout']);

    // categories
    Route::group(['prefix'=>'categories'], function (){
        Route::get('/',[CateController::class, 'index'])->name('categories');
        Route::get('/create',[CateController::class, 'create'])->name('categories.create');
        Route::post('/create',[CateController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}',[CateController::class, 'edit'])->name('categories.edit');
        Route::put('/edit/{id}',[CateController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}',[CateController::class, 'destroy'])->name('categories.destroy');
    });

    // Articles
    Route::group(['prefix'=>'articles'], function () {
        Route::get('/', [ArticlesController::class, 'index'])->name('articles');
        Route::get('/create', [ArticlesController::class, 'create'])->name('articles.create');
        Route::post('/create', [ArticlesController::class, 'store'])->name('articles.store');
        Route::get('/detail/{id}', [ArticlesController::class, 'detail'])->name('articles.detail');
        Route::get('/edit/{id}', [ArticlesController::class, 'edit'])->name('articles.edit');
        Route::put('/edit/{id}', [ArticlesController::class, 'update'])->name('articles.update');
        Route::get('/delete/{id}',[ArticlesController::class, 'destroy'])->name('articles.destroy');
    });

    Route::group(['middleware' => 'authAdmin'], function () {
        //Trang dashboard cua admin
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
    });
});

//Api
Route::post('/api/user/login', [UserController::class, 'login']);
