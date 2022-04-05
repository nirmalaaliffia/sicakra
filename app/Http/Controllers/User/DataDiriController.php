<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Cacat;
use App\Models\Jenjang;
use App\Models\Formulir;
use App\Models\Orangtua;
use App\Models\Kecamatan;
use App\Models\Kendaraan;
use App\States\Orangtua\Ibu;
use Illuminate\Http\Request;
use App\States\Orangtua\Ayah;
use App\States\Orangtua\Wali;
use App\Models\Log_verifikasi;
use App\States\Kendaraan\Mobil;
use App\States\Kendaraan\Motor;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use App\States\Formulir\Disetujui;
use App\States\Formulir\Dibatalkan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;

class DataDiriController extends Controller
{
    public function index()
    {
      return "ss";
    }


    public function dataDiri(){
        $year = date('Y', strtotime(now()));
        $formulir = Formulir::where('user_id', '=', auth()->id())->with('jenjang', 'kelurahan', 'kecamatan')->whereNotState('verifikasi_pengajuan', BelumFinal::class)->whereNotState('verifikasi_pengajuan', Dibatalkan::class)->whereYear('created_at', '=', $year)->first();
        $jenis_kendaraan = Kendaraan::getStatesFor('jenis_kendaraan');
            // $kendaraan = Formulir::whereHas('kendaraan', function ($query) {
            //     $query->where('formulir_id', auth()->id());
            // })->first();

            // $formulir = Formulir::whereHas('kematian', function ($query)  use ($kematian_id){
            //     $query->where('penduduk_id', '=', $kematian_id);
            // })->with( 'hubungan_keluarga', 'jenis_kelamin', 'pekerjaan', 'golongan_darah', 'agama', 'status_perkawinan', 'pendidikan_akhir')->get();

            $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
            $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
            $formAyah = Orangtua::whereState('jenis_orangtua', Ayah::class)->where('formulir_id', '=', $formulir->id)->with('cacat','kecamatan', 'kelurahan')->get();
           
            $formIbu = Orangtua::whereState('jenis_orangtua', Ibu::class)->where('formulir_id', '=', $formulir->id)->with('cacat','kecamatan', 'kelurahan')->get();
            
            $formWali = Orangtua::whereState('jenis_orangtua', Wali::class)->where('formulir_id', '=', $formulir->id)->with('cacat','kecamatan', 'kelurahan')->get();
            
         
          
            $cacats = Cacat::orderBy('nama')->get();
            $status_hidups =  Orangtua::getStatesFor('status_hidup');
            $motors = Kendaraan::where('formulir_id', '=', $formulir->id)->where('plat_nomor', '!=', null)->whereState('jenis_kendaraan', Motor::class)->get();
            $mobils = Kendaraan::where('formulir_id', '=', $formulir->id)->where('plat_nomor', '!=', null)->whereState('jenis_kendaraan', Mobil::class)->get();
           
       return view('user.datadiri', compact('formulir', 'jenis_kendaraan', 'kecamatans', 'jenjangs', 'cacats','status_hidups', 'formAyah', 'formIbu', 'formWali', 'motors', 'mobils'));
    }

    public function editDataDiri(){
      $year = date('Y', strtotime(now()));
      $forms = Formulir::where('user_id', '=', auth()->id())->whereYear('created_at', '=', $year)->first();
      $cek_form = $forms->form_submitted;

      $formulir = Formulir::findOrFail($forms->id);
      $formulir->verifikasi_pengajuan = "BelumFinal";
      $formulir->form_submitted = "5";
      $formulir->save();


      $log_verifikasi = new Log_verifikasi();
      $log_verifikasi->id_pendaftar = auth()->id();
      $log_verifikasi->tanggal_verifikasi = now();
      $log_verifikasi->formulir_id = $forms->id;
      $log_verifikasi->log_verifikasi = "Diubah";
      $log_verifikasi->save();

      
      $jenis_kendaraans = Kendaraan::getStatesFor('jenis_kendaraan');
      $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
      $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
    
      return view('user.formulir.createStepOne', compact('jenis_kendaraans','kecamatans', 'jenjangs', 'cek_form', 'forms'));
    }


