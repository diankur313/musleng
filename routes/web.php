<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Verificator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Peserta;
use App\Http\Controllers\Sekretaris;
use App\Http\Controllers\Admin;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('test-mail', function(){
    return view('mail.account_code');
});

Route::group(['middleware' => ['auth', 'web', 'clear_session', 'Admin']], function () {
    Route::get('admin-home', [Admin::class,'home']);
    Route::get('admin-users', [Admin::class,'users']);
    Route::get('admin-event', [Admin::class,'event']);
    Route::get('admin-summary', [Admin::class,'summary']);
    Route::post('post-user', [Admin::class,'post_user']);
    Route::get('index-user', [Admin::class,'index_user']);
    Route::post('admin-hapus-user={id}', [Admin::class,'hapus_user']);
    Route::post('del-bulk', [Admin::class,'bulk_delete']);
    Route::post('edit-user={id}', [Admin::class,'edit_user']);
    Route::get('personal-mail={id}', [Admin::class,'email_personal']);
    Route::get('email-bulk', [Admin::class,'email_bulk']);
    Route::post('post-event', [Admin::class,'post_event']);
    Route::get('event-id={id}', [Admin::class,'detail_event']);
    Route::post('hapus-event={id}', [Admin::class,'hapus_event']);
    Route::post('post-ubah-event={id}', [Admin::class,'ubah_event']);
    Route::post('admin-konfirmasi-kehadiran={id}', [Admin::class,'konfirmasi_kehadiran']);
    Route::get('index-user-verif', [Admin::class,'index_user_verifikasi_manual']);
    Route::get('index-user-izin={id}', [Admin::class,'index_user_verifikasi_izin']);
    Route::post('konfirmasi-admin={id}', [Admin::class,'konfirmasi_manual']);
    Route::post('izin-keluar', [Admin::class,'izin_keluar']);
    Route::post('izin-masuk', [Admin::class,'izin_masuk']);
    Route::get('detail-user-izin={id}', [Admin::class,'detail_izin']);
    Route::get('index-user-hadir', [Admin::class,'index_hadir_full']);
    Route::get('admin-kehadiran', [Admin::class,'kehadiran_peserta']);
    Route::get('admin-bidang-hadir', [Admin::class,'kehadiran_bidang']);
    Route::get('admin-verified-you', [Admin::class,'kamu_verif']);
    Route::post('update-session/{id}', [Admin::class,'update_session']);
});

// Route::group(['middleware' => ['auth', 'web', 'clear_session', 'Verifikator']], function () {
Route::middleware(['auth', 'web', 'clear_session', 'Verifikator'])->group(function () {
    Route::get('verif-home', [Verificator::class,'home']);
    Route::post('change-camera', [Verificator::class, 'change_camera']);
    Route::post('change-camera-post', [Verificator::class, 'change_camera_post']);
    Route::post('barcode-scan={id}', [Verificator::class, 'input_scan']);
    Route::get('check-scan', [Verificator::class,'check_scan']);
});

Route::middleware(['auth', 'web', 'clear_session', 'Sekretaris'])->group(function () {
    Route::get('sekre-home', [Sekretaris::class, 'home']);
    Route::get('jumlah-kehadiran',[ Sekretaris::class, 'jumlah_kehadiran']);
    Route::get('jumlah-kehadiran-bidang', [Sekretaris::class, 'perwakilan_bidang']);
    Route::get('detail-kehadiran-bidang', [Sekretaris::class,'kehadiran_bidang']);
});

Route::middleware(['auth', 'web', 'clear_session', 'Peserta'])->group(function () {
    Route::get('peserta-home', [Peserta::class,'index']);
    Route::post('get-countdown', [Peserta::class,'countdown']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';