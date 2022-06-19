<?php

use App\Http\Controllers\EtudiantController;
use App\Models\Etudiant;
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





Route::get('/', [EtudiantController::class, 'index'])->name('liste.etudiant');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');

Route::post('/etudiant/create', [EtudiantController::class, 'store'])->name('etudiant.store');

Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');


Route::delete('/etudiant/{etudiant}' , [EtudiantController::class , 'delete'])->name('etudiant.supprimer');
Route::put('/etudiant/{etudiant}' , [EtudiantController::class , 'update'])->name('etudiant.update');



