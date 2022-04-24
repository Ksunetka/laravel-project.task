<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/', function () {
    return redirect('login');
})->middleware('guest');

Auth::routes(['verify' => true]);

Route::get('/home', [ApplicationController::class, 'index'])->name('home')->middleware('verified');
Route::post('/save', [ApplicationController::class, 'save'])->name('save.application');
Route::get('/open/{file}', [ApplicationController::class, 'openFile'])->name('open.file');
Route::get('/create', function () {
    return view('form');
})->middleware('auth')->name('create.application');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
