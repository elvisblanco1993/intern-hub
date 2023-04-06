<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Opportunity\Index as Opportunities;
use App\Http\Livewire\Website\Opportunity\Index as OpportunitiesAll;

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


Route::get('/opportunities1', OpportunitiesAll::class)->name('opportunities1');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    Route::get('/opportunities', Opportunities::class)->name('opportunities');
});
