<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'website']);
Route::get('/change/{lang}', [WebsiteController::class, 'changeLanguage']);
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts');



Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']],function()
{
    Route::post('/change_password', [HomeController::class, 'change_password'])->name('change_password');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //website inforamtin details
    Route::get('/homes', [InfoController::class, 'index'])->name('homes');
    Route::post('/homes', [InfoController::class, 'index'])->name('homes');
    Route::post('/newHome', [InfoController::class, 'store'])->name('newHome');
    Route::get('/destroyHome/{Home_id}', [InfoController::class, 'destroy'])->name('destroyHome');
    Route::post('/updateHome', [InfoController::class, 'update'])->name('updateHome');

    //services
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/allServices', [ServiceController::class, 'showAll'])->name('allServices');
    Route::get('/createService', [ServiceController::class, 'create'])->name('createService');
    Route::post('/newService', [ServiceController::class, 'store'])->name('newService');
    Route::get('/editService/{Service_id}', [ServiceController::class, 'edit'])->name('editService');
    Route::get('/destroyService/{Service_id}', [ServiceController::class, 'destroy'])->name('destroyService');
    Route::post('/updateService/{Service_id}', [ServiceController::class, 'update'])->name('updateService');

    //Partners
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners');
    Route::post('/partners', [PartnerController::class, 'index'])->name('partners');
    Route::post('/newPartner', [PartnerController::class, 'store'])->name('newPartner');
    Route::get('/destroyPartner/{Partner_id}', [PartnerController::class, 'destroy'])->name('destroyPartner');
    Route::post('/updatePartner', [PartnerController::class, 'update'])->name('updatePartner');

    //Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::post('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::post('/newCustomer', [CustomerController::class, 'store'])->name('newCustomer');
    Route::get('/destroyCustomer/{Customer_id}', [CustomerController::class, 'destroy'])->name('destroyCustomer');
    Route::post('/updateCustomer', [CustomerController::class, 'update'])->name('updateCustomer');

    //team
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/allTeam', [TeamController::class, 'showAll'])->name('allTeam');
    Route::get('/createTeam', [TeamController::class, 'create'])->name('createTeam');
    Route::post('/newTeam', [TeamController::class, 'store'])->name('newTeam');
    Route::get('/editTeam/{Team_id}', [TeamController::class, 'edit'])->name('editTeam');
    Route::get('/destroyTeam/{Team_id}', [TeamController::class, 'destroy'])->name('destroyTeam');
    Route::post('/updateTeam/{Team_id}', [TeamController::class, 'update'])->name('updateTeam');

    //contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/destroyContact/{type_id}', [ContactController::class, 'destroy'])->name('destroyContact');
    // Route::post('/replyContact', [ContactController::class, 'reply'])->name('replyContact');

    //competitions
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions');
    Route::post('/competitions', [CompetitionController::class, 'store'])->name('competitions');
    Route::get('/destroyCompetition/{type_id}', [CompetitionController::class, 'destroy'])->name('destroyCompetition');


});

