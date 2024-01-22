<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

Route::get('/create/announcement', [AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');

Route::get('/detail/announcement/{announcement}', [AnnouncementController::class,'showAnnouncement'])->name ('announcements.show');

Route::get('/all/announcement/', [AnnouncementController::class,'indexAnnouncement'])->name ('announcements.index');

// Home revisore
Route::get('/revisor/home/', [RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

// Accetta annuncio
Route::patch('/accept/announcement/{announcement}', [RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name ('revisor.accept_announcement');

// Rifiuta annuncio
Route::patch('/reject/announcement/{announcement}', [RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name ('revisor.reject_announcement');

//Form Lavora con noi
Route::get('/create/revisor', [RevisorController::class, 'workWhitUs'])->middleware('auth')->name('revisor.create');

//Richiedi di diventare revisore
Route::post('/request/revisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('emails.becomeRevisor');

// Rendi utente revisore
Route::get('/accept/revisor/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

//!Ricerca Annuncio
Route::get('/search/announcement',[PublicController::class,'searchAnnouncements'])->name('announcements.search');

//? Cambio lingua

Route::post('/langauge/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
