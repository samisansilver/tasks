<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/submitjob', [\App\Http\Controllers\jobController::class, 'createJob']);
    Route::get('/jobform', [\App\Http\Controllers\jobController::class, 'jobForm'])->name('jobform');

    Route::post('/getjobs', [\App\Http\Controllers\jobController::class, 'getJob']);
    Route::get('/selectuser', [\App\Http\Controllers\jobController::class, 'selectUser'])->name('selectuser');

    Route::get('/managerjobs', [\App\Http\Controllers\jobController::class, 'getAllJobs']);
    Route::post('/delete/{id}', [\App\Http\Controllers\jobController::class, 'deleteJob']);
    Route::post('/update/{id}', [\App\Http\Controllers\jobController::class, 'updateJob']);

    Route::get('/export', [\App\Http\Controllers\jobController::class, 'excelExport'])->name('export');
    });
    Route::get('del', function (){
        /*$sams = \App\Models\Job::all();
        foreach ($sams as $sam){
        $sam->delete();
        }
        return 'saman delete';*/
});
require __DIR__.'/auth.php';
