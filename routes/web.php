<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationNoteController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TodoCommentController;
use App\Http\Controllers\TodoController;

Route::get('/', [HomepageController::class, 'home'])->name('home');

Route::prefix('todos')
    ->name('todos.')
    ->group(function () {
        Route::get('/', [TodoController::class, 'index'])->name('index');
        Route::post('/', [TodoController::class, 'store'])->name('store');
        Route::get('/create', [TodoController::class, 'create'])->name('create');

        Route::prefix('{todo}')->group(function () {
            Route::get('/', [TodoController::class, 'show'])->name('show');
            Route::put('/', [TodoController::class, 'update'])->name('update');
            Route::delete('/', [TodoController::class, 'destroy'])->name('destroy');
            Route::get('/edit', [TodoController::class, 'edit'])->name('edit');
            Route::patch('/toggle', [TodoController::class, 'toggle'])->name('toggle');

            Route::prefix('comments')->name('comments.')->group(function () {
                Route::post('/', [TodoCommentController::class, 'store'])->name('store');
                Route::delete('/{comment}', [TodoCommentController::class, 'destroy'])->name('destroy');
            });
        });
    });

Route::prefix('applications')
    ->name('applications.')
    ->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('index');
        Route::post('/', [ApplicationController::class, 'store'])->name('store');
        Route::get('/create', [ApplicationController::class, 'create'])->name('create');

        Route::prefix('{application}')->group(function () {
            Route::get('/', [ApplicationController::class, 'show'])->name('show');
            Route::put('/', [ApplicationController::class, 'update'])->name('update');
            Route::delete('/', [ApplicationController::class, 'destroy'])->name('destroy');
            Route::get('/edit', [ApplicationController::class, 'edit'])->name('edit');

            Route::prefix('notes')->name('notes.')->group(function () {
                Route::post('/', [ApplicationNoteController::class, 'store'])->name('store');
                Route::delete('/{note}', [ApplicationNoteController::class, 'destroy'])->name('destroy');
            });
        });
    });
