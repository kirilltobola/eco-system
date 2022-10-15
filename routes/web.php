<?php

use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\KaizenController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
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
    })->name('dashboard');

    // For what middleware? its already auth!
    Route::group(['middleware' => ['role:user|moderator']], function () {
        Route::get('/suggest', function () {
            return view('my.suggest');
        })->name('suggest');

        // seems wrong? or not?
        Route::resources([
            'kaizens' => KaizenController::class,
            'votes' => VoteController::class,
        ]);

        Route::post('/votes/{vote}/vote', function (\Illuminate\Http\Request $request) {
            $choice_id = $request['choice'];
            /** @var \App\Models\Choice $choice */
            $choice = \App\Models\Choice::find($choice_id);
            $choice->users()->attach(Auth::user()->id);
            $choice->save();
        })->name('votes.vote');
    });

    Route::group([
        'middleware' => ['role:moderator'],
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