    public function cetakFormulir(){
      $year = date('Y', strtotime(now()));
      $date = date('d F Y', strtotime(now()));
      $forms = Formulir::where('user_id', '=', auth()->id())->whereYear('created_at', '=', $year)->first();

      $formAyah = Orangtua::where('formulir_id', '=', $forms->id)->whereState('jenis_orangtua', Ayah::class)->first();
      $formIbu = Orangtua::where('formulir_id', '=', $forms->id)->whereState('jenis_orangtua', Ibu::class)->first();
      $formWali = Orangtua::where('formulir_id', '=', $forms->id)->whereState('jenis_orangtua', Wali::class)->first();

      $templateProcessor =  new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/wordTemplate/formulir.docx'));
      $templateProcessor->setValue('tahun', $year);
      $templateProcessor->setValue('nama', $forms->nama);
      $templateProcessor->setValue('alamat', $forms->alamat);
      $templateProcessor->setValue('rt', $forms->rt);
      $templateProcessor->setValue('RW', $forms->rw);
      $templateProcessor->setValue('namaKelurahan', $forms->kelurahan->nama_kelurahan);
      $templateProcessor->setValue('namaKecamatan', $forms->kecamatan->nama_kecamatan);
      $templateProcessor->setValue('tempatLahir', $forms->tempat_lahir);
      $templateProcessor->setValue('tanggalLahir', $forms->tanggal_lahir);
      $templateProcessor->setValue('noKtp', $forms->no_ktp);
      $templateProcessor->setValue('noKk', $forms->no_kk);
      $templateProcessor->setValue('noTelp', $forms->no_telp);
      if($formAyah == null){
        $templateProcessor->setValue('namaAyah', "-");
        $templateProcessor->setValue('alamatAyah',"-");
        $templateProcessor->setValue('rtAyah', "-");
        $templateProcessor->setValue('rwAyah', "-");
        $templateProcessor->setValue('kelurahanAyah', "-");
        $templateProcessor->setValue('kecamatanAyah', "-");
        $templateProcessor->setValue('pekerjaanAyah', "-");
        $templateProcessor->setValue('tempatLahirAyah',"-");
        $templateProcessor->setValue('tanggalLahirAyah', "-");
        $templateProcessor->setValue('penghasilanAyah', "-");
        $templateProcessor->setValue('noKtpAyah',"-");
        $templateProcessor->setValue('noKkAyah', "-");
        $templateProcessor->setValue('noTelpAyah', "-");
      }else{
        $templateProcessor->setValue('namaAyah', $formAyah->nama_orangtua);
        $templateProcessor->setValue('alamatAyah', $formAyah->alamat);
        $templateProcessor->setValue('rtAyah', $formAyah->rt);
        $templateProcessor->setValue('rwAyah', $formAyah->rw);
        $templateProcessor->setValue('kelurahanAyah', $formAyah->kelurahan->nama_kelurahan);
        $templateProcessor->setValue('kecamatanAyah', $formAyah->kecamatan->nama_kecamatan);
        $templateProcessor->setValue('pekerjaanAyah', $formAyah->pekerjaan);
        $templateProcessor->setValue('tempatLahirAyah', $formAyah->tempat_lahir);
        $templateProcessor->setValue('tanggalLahirAyah', $formAyah->tanggal_lahir);
        $templateProcessor->setValue('penghasilanAyah', $formAyah->penghasilan);
        $templateProcessor->setValue('noKtpAyah', $formAyah->no_ktp);
        $templateProcessor->setValue('noKkAyah', $formAyah->no_kk);
        $templateProcessor->setValue('noTelpAyah', $formAyah->no_telp);
      }
      if($formIbu == null){
        $templateProcessor->setValue('namaIbu', "-");
        $templateProcessor->setValue('alamatIbu',  "-");
        $templateProcessor->setValue('rtIbu',  "-");
        $templateProcessor->setValue('rwIbu',  "-");
        $templateProcessor->setValue('kelurahanIbu',  "-");
        $templateProcessor->setValue('kecamatanIbu',  "-");
        $templateProcessor->setValue('pekerjaanIbu',  "-");
        $templateProcessor->setValue('tempatLahirIbu',  "-");
        $templateProcessor->setValue('tanggalLahirIbu',  "-");
        $templateProcessor->setValue('penghasilanIbu',  "-");
        $templateProcessor->setValue('noKtpIbu',  "-");
        $templateProcessor->setValue('noKkIbu',  "-");
        $templateProcessor->setValue('noTelpIbu',  "-");

      }else{
        $templateProcessor->setValue('namaIbu', $formIbu->nama_orangtua);
        $templateProcessor->setValue('alamatIbu', $formIbu->alamat);
        $templateProcessor->setValue('rtIbu', $formIbu->rt);
        $templateProcessor->setValue('rwIbu', $formIbu->rw);
        $templateProcessor->setValue('kelurahanIbu', $formIbu->kelurahan->nama_kelurahan);
        $templateProcessor->setValue('kecamatanIbu', $formIbu->kecamatan->nama_kecamatan);
        $templateProcessor->setValue('pekerjaanIbu', $formIbu->pekerjaan);
        $templateProcessor->setValue('tempatLahirIbu', $formIbu->tempat_lahir);
        $templateProcessor->setValue('tanggalLahirIbu', $formIbu->tanggal_lahir);
        $templateProcessor->setValue('penghasilanIbu', $formIbu->penghasilan);
        $templateProcessor->setValue('noKtpIbu', $formIbu->no_ktp);
        $templateProcessor->setValue('noKkIbu', $formIbu->no_kk);
        $templateProcessor->setValue('noTelpIbu', $formIbu->no_telp);
      }


      if($formWali == null){
        $templateProcessor->setValue('namaWali', "-");
        $templateProcessor->setValue('alamatWali', "-");
        $templateProcessor->setValue('rtWali', "-");
        $templateProcessor->setValue('rwWali', "-");
        $templateProcessor->setValue('kelurahanWali', "-");
        $templateProcessor->setValue('kecamatanWali', "-");
        $templateProcessor->setValue('pekerjaanWali', "-");
        $templateProcessor->setValue('tempatLahirWali', "-");
        $templateProcessor->setValue('tanggalLahirWali',"-");
        $templateProcessor->setValue('penghasilanWali', "-");
        $templateProcessor->setValue('noKtpWali',"-");
        $templateProcessor->setValue('noKkWali', "-");
        $templateProcessor->setValue('noTelpWali', "-");
      
      }else{
        $templateProcessor->setValue('namaWali', $formWali->nama_orangtua);
        $templateProcessor->setValue('alamatWali', $formWali->alamat);
        $templateProcessor->setValue('rtWali', $formWali->rt);
        $templateProcessor->setValue('rwWali', $formWali->rw);
        $templateProcessor->setValue('kelurahanWali', $formWali->kelurahan->nama_kelurahan);
        $templateProcessor->setValue('kecamatanWali', $formWali->kecamatan->nama_kecamatan);
        $templateProcessor->setValue('pekerjaanWali', $formWali->pekerjaan);
        $templateProcessor->setValue('tempatLahirWali', $formWali->tempat_lahir);
        $templateProcessor->setValue('tanggalLahirWali', $formWali->tanggal_lahir);
        $templateProcessor->setValue('penghasilanWali', $formWali->penghasilan);
        $templateProcessor->setValue('noKtpWali', $formWali->no_ktp);
        $templateProcessor->setValue('noKkWali', $formWali->no_kk);
        $templateProcessor->setValue('noTelpWali', $formWali->no_telp);
      
      }
      $templateProcessor->setValue('AsalSekolah', $forms->asal_sekolah);
      $templateProcessor->setValue('alamatSekolah', "");
      $templateProcessor->setValue('namaUniversitas', $forms->nama_universitas);
      $templateProcessor->setValue('noInduk', $forms->no_induk_mahasiswa);
      $templateProcessor->setValue('tahunMasuk', $forms->tahun_masuk);
      $templateProcessor->setValue('jenjang', $forms->jenjang->nama_jenjang);
      $templateProcessor->setValue('fakultas', $forms->fakultas);
      $templateProcessor->setValue('jurusan', $forms->jurusan);
      $templateProcessor->setValue('semester', $forms->semester);
      $templateProcessor->setValue('lokasiUniversitas', "");
      $templateProcessor->setValue('nilaiIpk', $forms->nilai_ipk);
      $templateProcessor->setValue('nilaiUjian', $forms->nilai_rata_ujian_sekolah);
      $templateProcessor->setValue('nilaiAkhir', "");
      $templateProcessor->setValue('tanggal', $date);




      $fileName="Formulir-".$forms->nama."-".now().".docx";
      $fileStorage = storage_path('app/public/processed/' . $fileName);
      $templateProcessor->saveAs($fileStorage);

      //Load export library
	$domPdfPath = base_path( 'vendor/dompdf/dompdf');
	\PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
	\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
	
	//load generated file
	$phpWord = \PhpOffice\PhpWord\IOFactory::load($fileStorage); 
	//generate the pdf converter class
	$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
	//save generated File
  $filePdf="Formulir-".$forms->nama."-".now().".pdf";
	$pdfLocation = storage_path('app/public/converted/' . $filePdf);
	$xmlWriter->save($pdfLocation, true);
	//return the file from controller
	return response()->download($pdfLocation);
      // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
      // $objWriter->save('test.pdf');

      //return response()->download($fileName)->deleteFileAfterSend(true);
    }


