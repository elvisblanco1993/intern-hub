<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Opportunity\Index as Opportunities;
use App\Http\Livewire\Website\Opportunity\Index as OpportunitiesAll;
use App\Http\Livewire\Website\Subscriber\Unsubscribe;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/all-opportunities', OpportunitiesAll::class)->name('all-opportunities');
Route::get('/unsubscribe/{email}', Unsubscribe::class)->name('unsubscribe');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    Route::get('/opportunities', Opportunities::class)->name('opportunities');
});
