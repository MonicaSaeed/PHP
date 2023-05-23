<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormValidation;
use App\Http\Controllers\Api;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LocalizationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
],
function(){
    Route::get('/', function () {
        return view('Pages.welcome');
    });
    Route::get('/register', function () {
        return view('Pages.Index');
    });
    Route::post('/index', [FormValidation::class,'checkErrors'])->name('checkErrors');
}
);


Route::view('/','Pages.welcome');
Route::post('/index', [FormValidation::class, 'checkErrors'])->name('checkErrors');
Route::view('/register','Pages.Index');
Route::get('/getActorsName',[Api::class,'getActorsName'])->name('getActorsName');
Route::get('send-mail',[MailController::class,'index']);
