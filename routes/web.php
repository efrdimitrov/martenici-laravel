<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PromoController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\UploadController;

/* category */
use App\Http\Controllers\Category\BraceletController;
use App\Http\Controllers\Category\LadyController;
use App\Http\Controllers\Category\KidController;
use App\Http\Controllers\Category\HomeController;
use App\Http\Controllers\Category\HangingController;
use App\Http\Controllers\Category\MedallionController;
use App\Http\Controllers\Category\PackageController;

/* sort */
use App\Http\Controllers\Sort\CheapController;
use App\Http\Controllers\Sort\ExpensiveController;
use App\Http\Controllers\Sort\RecentController;

/* edit */
use App\Http\Controllers\Edit\EditSquareController;
use App\Http\Controllers\Edit\EditSlimController;
use App\Http\Controllers\Edit\EditHomeController;

/* edit quantity */
use App\Http\Controllers\Edit\EditSquareQuantityController;
use App\Http\Controllers\Edit\EditSlimQuantityController;
use App\Http\Controllers\Edit\EditHomeQuantityController;






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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home-profile', function () {
    return view('home-profile');
});


Auth::routes();

Route::get('/promo', [PromoController::class, 'promo']);

/* all */
Route::get('/', [AllController::class, 'allArticles']);

/* category */
Route::get('/bracelets', [BraceletController::class, 'bracelet']);
Route::get('/ladies', [LadyController::class, 'lady']);
Route::get('/kids', [KidController::class, 'kid']);
Route::get('/homes', [HomeController::class, 'home']);
Route::get('/hangings', [HangingController::class, 'hanging']);
Route::get('/medallions', [MedallionController::class, 'medallion']);
Route::get('/packages', [PackageController::class, 'package']);

/* sort */
Route::get('/cheap', [CheapController::class, 'cheap']);
Route::get('/expensive', [ExpensiveController::class, 'expensive']);
Route::get('/recent', [RecentController::class, 'recent']);

/* edit show */
Route::get('edit-square', [EditSquareController::class, 'show']);
Route::get('edit-slim', [EditSlimController::class, 'show']);
Route::get('edit-home', [EditHomeController::class, 'show']);

/* post */
Route::post('edit-square',[EditSquareController::class, 'editSquare']);
Route::post('edit-slim',[EditSlimController::class, 'editSlim']);
Route::post('edit-home',[EditHomeController::class, 'editHome']);

/* edit quantity */
Route::get('edit-square-quantity',[EditSquareQuantityController::class, 'show']);
Route::get('edit-slim-quantity',[EditSlimQuantityController::class, 'show']);
Route::get('edit-home-quantity',[EditHomeQuantityController::class, 'show']);
/* edit quantity  post*/
Route::post('edit-square-quantity',[EditSquareQuantityController::class, 'editQuantitySquare']);
Route::post('edit-slim-quantity',[EditSlimQuantityController::class, 'editQuantitySlim']);
Route::post('edit-home-quantity',[EditHomeQuantityController::class, 'editQuantityHome']);

/* upload */

Route::get('upload', [ UploadController::class, 'index' ]);
Route::post('upload', [ UploadController::class, 'store' ])->name('upload.store');

/* view */
Route::get('/{code}',[ViewerController::class, 'viewArticle']);







