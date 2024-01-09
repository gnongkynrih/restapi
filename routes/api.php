<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\AdmissionUserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ReligionController::class)->group(function () {
    Route::get('/religion/{id}', 'select')->name('religion.select');
    Route::get('/religion', 'index')->name('religion.index');
    Route::post('/religion/store', 'store')->name('religion.store');
    Route::put('/religion/{religion}', 'edit')->name('religion.edit');
    Route::delete('/religion/{religion}', 'delete')->name('religion.delete');
    Route::post('/religion/upload', 'storeImage')->name('religion.create');
});

Route::controller(ClassInfoController::class)->group(function () {
    Route::get('/classinfo', 'index')->name('classInfo.index');
    Route::post('/classinfo', 'create')->name('classInfo.create');
    Route::put('/classinfo/{classInfo}', 'edit')->name('classInfo.edit');
    Route::delete('/classinfo/{clsinfo}', 'delete')->name('classInfo.delete');
});

Route::controller(StateController::class)->group(function () {
    Route::get('/state', 'index')->name('state.index');
    Route::post('/state', 'insert')->name('state.insert');
    Route::put('/state/{state}', 'update')->name('state.update');
    Route::delete('/state/{state}', 'destroy')->name('state.delete');
});

Route::controller(AdmissionUserController::class)->group(function(){
    Route::post('/admission/register','register')->name('admission.register');
});