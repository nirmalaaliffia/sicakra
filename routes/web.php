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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('user', UserController::class)->only('edit', '
update', 'store');



Route::middleware('auth')->group(function () {
    Route::get('gantiPassword',  [App\Http\Controllers\UserController::class, 'gantiPassword'])->name('gantiPassword');
    Route::post('gantiPassword/update',  [App\Http\Controllers\UserController::class, 'gantiPasswordUpdate'])->name('gantiPassword.update');


    Route::group(['middleware' => ['role:user']], function () {
        Route::prefix('u')->name('user.')->group(function () {


            Route::get('formulir/pengajuan-step-one',  [App\Http\Controllers\User\FormulirController::class, 'createStepOne'])->name('createPengajuanStepOne');
            Route::post('formulir/pengajuan-step-one', [App\Http\Controllers\User\FormulirController::class, 'postCreateStepOne'] )->name('createPengajuanStepOnePost');

            Route::get('formulir/pengajuan-step-two', [App\Http\Controllers\User\FormulirController::class, 'createStepTwo'])->name('createPengajuanStepTwo');
            Route::post('formulir/pengajuan-step-two', [App\Http\Controllers\User\FormulirController::class, 'postCreateStepTwo'])->name('createPengajuanStepTwoPost');
            
            Route::get('formulir/pengajuan-step-three', [App\Http\Controllers\User\FormulirController::class, 'createStepThree'])->name('createPengajuanStepThree');
            Route::post('formulir/pengajuan-step-three', [App\Http\Controllers\User\FormulirController::class, 'postCreateStepThree'])->name('createPengajuanStepThreePost');

            Route::get('formulir/pengajuan-step-four', [App\Http\Controllers\User\FormulirController::class, 'createStepFour'])->name('createPengajuanStepFour');
            Route::post('formulir/pengajuan-step-four', [App\Http\Controllers\User\FormulirController::class, 'postCreateStepFour'])->name('createPengajuanStepFourPost');

            Route::get('formulir/pengajuan-step-five', [App\Http\Controllers\User\FormulirController::class, 'createStepFive'])->name('createPengajuanStepFive');
            Route::post('formulir/pengajuan-step-five', [App\Http\Controllers\User\FormulirController::class, 'postCreateStepFive'])->name('createPengajuanStepFivePost');


            Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('page');
            Route::get('datadiri', [App\Http\Controllers\User\FormulirController::class, 'index'])->name('data_diri');
            Route::delete('destroyKendaraan/{id}', [App\Http\Controllers\User\FormulirController::class, 'destroyKendaraan'])->name('destroyKendaraan');

            //Tampilkan Kelurahan
            Route::get('/kelurahan/{id}', [App\Http\Controllers\User\DashboardController::class, 'tampilKelurahan']);
            Route::get('/getOrangTua/{id}', [App\Http\Controllers\User\DashboardController::class, 'tampilOrangTua']);

            Route::get('riwayatFormulir',  [App\Http\Controllers\User\DataDiriController::class, 'riwayatFormulir'])->name('riwayatFormulir');


            Route::get('dataDiri',  [App\Http\Controllers\User\DataDiriController::class, 'dataDiri'])->name('dataDiri');
            Route::get('editDataDiri',  [App\Http\Controllers\User\DataDiriController::class, 'editDataDiri'])->name('editDataDiri');
   
            Route::get('cetakFormulir',  [App\Http\Controllers\User\DataDiriController::class, 'cetakFormulir'])->name('cetakFormulir');
            Route::get('formulir/cari/{kk}', [App\Http\Controllers\User\DataDiriController::class, 'cariNIK'])->name('cariNIK');


            // Route::resource('', BuildingController::class)->parameter('', 'building')->only('create', 'store');
        });
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('a')->name('admin.')->group(function () {
            Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('page');
            Route::get('verifikasiFormulir', [App\Http\Controllers\Admin\FormulirController::class, 'verifikasiFormulir'])->name('verifikasiFormulir');
            Route::post('verifikasiFormulir/tolak', [App\Http\Controllers\Admin\FormulirController::class, 'tolakFormulir'])->name('verifikasiFormulir.tolak');
            
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
            // Route::get('laporanSpj', [App\Http\Controllers\Kelurahan\LaporanController::class, 'index'])->name('laporanSpj');
            // Route::get('laporanSpj/create/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'create'])->name('laporanSpj.create');
            // Route::get('laporanSpj/ajukan/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'ajukan'])->name('laporanSpj.ajukan');
        });
        // Route::resource('tenants', TenantController::class)->only('create', 'store');
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
            Route::get('laporanSpj/ajukan/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'ajukan'])->name('laporanSpj.ajukan');
            Route::get('laporanSpj/ajukanBatal/{id}', [App\Http\Controllers\Kelurahan\LaporanController::class, 'ajukanBatal'])->name('laporanSpj.ajukanBatal');
            Route::post('laporanSpj/store', [App\Http\Controllers\Kelurahan\LaporanController::class, 'store'])->name('laporanSpj.store');
            Route::put('laporanSpj/{id}/destroy', [App\Http\Controllers\Kelurahan\LaporanController::class, 'destroy'])->name('laporanSpj.destroy');
        });
        // Route::resource('tenants', TenantController::class)->only('create', 'store');
    });



    // Route::group(['middleware' => ['role:superadmin']], function () {
    //     Route::resource('tenants', TenantController::class)->except('create', 'store');

    //     Route::resource('employees', EmployeeController::class);
    //     Route::get('import', [EmployeeController::class, 'import'])->name('employees.import');
    //     Route::post('import', [EmployeeController::class, 'postImport'])->name('employees.post-import');
   
    // });

  

    // Route::prefix('employees')->name('employees.')->group(function () {
    //     // Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    //     // Route::resource('employees', EmployeeController::class)->only(['store', 'destroy']);
    //     // Route::get('tenants/{id}/employees', EmployeeController::class)->name('employees.edit');
    //     // Route::put('tenants/{id}/employees', [EmployeeController::class])->name('employees.update');
    //     Route::get('', [EmployeeController::class, 'index'])->name('index');
    //     Route::get('create', [EmployeeController::class, 'create'])->name('create');
    //     Route::post('store', [EmployeeController::class, 'store'])->name('create');
    //     Route::delete('destroy', [EmployeeController::class, 'destroy'])->name('destroy');
    //     Route::get('tenant/{id}/show', [EmployeeController::class, 'show'])->name('show');
    //     Route::put('tenant/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');

    // });


});