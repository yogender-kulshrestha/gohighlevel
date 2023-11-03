<?php

use App\Http\Controllers\PublicController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('phpinfo', function () {
    return phpinfo();
});

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/contacts', [PublicController::class, 'contacts'])->name('contacts');
Route::get('/contacts/{id}', [PublicController::class, 'contactDetails'])->name('contacts.show');

Route::get('/auth-initiate', [PublicController::class, 'authInitiate'])->name('auth.initiate');
Route::get('/auth-refresh', [PublicController::class, 'authRefresh'])->name('auth.refresh');
Route::any('/oauth/callback', [PublicController::class, 'callback'])->name('auth.callback');