    public function riwayatFormulir(){

      $forms = Formulir::where('user_id', '=', auth()->id())->get();

     
      return view('user.riwayatFormulir', compact('forms'));
    }

    public static function cariNIK($kk)
    {
       
        // $penduduk = Penduduk::select('penduduks.id','penduduks.kebangsaan', 'penduduks.kecamatan_id','penduduks.kelurahan_id', 'penduduks.nik','penduduks.no_akta_lahir', 'penduduks.no_kk', 'penduduks.alamat_ktp', 'penduduks.alamat_domisili', 'penduduks.nama_lengkap', 'penduduks.tempat_lahir', 'penduduks.tanggal_lahir', 'penduduks.nik_ibu', 'penduduks.nama_lengkap_ibu', 'penduduks.nik_ayah', 'penduduks.nama_lengkap_ayah', 'hubungan_keluargas.id AS id_hubungan_keluarga', 'hubungan_keluargas.nama AS hubungan_keluarga', 'jenis_kelamins.id AS id_jenis_kelamin', 'jenis_kelamins.jenis_kelamin', 'pekerjaans.id AS id_pekerjaan', 'pekerjaans.nama AS pekerjaan', 'golongan_darahs.id AS id_golongan_darah' , 'golongan_darahs.nama AS golongan_darah', 'agamas.id AS id_agama', 'agamas.nama AS agama', 'status_perkawinans.id AS id_status_perkawinan', 'status_perkawinans.status_warga AS status_perkawinan', 'pendidikan_akhirs.nama AS pendidikan_akhir', 'pendidikan_akhirs.id AS id_pendidikan_akhir')
        //                     ->where('penduduks.nik', '=', $nik)
        //                     ->leftJoin('hubungan_keluargas', 'hubungan_keluargas.id', '=', DB::raw('CAST(penduduks.hubungan_keluarga_id AS INTEGER)'))
        //                     ->leftJoin('jenis_kelamins', 'jenis_kelamins.id', '=', DB::raw('CAST(penduduks.jenis_kelamin_id AS INTEGER)'))
        //                     ->leftJoin('pekerjaans', 'pekerjaans.id', '=', DB::raw('CAST(penduduks.pekerjaan_id AS INTEGER)'))
        //                     ->leftJoin('golongan_darahs', 'golongan_darahs.id', '=', DB::raw('CAST(penduduks.golongan_darah_id AS INTEGER)'))
        //                     ->leftJoin('agamas', 'agamas.id', '=', DB::raw('CAST(penduduks.agama_id AS INTEGER)'))
        //                     ->leftJoin('status_perkawinans', 'status_perkawinans.id', '=', DB::raw('CAST(penduduks.status_perkawinan_id AS INTEGER)'))
        //                     ->leftJoin('pendidikan_akhirs', 'pendidikan_akhirs.id', '=', DB::raw('CAST(penduduks.pendidikan_akhir_id AS INTEGER)'))
        //                     ->get();

        $dataForm = Formulir::where('no_kk', '=', $kk)->whereState('verifikasi_pengajuan', Disetujui::class)->get();

         return $dataForm;
    }
}
