<?php

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\NotifiesController;
use App\Http\Controllers\PostsController;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
//use App\Http\Controllers\Auth\ConfirmPasswordController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'get'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'post'])->name('login.post');

Route::post('/logout', [LogoutController::class, 'post'])->name('logout');



Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/create', [UsersController::class, 'create'])->name('create');
    Route::post('/store', [UsersController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('destroy');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('update');
    Route::get('/show/{id}', [UsersController::class, 'show'])->name('show');
});

Route::prefix('messages')->name('messages.')->group(function () {
    Route::get('/', [MessagesController::class, 'index'])->name('index');
    Route::get('/create', [MessagesController::class, 'create'])->name('create');
    Route::post('/store', [MessagesController::class, 'store'])->name('store');
    Route::put('/update/{id}', [MessagesController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [MessagesController::class, 'edit'])->name('edit');
    Route::delete('/destroy/{id}', [MessagesController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('notifies')->name('notifies.')->group(function() {
        Route::get('/', [NotifiesController::class, 'index'])->name('index');
        Route::get('/create', [NotifiesController::class, 'create'])->name('create');
        Route::post('/store', [NotifiesController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [NotifiesController::class, 'destroy'])->name('destroy');
        Route::get('/mark/{id}', [NotifiesController::class, 'mark'])->name('mark');
    });

    Route::prefix('notifications')->name('notifications.')->group(function() {
        Route::get('/', [NotificationsController::class, 'index'])->name('index');
        Route::get('/show/{id}', [NotificationsController::class, 'show'])->name('show');
        Route::patch('/read/{id}', [NotificationsController::class, 'read'])->name('read');
        Route::delete('/destroy/{id}', [NotificationsController::class, 'destroy'])->name('destroy');
    });
});


Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::get('/show/{id}', [PostsController::class, 'show'])->name('show');
    Route::get('/create', [PostsController::class, 'create'])->name('create');
    Route::post('/store', [PostsController::class, 'store'])->name('store');
});
