<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {

    return view('landing');
})->name('landing');

Route::get('/kalender', [App\Http\Controllers\KalenderController::class, 'index'])->name('kalender');
Route::get('/send_message', [App\Http\Controllers\MessageController::class, 'index'])->name('send_message');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class)->only('edit', '
update', 'store');

Route::middleware('auth')->group(function () {
    Route::get('gantiPassword', [App\Http\Controllers\UserController::class, 'gantiPassword'])->name('gantiPassword');
    Route::post('gantiPassword/update', [App\Http\Controllers\UserController::class, 'gantiPasswordUpdate'])->name('gantiPassword.update');

    Route::group(['middleware' => ['role:user']], function () {
        Route::prefix('u')->name('user.')->group(function () {

           
            Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('page');
          
          
        });
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('a')->name('admin.')->group(function () {
            Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('page');
   
        });

    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::prefix('s')->name('superadmin.')->group(function () {
            Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('page');

        });

    });

    Route::group(['middleware' => ['role:kecamatan']], function () {
        Route::prefix('kecamatan')->name('kecamatan.')->group(function () {
            Route::get('dashboard', [App\Http\Controllers\Kecamatan\DashboardController::class, 'index'])->name('page');
            Route::get('verifikasi/rencanaKerja/list/diajukan', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'daftarDiajukan'])->name('rencanaKerja.diajukan');
            Route::get('verifikasi/rencanaKerja/list/disetujui', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'daftarDisetujui'])->name('rencanaKerja.disetujui');
            Route::get('verifikasi/rencanaKerja/list/ditolak', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'daftarDitolak'])->name('rencanaKerja.ditolak');
            Route::get('verifikasi/laporanSpj/list/diajukan', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'realisasiDiajukan'])->name('laporanSpj.diajukan');
            Route::get('verifikasi/laporanSpj/list/disetujui', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'realisasiDisetujui'])->name('laporanSpj.disetujui');
            Route::get('verifikasi/laporanSpj/list/ditolak', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'realisasiDitolak'])->name('laporanSpj.ditolak');
            Route::get('verifikasi/laporanSpj/list/semua', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'realisasiSemua'])->name('laporanSpj.semua');
         
            Route::get('rencanaKerja/show/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'showRencana'])->name('rencanaKerja.show');


            Route::post('verifikasi/rencanaKerja/disetujui/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'verifikasiSetuju'])->name('verifikasi.rencanaKerja.disetujui');
            Route::post('verifikasi/rencanaKerja/ditolak/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'verifikasiTolak'])->name('verifikasi.rencanaKerja.ditolak');
            Route::post('verifikasi/rencanaKerja/ditarik/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'verifikasiDitarik'])->name('verifikasi.rencanaKerja.ditarik');

            Route::get('verifikasi/laporanSpj/rencanaKerja/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'show'])->name('verifikasi.laporanSpj.show');
            Route::post('verifikasi/laporanSpj/disetujui/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'verifikasiRealisasiSetuju'])->name('verifikasi.laporanSpj.disetujui');
            Route::post('verifikasi/laporanSpj/ditolak/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'verifikasiRealisasiTolak'])->name('verifikasi.laporanSpj.ditolak');
            Route::get('verifikasi/laporanSpj/finalisasiSetuju/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'finalisasiRealisasiSetuju'])->name('verifikasi.laporanSpj.finalisasiSetuju');
            Route::post('verifikasi/laporanSpj/finalisasiTolak/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'finalisasiRealisasiTolak'])->name('verifikasi.laporanSpj.finalisasiTolak');
            Route::get('verifikasi/laporanSpj/bukaKuncian/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'bukaKuncianRealisasi'])->name('verifikasi.laporanSpj.bukaKuncian');

            Route::get('verifikasi/laporanSpj/readOnly/{id}', [App\Http\Controllers\Kecamatan\VerifikasiController::class, 'readOnly'])->name('verifikasi.laporanSpj.readOnly');
           

            //membuat rencana kerja
            Route::get('rencana/daftar', [App\Http\Controllers\Kecamatan\RencanaController::class, 'index'])->name('rencana.daftar');
            Route::get('rencana/create', [App\Http\Controllers\Kecamatan\RencanaController::class, 'create'])->name('rencana.create');
            Route::post('rencana/store', [App\Http\Controllers\Kecamatan\RencanaController::class, 'store'])->name('rencana.store');
            Route::get('rencana/show/{id}', [App\Http\Controllers\Kecamatan\RencanaController::class, 'show'])->name('rencana.show');
            Route::get('rencana/edit/{id}', [App\Http\Controllers\Kecamatan\RencanaController::class, 'edit'])->name('rencana.edit');
            Route::put('rencana/{id}/edit', [App\Http\Controllers\Kecamatan\RencanaController::class, 'update'])->name('rencana.update');
            Route::delete('/rencana/{id}', [App\Http\Controllers\Kecamatan\RencanaController::class, 'destroy'])->name('rencana.destroy');
            Route::get('rencana/list/diajukan', [App\Http\Controllers\Kecamatan\RencanaController::class, 'daftarDiajukan'])->name('rencana.diajukan');
            Route::get('rencana/list/disetujui', [App\Http\Controllers\Kecamatan\RencanaController::class, 'daftarDisetujui'])->name('rencana.disetujui');
            Route::get('rencana/list/ditolak', [App\Http\Controllers\Kecamatan\RencanaController::class, 'daftarDitolak'])->name('rencana.ditolak');
            Route::get('laporanSpj', [App\Http\Controllers\Kecamatan\LaporanController::class, 'index'])->name('laporanSpj');
            Route::get('laporanSpj/create/{id}', [App\Http\Controllers\Kecamatan\LaporanController::class, 'create'])->name('laporanSpj.create');
            Route::post('laporanSpj/ajukan/{id}', [App\Http\Controllers\Kecamatan\LaporanController::class, 'ajukan'])->name('laporanSpj.ajukan');
            Route::post('laporanSpj/ajukanBatal/{id}', [App\Http\Controllers\Kecamatan\LaporanController::class, 'ajukanBatal'])->name('laporanSpj.ajukanBatal');
            Route::post('laporanSpj/store', [App\Http\Controllers\Kecamatan\LaporanController::class, 'store'])->name('laporanSpj.store');
            Route::put('laporanSpj/{id}/destroy', [App\Http\Controllers\Kecamatan\LaporanController::class, 'destroy'])->name('laporanSpj.destroy');
        });
       
    });

    Route::group(['middleware' => ['role:kelurahan']], function () {
        Route::prefix('kelurahan')->name('kelurahan.')->group(function () {
            Route::get('dashboard', [App\Http\Controllers\Kelurahan\DashboardController::class, 'index'])->name('page');
            Route::get('rencanaKerja/daftar', [App\Http\Controllers\Kelurahan\RencanaController::class, 'index'])->name('rencanaKerja.daftar');
            Route::get('rencanaKerja/create', [App\Http\Controllers\Kelurahan\RencanaController::class, 'create'])->name('rencanaKerja.create');
            Route::post('rencanaKerja/store', [App\Http\Controllers\Kelurahan\RencanaController::class, 'store'])->name('rencanaKerja.store');
            Route::get('rencanaKerja/show/{id}', [App\Http\Controllers\Kelurahan\RencanaController::class, 'show'])->name('rencanaKerja.show');
            Route::get('rencanaKerja/edit/{id}', [App\Http\Controllers\Kelurahan\RencanaController::class, 'edit'])->name('rencanaKerja.edit');
            Route::put('rencanaKerja/{id}/edit', [App\Http\Controllers\Kelurahan\RencanaController::class, 'update'])->name('rencanaKerja.update');
            Route::delete('/rencanaKerja/{id}', [App\Http\Controllers\Kelurahan\RencanaController::class, 'destroy'])->name('rencanaKerja.destroy');
            Route::get('rencanaKerja/list/diajukan', [App\Http\Controllers\Kelurahan\RencanaController::class, 'daftarDiajukan'])->name('rencanaKerja.diajukan');
            Route::get('rencanaKerja/list/disetujui', [App\Http\Controllers\Kelurahan\RencanaController::class, 'daftarDisetujui'])->name('rencanaKerja.disetujui');
            Route::get('rencanaKerja/list/ditolak', [App\Http\Controllers\Kelurahan\RencanaController::class, 'daftarDitolak'])->name('rencanaKerja.ditolak');
            Route::get('laporanSpj', [App\Http\Controllers\Kelurahan\LaporanController::class, 'index'])->name('laporanSpj');
            Route::get('laporanSpj/create/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'create'])->name('laporanSpj.create');
            Route::post('laporanSpj/ajukan/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'ajukan'])->name('laporanSpj.ajukan');
            Route::post('laporanSpj/ajukanBatal/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'ajukanBatal'])->name('laporanSpj.ajukanBatal');
            Route::post('laporanSpj/store', [App\Http\Controllers\Kelurahan\LaporanController::class, 'store'])->name('laporanSpj.store');
            Route::put('laporanSpj/{id}/destroy', [App\Http\Controllers\Kelurahan\LaporanController::class, 'destroy'])->name('laporanSpj.destroy');
        });
      
    });

 

});
