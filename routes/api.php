<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\ReligionController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ReligionController::class)->group(function () {
    Route::get('/religion', 'index')->name('religion.index');
    Route::post('/religion', 'insert')->name('religion.insert');
    Route::put('/religion/{religion}', 'edit')->name('religion.edit');
    Route::delete('/religion/{religion}', 'delete')->name('religion.delete');
});

Route::controller(ClassInfoController::class)->group(function () {
    Route::get('/classinfo', 'index')->name('classInfo.index');
    Route::post('/classinfo', 'create')->name('classInfo.create');
    Route::put('/classinfo/{classInfo}', 'edit')->name('classInfo.edit');
    Route::delete('/classinfo/{clsinfo}', 'delete')->name('classInfo.delete');
});