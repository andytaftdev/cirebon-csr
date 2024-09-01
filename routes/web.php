<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProyekController;
use Illuminate\Http\Request;

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



Route::get('/', [PublikController::class, 'index'])->name('profile.destroy');


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/register', [UserController::class, 'register'])->name('register');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {




    Route::resource('/notification', NotificationController::class);
Route::resource('/identity', IdentityController::class);
Route::get('/mitra', [IdentityController::class, 'mitra']);
Route::get('/mitra/create', [IdentityController::class, 'create'])->name('identity.create');
Route::post('mitra/create/success', [IdentityController::class, 'register'])->name('identity.register');
Route::get('/mitra/{id}', [IdentityController::class, 'detailMitra'])->name('identity.detailMitra');
Route::get('/mitra/ubah/{id}', [IdentityController::class, 'ubahMitra'])->name('identity.ubahMitra');
Route::put('/mitra/update/{id}', [IdentityController::class, 'updateMitra'])->name('identity.updateMitra');
Route::get('/mitra', [IdentityController::class, 'mitra']);
Route::get('/kegiatan/search/{status}', [IdentityController::class, 'search'])->name('identity.search');




Route::resource('/laporan', LaporanController::class);
Route::get('/laporan/status/{status}', [LaporanController::class, 'status'])->name('laporan.status');
Route::put('/laporan/tolak/{id}', [LaporanController::class, 'tolak'])->name('laporan.tolak');
Route::put('/laporan/revisi/{id}', [LaporanController::class, 'revisi'])->name('laporan.revisi');
Route::put('/laporan/terima/{id}', [LaporanController::class, 'terima'])->name('laporan.terima');


Route::resource('/kegiatan', KegiatanController::class);
Route::get('kegiatan/create/{id}', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::get('kegiatan/detail/{id}', [KegiatanController::class, 'detail'])->name('kegiatan.detail');
Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::get('/kegiatan/status/{status}', [KegiatanController::class, 'filter'])->name('kegiatan.filter');




Route::resource('/sektor', SektorController::class);
Route::get('sektor/detail/{id}', [SektorController::class, 'detail'])->name('sektor.detail');
Route::get('sektor/edit/{id}', [SektorController::class, 'edit'])->name('sektor.edit');
Route::get('/sektor/status/{status}', [SektorController::class, 'search'])->name('sektor.search');

Route::resource('/program', ProgramController::class);
Route::delete('/program/delete/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
Route::get('/get-program/{id}', [ProgramController::class, 'getPrograms']);


Route::resource('/proyek', ProyekController::class);
Route::get('/proyek/status/{status}', [ProyekController::class, 'filter'])->name('proyek.filter');


Route::get('/report-pdf', [HomeController::class, 'exportPdf'])->name('export.pdf');
Route::get('/proyek-pdf', [HomeController::class, 'proyekPdf'])->name('proyek.pdf');

Route::post('/stats-pdf', [HomeController::class, 'statPDF'])->name('stats.pdf');


});


Route::get('/publik/mitra', [IdentityController::class, 'mitraPublik'])->name('identity.mitraPublik');
Route::get('/publik/mitra/{id}', [IdentityController::class, 'mitraDetail'])->name('identity.mitraDetail');
Route::get('/publik/mitras/filter/', [IdentityController::class, 'mitraPublikFilter'])->name('mitra.publikFilter');




Route::get('/publik/laporan', [LaporanController::class, 'laporanPublik'])->name('laporan.laporanPublik');
Route::get('/publik/laporan/{id}', [LaporanController::class, 'detailLaporan'])->name('laporan.detailLaporan');
Route::get('/filter/{status}', [LaporanController::class, 'laporanPublikFilter'])->name('laporan.publikFilter');
Route::get('/laporans/filter/', [LaporanController::class, 'laporanFilter'])->name('laporan.filter');
Route::get('/laporans/search/', [LaporanController::class, 'laporanSearch'])->name('laporan.search');





Route::get('/publik/kegiatan', [KegiatanController::class, 'kegiatanPublik'])->name('kegiatan.kegiatanPublik');
Route::get('/publik/kegiatan/{id}', [KegiatanController::class, 'detailKegiatan'])->name('kegiatan.detailKegiatan');
Route::get('/publik/kegiatan/filter/{status}', [KegiatanController::class, 'kegiatanPublikFilter'])->name('kegiatan.publikFilter');




Route::get('/publik/sektor', [SektorController::class, 'sektorPublik'])->name('sektor.sektorPublik');
Route::get('/publik/sektor/{id}', [SektorController::class, 'detailSektor'])->name('sektor.detailSektor');


Route::get('/publik/proyek/{id}', [ProyekController::class, 'detailProyek'])->name('proyek.detailProyek');
Route::get('/publik/proyeks/filter/', [ProyekController::class, 'proyekPublikFilter'])->name('proyek.publikFilter');
Route::get('/proyeks/filter/', [ProyekController::class, 'proyekFilter'])->name('proyek.filters');






Route::get('/statistik', [HomeController::class, 'stats'])->name('home.stats');
Route::get('/tentang', [HomeController::class, 'about'])->name('home.about');
Route::post('/publik-stats-pdf', [HomeController::class, 'publikStat'])->name('publikStat.pdf');
Route::get('/statistik/filter', [HomeController::class, 'filterStat'])->name('filter.stat');
Route::get('/statistik/public', [HomeController::class, 'filterPublicStat'])->name('filter.stat.publik');










require __DIR__.'/auth.php';
