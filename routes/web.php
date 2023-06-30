<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FiturController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\CatgoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\Admin\BridegroomController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\WeddingDataController;
use App\Http\Controllers\Admin\GiftPaymentController;
use App\Http\Controllers\Admin\InvitedGuestController;
use App\Http\Controllers\Admin\WeddingCeremonyController;
use App\Http\Controllers\Admin\WeddingReceptionController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


Route::prefix('/super/admin')
    ->middleware(['auth', 'superAdmin'])
    ->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('albums', AlbumController::class);
        Route::resource('bridegrooms', BridegroomController::class);
        Route::resource('catgories', CatgoryController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('invited-guests', InvitedGuestController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('quotes', QuoteController::class);
        Route::resource('stories', StoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('visitors', VisitorController::class);
        Route::resource('wedding-ceremonies', WeddingCeremonyController::class);
        Route::get('all-wedding-data', [
            WeddingDataController::class,
            'index',
        ])->name('all-wedding-data.index');
        Route::post('all-wedding-data', [
            WeddingDataController::class,
            'store',
        ])->name('all-wedding-data.store');
        Route::get('all-wedding-data/create', [
            WeddingDataController::class,
            'create',
        ])->name('all-wedding-data.create');
        Route::get('all-wedding-data/{weddingData}', [
            WeddingDataController::class,
            'show',
        ])->name('all-wedding-data.show');
        Route::get('all-wedding-data/{weddingData}/edit', [
            WeddingDataController::class,
            'edit',
        ])->name('all-wedding-data.edit');
        Route::put('all-wedding-data/{weddingData}', [
            WeddingDataController::class,
            'update',
        ])->name('all-wedding-data.update');
        Route::delete('all-wedding-data/{weddingData}', [
            WeddingDataController::class,
            'destroy',
        ])->name('all-wedding-data.destroy');

        Route::resource(
            'wedding-receptions',
            WeddingReceptionController::class
        );
        Route::resource('gifts', GiftController::class);
        Route::resource('gift-payments', GiftPaymentController::class);
        Route::resource('fiturs', FiturController::class);
        Route::resource('websites', WebsiteController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('testimonies', TestimonyController::class);
        Route::resource('themes', ThemeController::class);
    });
