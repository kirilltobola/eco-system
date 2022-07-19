<?php

use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\KaizenController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('kaizens.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::group(['middleware' => ['role:writer|admin']], function () {
        Route::get('/suggest', function () {
            return view('my.suggest');
        })->name('suggest');

        Route::resources([
            'kaizens' => KaizenController::class
        ]);
    });

    Route::group([
        'middleware' => ['role:admin'],
        'prefix' => 'moderation/kaizens',
        'as' => 'moderation.'
    ], function () {
        Route::get('/', [ModeratorController::class, 'index'])->name('index');
        Route::get('/{kaizen}', [ModeratorController::class, 'show'])->name('show');
        Route::post('/{kaizen}', [ModeratorController::class, 'moderate'])->name('moderate');
        Route::delete('/{kaizen}', [ModeratorController::class, 'delete'])->name('delete');

    });

});

require __DIR__.'/auth.php';
