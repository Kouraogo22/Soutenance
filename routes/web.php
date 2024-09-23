<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProprietaireController;
use App\Http\Controllers\Structure_de_developpementController;
use App\Http\Controllers\HomeController;


Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


Route::get('/application', [ApplicationController::class, 'index'])->name('app.index');
Route::get('/application/create', [ApplicationController::class, 'create'])->name('app.create');
Route::get('/application/store', [ApplicationController::class, 'store']);
Route::post('/application/store', [ApplicationController::class, 'store'])->name('app.store');
Route::get('/application/show', [ApplicationController::class, 'show'])->name('app.show');
Route::put('/application/update', [ApplicationController::class, 'update']);


Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation.index');;
Route::get('/documentation/create', [DocumentationController::class, 'create'])->name('documentation.create');
Route::get('/documentation/store', [DocumentationController::class, 'store']);
Route::post('/documentation/store', [DocumentationController::class, 'store'])->name('documentation.store');
Route::get('/documentation/{id}', [DocumentationController::class, 'show']);
Route::put('/documentation/{id}/edit', [DocumentationController::class, 'update']);
Route::get('/documentation/download/{id}', [DocumentationController::class, 'download'])->name('documentation.download');



Route::get('/version', [VersionController::class, 'index'])->name('version.index');
Route::get('/version/create', [VersionController::class, 'create']);
Route::get('/version/store', [VersionController::class, 'store']);
Route::post('/version/store', [VersionController::class, 'store'])->name('version.store');
Route::get('/version/{id}', [VersionController::class, 'show']);
Route::put('/version/{id}/edit', [VersionController::class, 'update']);
Route::delete('/versions/{id}', [VersionController::class, 'destroy'])->name('version.destroy');


Route::get('/proprietaire', [ProprietaireController::class, 'index'])->name('proprietaire.index');
Route::get('/proprietaire/create', [ProprietaireController::class, 'create']);
Route::get('/proprietaire/store', [ProprietaireController::class, 'store']);
Route::post('/proprietaire/store', [ProprietaireController::class, 'store'])->name('proprietaire.store');
Route::put('/proprietaire/show', [ProprietaireController::class, 'show']);
Route::get('/proprietaire/update', [ProprietaireController::class, 'update']);
    

Route::get('/structure', [Structure_de_developpementController::class, 'index'])->name('structure.index');
Route::get('/structure/create', [Structure_de_developpementController::class, 'create']);
Route::get('/structure/store', [Structure_de_developpementController::class, 'store']);
Route::post('/structure/store', [Structure_de_developpementController::class, 'store'])->name('structure.store');
Route::put('/structure/{id}/edit', [Structure_de_developpementController::class, 'update']);
Route::delete('/structure/{id}', [Structure_de_developpementController::class, 'show']);


Route::post('/structure-developpement/store', [Structure_de_developpementController::class, 'store'])->name('structure-developpement.store');


Route::get('/notification', [NotificationController::class, 'index']);
Route::get('/notification/create', [NotificationController::class, 'create']);
Route::get('/notification/store', [NotificationController::class, 'store'])->name('store');
Route::post('/notification/store', [NotificationController::class, 'store']);
Route::get('/notification/update', [NotificationController::class, 'update']);
Route::get('/notification/show', [NotificationController::class, 'show']);


Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::get('/role/store', [RoleController::class, 'store']);
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/{id}', [RoleController::class, 'show'])->name('role.show');
Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

