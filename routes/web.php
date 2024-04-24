<?php

use App\Http\Controllers\Admin\BlogsController as AdminBlogsController;
use App\Http\Controllers\Admin\DonationsController as AdminDonationsController;
use App\Http\Controllers\Admin\EventsController as AdminEventsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [PagesController::class, 'home'])->name('home');
    Route::get('/about', [PagesController::class, 'about'])->name('about');
    Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('/events', [PagesController::class, 'events'])->name('events');
    Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{blog}', [PagesController::class, 'blog'])->name('blog');
    Route::get('/events/{event}', [PagesController::class, 'event'])->name('event');
    Route::get('/events/{donation}/success', [PagesController::class, 'esewa_success'])->name('esewa_success');
    Route::get('/events/{donation}/failure', [PagesController::class, 'esewa_failure'])->name('esewa_failure');
    Route::post('/events/{event}/donate', [PagesController::class, 'donate'])->name('donate');

    Route::post('/contact', [PagesController::class, 'contactMail'])->name('contactMail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'guest'])->name('guest');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {

    Route::post('/users/{user}/login', [UsersController::class, 'login'])->name('users.login');
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);

    Route::patch('events/{event}/status', [AdminEventsController::class, 'approve'])->name('events.approve');
    Route::resource('events', AdminEventsController::class);

    Route::post('donations/export', [AdminDonationsController::class, 'export'])->name('donations.export');
    Route::resource('donations', AdminDonationsController::class);

    Route::resource('blogs', AdminBlogsController::class);
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::resource('events', EventsController::class)->middleware('beneficiary');
    Route::resource('donations', DonationsController::class);
    Route::resource('blogs', BlogsController::class)->middleware('beneficiary');
});
