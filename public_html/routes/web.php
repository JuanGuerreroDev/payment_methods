<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialLoginController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login/redirect/{provider}', [SocialLoginController::class, 'login'])->name('auth.login');
Route::get('/login/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.callback');


require __DIR__.'/auth.php';
