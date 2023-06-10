<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TestController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});



Auth::routes();

Route::group(['middleware'=>['auth','adminMiddleware:0,2']], function(){

    
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin',[ChartController::class, 'pieChart'])->name('admin.dashboard');
    Route::get('/admin/user', [AdminController::class, 'show'])->name('admin.user');
    Route::get('/admin/voting', [VotingController::class, 'showVote'])->name('admin.voting');
    Route::get('/memilih', [AdminController::class, 'memilih'])->name('admin.memilih');
    Route::get('/golput', [AdminController::class, 'golput'])->name('admin.golput');
    Route::get('/data/{votingId}', [AdminController::class, 'showData'])->name('data.show');
    Route::post('/importExcel', [AdminController::class, 'importExcel'])->name('importExcel');
    Route::get('/exportExcel', [AdminController::class, 'exportExcel'])->name('exportExcel');


    
    
});

Route::group(['middleware'=>['auth','adminMiddleware:2']], function(){
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/register-user', [AdminController::class, 'registerUser'])->name('register-user');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('admin.editUser');
    Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('admin.updateUser');   
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.deleteUser');
    

});

Route::get('/votings/{id}', [VotingController::class, 'show'])->name('votings.show');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [VotingController::class, 'index'])->name('votings.index');
Route::get('/alert', [VotingController::class, 'endPage'])->name('votings.endPage');
Route::post('/home', [AdminController::class, 'store'])->name('votings.store');
Route::get('/export-pdf', [AdminController::class, 'exportPdf'])->name('export');
Route::get('/export-Pdf', [AdminController::class, 'exportPdfp'])->name('memilih.pdf');
Route::post('/votings/{voting}/vote', [VotingController::class, 'vote'])->name('votings.vote');
Route::get('/data/export/{votingId}', [ChartController::class, 'export'])->name('zeta.export');


// vote edit

Route::get('/votings/{id}/edit', [VotingController::class, 'edit'])->name('votings.edit');
Route::put('/votings/{id}', [VotingController::class, 'update'])->name('votings.update');

Route::get('/download/{file}', [TestController::class, 'download'])->name('download');
























