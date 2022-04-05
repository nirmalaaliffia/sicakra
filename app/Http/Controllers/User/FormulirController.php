<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Cacat;
use App\Models\Jenjang;
use App\Models\Formulir;
use App\Models\Orangtua;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kendaraan;
use App\States\Orangtua\Ibu;
use Illuminate\Http\Request;
use App\States\Orangtua\Ayah;
use App\States\Orangtua\Wali;
use App\States\Kendaraan\Motor;
use App\States\Kendaraan\Mobil;
use App\States\Formulir\BelumFinal;
use App\States\Formulir\Diajukan;
use App\States\Formulir\Disetujui;
use App\States\Formulir\Dibatalkan;
use App\States\Formulir\Ditolak;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFormulirStepOneRequest;
use App\Http\Requests\StoreFormulirStepThreeRequest;
use App\Models\Log_verifikasi;
use App\States\Kendaraan\Motor as KendaraanMotor;

class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y', strtotime(now()));
        $cek_form = User::whereHas('formulir', function ($query) use ($year) {
            $query->where('user_id', '=', auth()->id())->whereYear('created_at', '=', $year);
        })->count();
        

        
        if($cek_form == '0' ){
            //redirect ke halaman form
            // $jenis_kendaraan = Kendaraan::getStatesFor('jenis_kendaraan');

            // return view('user.formulir.create', compact('jenis_kendaraan'));
            return redirect()->route('user.createPengajuanStepOne');
            
        }else{
            //redirect ke halaman datadiri
            //$formulir = Formulir::findOrFail(Auth::id());
           // $jenis_kendaraan = Kendaraan::getStatesFor('jenis_kendaraan');
            // $kendaraan = Formulir::whereHas('kendaraan', function ($query) {
            //     $query->where('formulir_id', auth()->id());
            // })->first();

            // $formulir = Formulir::whereHas('kematian', function ($query)  use ($kematian_id){
            //     $query->where('penduduk_id', '=', $kematian_id);
            // })->with( 'hubungan_keluarga', 'jenis_kelamin', 'pekerjaan', 'golongan_darah', 'agama', 'status_perkawinan', 'pendidikan_akhir')->get();

            return redirect()->route('user.dataDiri');
           // return view('user.datadiri', compact('formulir', 'jenis_kendaraan'));
        }
    }


    public function createStepOne(Request $request){
        
        ///cari semua form yang statusnya belum final, redirect ke halaman form
        $form = Formulir::where('user_id', '=', auth()->id())->get();

        if(count($form)){
            //ada banyak form 
           $year = date('Y', strtotime(now()));
            //cek form apakah ada form yang belum final di tahun sekarang, kl ada maka redirect ke form sesuai dengan form subbmitted
            $form_belum_final = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
        
            //jika ada form yang belum final maka redirect ke halaman form
            if($form_belum_final != null){
                //redirect sesuai dengan tahapan form 1
                
                    $forms = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
                    $cek_form = $forms->form_submitted;
                
                    $jenis_kendaraans = Kendaraan::getStatesFor('jenis_kendaraan');
                    $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
                    $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
                      
                    return view('user.formulir.createStepOne', compact('jenis_kendaraans','kecamatans', 'jenjangs', 'cek_form', 'forms'));
           
            }else{
                //ada form tapi bukan form yang statusnya belum final, kemungkinan form status diajukan/ditolak/dibatalkan atau form di tahun yang berbeda             
                
                //cek apakah form tersebut di tahun saat ini atau berbeda, jika berbeda arahkan ke form baru, jika sama cek apakah statusnya diajukan/ditolak/batalkan
                $form_cek_tahun = Formulir::where('user_id', '=', auth()->id())->whereNotState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->get();
        
                if(count($form_cek_tahun)){
                    //ada form yang statusnya bukan belum final dan di tahun yang sama. bisa jadi statusnya dibatalkan,diajukan,ditolak

                    //cek apakah form ini statusnya disetujui, jika iya maka alihkan ke dashboard
                    $form_cek_disetujui_tahun = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', Disetujui::class)->whereYear('created_at', '=', $year)->get();
                    $form_cek_ditolak_tahun = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', Ditolak::class)->whereYear('created_at', '=', $year)->get();
                    $form_cek_dibatalkan_tahun = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', Dibatalkan::class)->whereYear('created_at', '=', $year)->get();
        

                    if(count($form_cek_disetujui_tahun)){
                        //ada form yang disetujui ditahun yang sama, redirect ke dashboard 
                        return view('user.dashboard');
                    }
                        //ada form yang ditolak ditahun yang sama , redirect ke dashboard
                    if(count($form_cek_ditolak_tahun)){
                            //ada form yang ditolak ditahun yang sama, redirect ke dashboard 
                        return view('user.dashboard');
                    }
                    //ada form yang dibatalkan ditahun yang sama, maka mengajukan data baru
                    if(count($form_cek_dibatalkan_tahun)){
                        //ada form yang dibatalkan ditahun yang sama, rmaka mengajukan data baru 
                        $forms = null;
                        $cek_form = "0";
                        
                        $jenis_kendaraans = Kendaraan::getStatesFor('jenis_kendaraan');
                        $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
                        $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
                              
                        return view('user.formulir.createStepOne', compact('jenis_kendaraans','kecamatans', 'jenjangs', 'cek_form','forms'));
                    }
                   

                 
                }else{
                    //kemungkinan tidak ada form selain belum final di tahun yang sama, bisa jadi di tahun yang berbeda.
                    
                    //jikla ada form di tahun yang berbeda, maka alihkan membuat form yang baru dengan adata sebelumnya, hanya berbeda created at
                    $forms = null;
                    $cek_form = "0";
                    
                    $jenis_kendaraans = Kendaraan::getStatesFor('jenis_kendaraan');
                    $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
                    $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
                          
                    return view('user.formulir.createStepOne', compact('jenis_kendaraans','kecamatans', 'jenjangs', 'cek_form','forms'));
                }
               
                //kurang kondisional nomor kk yang sama
            }
          

           // return $form_belum_final ;
        }else{
            //return "user baru dan belum pernah membuat form";
          
            $forms = null;
            $cek_form = "0";
    
            $jenis_kendaraans = Kendaraan::getStatesFor('jenis_kendaraan');
            $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
            $jenjangs = Jenjang::orderBy('nama_jenjang')->get();
          
            return view('user.formulir.createStepOne', compact('jenis_kendaraans','kecamatans', 'jenjangs', 'cek_form','forms'));
        }

   

     
    }

    public function postCreateStepOne(StoreFormulirStepOneRequest $request){
        $year = date('Y', strtotime(now()));
        $cek_form = Formulir::where('user_id', '=', auth()->id())->whereYear('created_at', '=', $year)->count();

        if($cek_form == "0"){
            $formulir = new Formulir();
            $formulir->user_id = auth()->id();
            $formulir->batch = $year;
            $formulir->nama = $request->nama;
            $formulir->kecamatan_id = $request->kecamatan;
            $formulir->alamat = $request->jalan;
            $formulir->rt = $request->rt;
            $formulir->rw = $request->rw;
            $formulir->kelurahan_id = $request->kelurahan;
            $formulir->tempat_lahir = $request->tempat_lahir;
            $formulir->tanggal_lahir = $request->tanggal_lahir;
            $formulir->no_ktp = $request->ktp;
            $formulir->no_kk = $request->kk;
            $formulir->no_telp = $request->no_telp;
            $formulir->asal_sekolah = $request->asal_sekolah;
            $formulir->nilai_rata_ujian_sekolah = $request->nilai_ujian_sekolah;
            $formulir->nilai_ipk = $request->nilai_ipk;
            $formulir->nama_universitas = $request->nama_universitas;
            $formulir->no_induk_mahasiswa = $request->no_induk_mahasiswa;
            $formulir->tahun_masuk_universitas = $request->tahun_masuk_universitas;
            $formulir->jenjang_id = $request->jenjang;
            $formulir->fakultas = $request->fakultas;
            $formulir->jurusan = $request->jurusan;
            $formulir->semester = $request->semester;
            $formulir->verifikasi_pengajuan = "BelumFinal";
            $formulir->form_submitted = "1";
            $formulir->save();

        }else{
           
            $cekFormStepOne = Formulir::where('user_id', '=', auth()->id())->where('form_submitted', '=', '1')->whereYear('created_at', '=', $year)->first();
            
            if($cekFormStepOne != null){
                $formulir = Formulir::findOrFail($cekFormStepOne->id);
                $formulir->user_id = auth()->id();
                $formulir->batch = $year;
                $formulir->nama = $request->nama;
                $formulir->kecamatan_id = $request->kecamatan;
                $formulir->alamat = $request->jalan;
                $formulir->rt = $request->rt;
                $formulir->rw = $request->rw;
                $formulir->kelurahan_id = $request->kelurahan;
                $formulir->tempat_lahir = $request->tempat_lahir;
                $formulir->tanggal_lahir = $request->tanggal_lahir;
                $formulir->no_ktp = $request->ktp;
                $formulir->no_kk = $request->kk;
                $formulir->no_telp = $request->no_telp;
                $formulir->asal_sekolah = $request->asal_sekolah;
                $formulir->nilai_rata_ujian_sekolah = $request->nilai_ujian_sekolah;
                $formulir->nilai_ipk = $request->nilai_ipk;
                $formulir->nama_universitas = $request->nama_universitas;
                $formulir->no_induk_mahasiswa = $request->no_induk_mahasiswa;
                $formulir->tahun_masuk_universitas = $request->tahun_masuk_universitas;
                $formulir->jenjang_id = $request->jenjang;
                $formulir->fakultas = $request->fakultas;
                $formulir->jurusan = $request->jurusan;
                $formulir->semester = $request->semester;
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
            }else{

                $cekFormStepOne = Formulir::where('user_id', '=', auth()->id())->where('form_submitted', '=', '5')->whereYear('created_at', '=', $year)->first();
                $formulir = Formulir::findOrFail($cekFormStepOne->id);
                $formulir->user_id = auth()->id();
                $formulir->batch = $year;
                $formulir->nama = $request->nama;
                $formulir->kecamatan_id = $request->kecamatan;
                $formulir->alamat = $request->jalan;
                $formulir->rt = $request->rt;
                $formulir->rw = $request->rw;
                $formulir->kelurahan_id = $request->kelurahan;
                $formulir->tempat_lahir = $request->tempat_lahir;
                $formulir->tanggal_lahir = $request->tanggal_lahir;
                $formulir->no_ktp = $request->ktp;
                $formulir->no_kk = $request->kk;
                $formulir->no_telp = $request->no_telp;
                $formulir->asal_sekolah = $request->asal_sekolah;
                $formulir->nilai_rata_ujian_sekolah = $request->nilai_ujian_sekolah;
                $formulir->nilai_ipk = $request->nilai_ipk;
                $formulir->nama_universitas = $request->nama_universitas;
                $formulir->no_induk_mahasiswa = $request->no_induk_mahasiswa;
                $formulir->tahun_masuk_universitas = $request->tahun_masuk_universitas;
                $formulir->jenjang_id = $request->jenjang;
                $formulir->fakultas = $request->fakultas;
                $formulir->jurusan = $request->jurusan;
                $formulir->semester = $request->semester;
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
            }

          
        }
  
        
        return redirect()->route('user.createPengajuanStepTwo');
    }


    public function createStepTwo(Request $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();

        if($get_form == null){
            return redirect()->route('user.page');
        }else{
            $cek_form = $get_form->form_submitted;
            $id_form = $get_form->id;
            // $cek_form = Formulir::whereHas('orangtua', function ($query) use ($id_formulir) {
            //     $query->where('formulir_id', '=', $id_formulir);
            // })->count();
            $formAyah = Orangtua::whereState('jenis_orangtua', Ayah::class)->where('formulir_id', '=', $id_form)->with('kecamatan', 'kelurahan')->get();
           
            $formIbu = Orangtua::whereState('jenis_orangtua', Ibu::class)->where('formulir_id', '=', $id_form)->with('kecamatan', 'kelurahan')->get();
            
            $formWali = Orangtua::whereState('jenis_orangtua', Wali::class)->where('formulir_id', '=', $id_form)->with('kecamatan', 'kelurahan')->get();
            
         
            $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
            $cacats = Cacat::orderBy('nama')->get();
            $status_hidups =  Orangtua::getStatesFor('status_hidup');
            
            return view('user.formulir.createStepTwo', compact('kecamatans','cek_form', 'cacats','status_hidups', 'formAyah', 'formIbu', 'formWali'));
        }
      

       
    }

  

    public function postCreateStepTwo(Request $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();

        $id_form = $get_form->id;

        if($request->nama_wali != null){
            //data wali

            $this->validate($request, 
            [
                'nama_wali' => 'required',
                'alamat_wali' => 'required',
                'rt_wali' => 'required',
                'rw_wali' => 'required',
                'kecamatan_wali' => 'required',
                'kelurahan_wali' => 'required',
                'tempat_lahir_wali' => 'required',
                'tanggal_lahir_wali' => 'required',
                'no_telp_wali' => 'required',
                'no_ktp_wali' => 'required',
                'no_kk_wali' => 'required',
                'pekerjaan_wali' => 'required',
                'penghasilan_wali' => 'required',
            ],
            $messages = 
            [
                'no_ktp_wali.required' => "No KTP harus diisi.",
                'no_kk_wali.required' => "NO KK harus diisi.",
                'nama_wali.required' => "Nama lengkap harus diisi.",
                'tempat_lahir.required' =>"Tempat lahir harus diisi.",
                'tanggal_lahir.required' =>"Tanggal lahir harus diisi.",
                'no_akta_lahir.required' =>"No akta kelahiran harus diisi.",
                'alamat_wali.required' => "Alamat sesuai ktp harus diisi.",
                'rt_wali.required' => "Nomor RT sesuai ktp harus diisi.",
                'rw_wali.required' => "Nomor RW ktp harus diisi.",
                'kecamatan_wali.required' => "Kecamatan sesuai ktp harus diisi.",
                'kelurahan_wali.required' => "Kelurahan sesuai ktp harus diisi.",
                'tempat_lahir_wali.required' => "Tempat Lahir sesuai ktp harus diisi.",
                'tanggal_lahir_wali.required' => "Tanggal Lahir sesuai ktp harus diisi.",
                'no_telp_wali.required' => "No Telepon / WhatsApp yang aktif harus diisi.",
                'pekerjaan_wali.required' => "Pekerjaan wali harus diisi.",
                'penghasilan_wali.required' => "Penghasilan orangtua harus diisi.",

            ]);


            $cekWali = Orangtua::where('formulir_id', '=', $id_form)->whereState('jenis_orangtua', Wali::class)->first();

            if($cekWali == null){

              
                $wali = new Orangtua();
                $wali->formulir_id = $id_form;
                $wali->jenis_orangtua ="Wali";
                $wali->nama_orangtua =$request->nama_wali;
                $wali->kecamatan_id = $request->kecamatan_wali;
                $wali->alamat = $request->alamat_wali;
                $wali->rt = $request->rt_wali;
                $wali->rw = $request->rw_wali;
                $wali->kelurahan_id = $request->kelurahan_wali;
                $wali->tempat_lahir = $request->tempat_lahir_wali;
                $wali->tanggal_lahir = $request->tanggal_lahir_wali;
                $wali->no_ktp = $request->no_ktp_wali;
                $wali->no_kk = $request->no_kk_wali;
                $wali->no_telp = $request->no_telp_wali;
                $wali->pekerjaan = $request->pekerjaan_wali;
                $wali->penghasilan = $request->penghasilan_wali;
                $wali->disabilitas_orangtua = $request->cacat_wali;
                $wali->status_hidup = $request->status_hidup_wali;
                $wali->save();


                $formulir = Formulir::findOrFail($id_form);
                $formulir->form_submitted = "2";
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     

            }else{
               
                $wali = Orangtua::findOrFail($cekWali->id);
                $wali->formulir_id = $id_form;
                $wali->jenis_orangtua ="Wali";
                $wali->nama_orangtua =$request->nama_wali;
                $wali->kecamatan_id = $request->kecamatan_wali;
                $wali->alamat = $request->alamat_wali;
                $wali->rt = $request->rt_wali;
                $wali->rw = $request->rw_wali;
                $wali->kelurahan_id = $request->kelurahan_wali;
                $wali->tempat_lahir = $request->tempat_lahir_wali;
                $wali->tanggal_lahir = $request->tanggal_lahir_wali;
                $wali->no_ktp = $request->no_ktp_wali;
                $wali->no_kk = $request->no_kk_wali;
                $wali->no_telp = $request->no_telp_wali;
                $wali->pekerjaan = $request->pekerjaan_wali;
                $wali->penghasilan = $request->penghasilan_wali;
                $wali->disabilitas_orangtua = $request->cacat_wali;
                $wali->status_hidup = $request->status_hidup_wali;
                $wali->save();

                $formulir = Formulir::findOrFail($id_form);
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     
                
            }
            return redirect()->route('user.createPengajuanStepThree');


        }
        
        
        if($request->nama_ayah != null || $request->nama_ibu != null ){
            //data orangtua
           
            
            //cek data ayah ada atau tidak
           if($request->nama_ayah != null){

            $this->validate($request, 
            [
                'status_hidup' => 'required',
                'nama_ayah' => 'required',
                'alamat_ayah' => 'required',
                'rt_ayah' => 'required',
                'rw_ayah' => 'required',
                'kecamatan_ayah' => 'required',
                'kelurahan_ayah' => 'required',
                'cacat_ayah' => 'required',
                'tempat_lahir_ayah' => 'required',
                'tanggal_lahir_ayah' => 'required',
                'no_telp_ayah' => 'required',
                'no_ktp_ayah' => 'required',
                'no_kk_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'penghasilan_ayah' => 'required',
            ],
            $messages = 
            [
                'no_ktp_ayah.required' => "No KTP harus diisi.",
                'no_kk_ayah.required' => "NO KK harus diisi.",
                'nama_ayah.required' => "Nama lengkap Ayah harus diisi.",
                'tempat_lahir_ayah.required' =>"Tempat lahir harus diisi.",
                'tanggal_lahir_ayah.required' =>"Tanggal lahir harus diisi.",
                'status_hidup.required' =>"Status hidup harus diisi.",
                'alamat_ayah.required' => "Alamat sesuai ktp harus diisi.",
                'rt_ayah.required' => "Nomor RT sesuai ktp harus diisi.",
                'rw_ayah.required' => "Nomor RW ktp harus diisi.",
                'kecamatan_ayah.required' => "Kecamatan sesuai ktp harus diisi.",
                'kelurahan_ayah.required' => "Kelurahan sesuai ktp harus diisi.",
                'tempat_lahir_ayah.required' => "Tempat Lahir sesuai ktp harus diisi.",
                'tanggal_lahir_ayah.required' => "Tanggal Lahir sesuai ktp harus diisi.",
                'no_telp_ayah.required' => "No Telepon / WhatsApp yang aktif harus diisi.",
                'pekerjaan_ayah.required' => "Pekerjaan Ayah harus diisi.",
                'penghasilan_ayah.required' => "Penghasilan Ayah harus diisi.",
            ]);
            
      
            $cekAyah = Orangtua::whereState('jenis_orangtua', Ayah::class)->where('formulir_id', '=', $id_form)->first();
            
            if( $cekAyah == null){
                //tida ada data ayah, buat baru

                $orangtua = new Orangtua();
                $orangtua->formulir_id = $id_form;
                $orangtua->jenis_orangtua ="Ayah";
                $orangtua->nama_orangtua =$request->nama_ayah;
                $orangtua->kecamatan_id = $request->kecamatan_ayah;
                $orangtua->alamat = $request->alamat_ayah;
                $orangtua->rt = $request->rt_ayah;
                $orangtua->rw = $request->rw_ayah;
                $orangtua->kelurahan_id = $request->kelurahan_ayah;
                $orangtua->tempat_lahir = $request->tempat_lahir_ayah;
                $orangtua->tanggal_lahir = $request->tanggal_lahir_ayah;
                $orangtua->no_ktp = $request->no_ktp_ayah;
                $orangtua->no_kk = $request->no_kk_ayah;
                $orangtua->no_telp = $request->no_telp_ayah;
                $orangtua->pekerjaan = $request->pekerjaan_ayah;
                $orangtua->penghasilan = $request->penghasilan_ayah;
                $orangtua->disabilitas_orangtua = $request->cacat_ayah;
                $orangtua->status_hidup = $request->status_hidup;
                $orangtua->save();


                $formulir = Formulir::findOrFail($id_form);
                $formulir->form_submitted = "2";
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     

            }else{
                
                $orangtua = Orangtua::findOrFail($cekAyah->id);
                $orangtua->formulir_id = $id_form;
                $orangtua->jenis_orangtua = "Ayah";
                $orangtua->nama_orangtua =$request->nama_ayah;
                $orangtua->kecamatan_id = $request->kecamatan_ayah;
                $orangtua->alamat = $request->alamat_ayah;
                $orangtua->rt = $request->rt_ayah;
                $orangtua->rw = $request->rw_ayah;
                $orangtua->kelurahan_id = $request->kelurahan_ayah;
                $orangtua->tempat_lahir = $request->tempat_lahir_ayah;
                $orangtua->tanggal_lahir = $request->tanggal_lahir_ayah;
                $orangtua->no_ktp = $request->no_ktp_ayah;
                $orangtua->no_kk = $request->no_kk_ayah;
                $orangtua->no_telp = $request->no_telp_ayah;
                $orangtua->pekerjaan = $request->pekerjaan_ayah;
                $orangtua->penghasilan = $request->penghasilan_ayah;
                $orangtua->disabilitas_orangtua = $request->cacat_ayah;
                $orangtua->status_hidup = $request->status_hidup;
                $orangtua->save();
                
                $formulir = Formulir::findOrFail($id_form);
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     
            }
           
           }
           
            //cek data ibu ada atau tidak
           if($request->nama_ibu != null){

            $this->validate($request, 
            [
                'status_hidup_ibu' => 'required',
                'nama_ibu' => 'required',
                'alamat_ibu' => 'required',
                'rt_ibu' => 'required',
                'rw_ibu' => 'required',
                'kecamatan_ibu' => 'required',
                'kelurahan_ibu' => 'required',
                'cacat_ibu' => 'required',
                'tempat_lahir_ibu' => 'required',
                'tanggal_lahir_ibu' => 'required',
                'no_telp_ibu' => 'required',
                'no_ktp_ibu' => 'required',
                'no_kk_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'penghasilan_ibu' => 'required',
            ],
            $messages = 
            [
                'no_ktp_ibu.required' => "No KTP harus diisi.",
                'no_kk_ibu.required' => "NO KK harus diisi.",
                'nama_ibu.required' => "Nama lengkap Ibu harus diisi.",
                'tempat_lahir_ibu.required' =>"Tempat lahir harus diisi.",
                'tanggal_lahir_ibu.required' =>"Tanggal lahir harus diisi.",
                'status_hidup_ibu.required' =>"Status hidup harus diisi.",
                'alamat_ibu.required' => "Alamat sesuai ktp harus diisi.",
                'rt_ibu.required' => "Nomor RT sesuai ktp harus diisi.",
                'rw_ibu.required' => "Nomor RW ktp harus diisi.",
                'kecamatan_ibu.required' => "Kecamatan sesuai ktp harus diisi.",
                'kelurahan_ibu.required' => "Kelurahan sesuai ktp harus diisi.",
                'tempat_lahir_ibu.required' => "Tempat Lahir sesuai ktp harus diisi.",
                'tanggal_lahir_ibu.required' => "Tanggal Lahir sesuai ktp harus diisi.",
                'no_telp_ibu.required' => "No Telepon / WhatsApp yang aktif harus diisi.",
                'pekerjaan_ibu.required' => "Pekerjaan Ibu harus diisi.",
                'penghasilan_ibu.required' => "Penghasilan Ibu harus diisi.",
            ]);


            $cekIbu = Orangtua::whereState('jenis_orangtua', Ibu::class)->where('formulir_id', '=', $id_form)->first();
            

            if($cekIbu == null){


                $orangtua = new Orangtua();
                $orangtua->formulir_id = $id_form;
                $orangtua->jenis_orangtua ="Ibu";
                $orangtua->nama_orangtua =$request->nama_ibu;
                $orangtua->kecamatan_id = $request->kecamatan_ibu;
                $orangtua->alamat = $request->alamat_ibu;
                $orangtua->rt = $request->rt_ibu;
                $orangtua->rw = $request->rw_ibu;
                $orangtua->kelurahan_id = $request->kelurahan_ibu;
                $orangtua->tempat_lahir = $request->tempat_lahir_ibu;
                $orangtua->tanggal_lahir = $request->tanggal_lahir_ibu;
                $orangtua->no_ktp = $request->no_ktp_ibu;
                $orangtua->no_kk = $request->no_kk_ibu;
                $orangtua->no_telp = $request->no_telp_ibu;
                $orangtua->pekerjaan = $request->pekerjaan_ibu;
                $orangtua->penghasilan = $request->penghasilan_ibu;
                $orangtua->disabilitas_orangtua = $request->cacat_ibu;
                $orangtua->status_hidup = $request->status_hidup_ibu;
                $orangtua->save();


                $formulir = Formulir::findOrFail($id_form);
                $formulir->form_submitted = "2";
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     

            }else{
               
                $orangtua = Orangtua::findOrFail($cekIbu->id);
                $orangtua->formulir_id = $id_form;
                $orangtua->jenis_orangtua ="Ibu";
                $orangtua->nama_orangtua =$request->nama_ibu;
                $orangtua->kecamatan_id = $request->kecamatan_ibu;
                $orangtua->alamat = $request->alamat_ibu;
                $orangtua->rt = $request->rt_ibu;
                $orangtua->rw = $request->rw_ibu;
                $orangtua->kelurahan_id = $request->kelurahan_ibu;
                $orangtua->tempat_lahir = $request->tempat_lahir_ibu;
                $orangtua->tanggal_lahir = $request->tanggal_lahir_ibu;
                $orangtua->no_ktp = $request->no_ktp_ibu;
                $orangtua->no_kk = $request->no_kk_ibu;
                $orangtua->no_telp = $request->no_telp_ibu;
                $orangtua->pekerjaan = $request->pekerjaan_ibu;
                $orangtua->penghasilan = $request->penghasilan_ibu;
                $orangtua->disabilitas_orangtua = $request->cacat_ibu;
                $orangtua->status_hidup = $request->status_hidup_ibu;
                $orangtua->save();
                
                $formulir = Formulir::findOrFail($id_form);
                $formulir->verifikasi_pengajuan = "BelumFinal";
                $formulir->save();
     

            }
           
           }

        
           return redirect()->route('user.createPengajuanStepThree');

        }
    }




    public function createStepThree(Request $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
        if($get_form == null){
            return redirect()->route('user.page');
        }else{
            
        $cek_form = $get_form->form_submitted;

        $motors = Kendaraan::where('formulir_id', '=', $get_form->id)->whereState('jenis_kendaraan', Motor::class)->get();
        $mobils = Kendaraan::where('formulir_id', '=', $get_form->id)->whereState('jenis_kendaraan', Mobil::class)->get();
       

        $kepemilikan_rumahs =  Formulir::getStatesFor('kepemilikan_rumah');
        
        $jenis_kendaraan = Kendaraan::getStatesFor('jenis_kendaraan');
        return view('user.formulir.createStepThree', compact('jenis_kendaraan','cek_form', 'kepemilikan_rumahs', 'motors', 'mobils', 'get_form'));

        }

       
    }

    public function postCreateStepThree(StoreFormulirStepThreeRequest $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();

        $id_form = $get_form->id;



        if($get_form == null){


            $formulir = new Formulir();
            $formulir->jumlah_tanggungan =$request->tanggunganAnak; 
            $formulir->kepemilikan_rumah = $request->kepemilikanRumah;
            $formulir->form_submitted = "1";
            $formulir->verifikasi_pengajuan = "BelumFinal";
            $formulir->save();



        }else{
           
            $formulir = Formulir::findOrFail($id_form);
            $formulir->jumlah_tanggungan =$request->tanggunganAnak;
            $formulir->kepemilikan_rumah = $request->kepemilikanRumah;
            $formulir->form_submitted = "3";
            $formulir->verifikasi_pengajuan = "BelumFinal";
            $formulir->save();
            
        }


      
        $cekKendaraan = Kendaraan::where('formulir_id', '=', $id_form)->count();

        
        $merkMotor = $request->merkMotor;
        $tahunMotor = $request->tahunPembuatanMotor;
        $platMotor = $request->platNomorMotor;
        

            $length=count($platMotor);
            $array_motor=array();
            for($i=0;$i<$length;$i++){
                $array_motor[$i]['formulir_id']=$id_form;
                $array_motor[$i]['jenis_kendaraan']="Motor";
                $array_motor[$i]['plat_nomor']=$platMotor[$i];
                $array_motor[$i]['tahun_pembuatan']=$tahunMotor[$i];
                $array_motor[$i]['merk']=$merkMotor[$i];
                //you can add that another key and value here like $array3[$i]['image']='your image link';
            }

            $merkMobil = $request->merkMobil;
            $tahunMbil = $request->tahunPembuatanMobil;
            $platMobil = $request->platNomorMobil;
    
                $length=count($platMobil);
                $array_mobil=array();
                for($i=0;$i<$length;$i++){
                    $array_mobil[$i]['formulir_id']=$id_form;
                    $array_mobil[$i]['jenis_kendaraan']="Mobil";
                    $array_mobil[$i]['plat_nomor']=$platMobil[$i];
                    $array_mobil[$i]['tahun_pembuatan']=$tahunMbil[$i];
                    $array_mobil[$i]['merk']=$merkMobil[$i];
                    //you can add that another key and value here like $array3[$i]['image']='your image link';
                }
        
    
           if($cekKendaraan == null){
        
            Kendaraan::insert($array_motor);
            Kendaraan::insert($array_mobil);
    
           }else{
               Kendaraan::where('formulir_id', '=', $id_form)->delete();
               Kendaraan::insert($array_motor);
               Kendaraan::insert($array_mobil);
           }
    
    
           
           return redirect()->route('user.createPengajuanStepFour');
        

   
       

    }


    public function createStepFour(Request $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();


        if($get_form == null){
            return redirect()->route('user.page');
        }else{
            $getPenanggungBiaya = Orangtua::where('formulir_id', '=', $get_form->id)->whereState('jenis_orangtua', $get_form->penanggungbiaya)->first();
            $cek_form = $get_form->form_submitted;
            $orangtuas =  Orangtua::getStatesFor('jenis_orangtua');
           // $kendaraans =Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->with('kendaraan')->get();
    
            $motors = Kendaraan::where('formulir_id', '=', $get_form->id)->where('plat_nomor', '!=', null)->whereState('jenis_kendaraan', Motor::class)->get();
            $mobils = Kendaraan::where('formulir_id', '=', $get_form->id)->where('plat_nomor', '!=', null)->whereState('jenis_kendaraan', Mobil::class)->get();
           
    
            return view('user.formulir.createStepFour', compact('cek_form', 'get_form', 'getPenanggungBiaya', 'orangtuas', 'mobils', 'motors'));
        }

       

    }



    public function postCreateStepFour(Request $request){
        $this->validate($request, 
        [
            'verifikasi_pernyataan' => 'required',
            'isnot_menerima_beasiswa' => 'required',
            'jenis_orangtua' => 'required'
           
           
        ],
        $messages = 
        [
            'verifikasi_pernyataan.required' => "Centang persyaratan berikut untuk menyetujui persyaratan.",
            'isnot_menerima_beasiswa.required' => "Centang persyaratan berikut untuk menyetujui persyaratan.",
            'jenis_orangtua.required' => "Centang persyaratan berikut untuk yang mengisi tanda tangan.",
        ]);


        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
        
        $id_form = $get_form->id;

       
        if($get_form == null){

           

            $formulir = new Formulir();
            $formulir->penanggungbiaya =$request->jenis_orangtua; 
            //jika 1 maka tidak menerima besiswa, jika 2 maka menerima beasiswa
            $formulir->isnot_menerima_beasiswa = $request->isnot_menerima_beasiswa;
            $formulir->verifikasi_pernyataan_tanggungan = $request->verifikasi_pernyataan;
            $formulir->form_submitted = "1";
            $formulir->verifikasi_pengajuan = "BelumFinal";
            $formulir->save();



        }else{
           
            
            $formulir = Formulir::findOrFail($id_form);
            $formulir->penanggungbiaya =$request->jenis_orangtua; 

            //jika 1 maka tidak menerima besiswa, jika 2 maka menerima beasiswa
            $formulir->isnot_menerima_beasiswa = $request->isnot_menerima_beasiswa;
            $formulir->verifikasi_pernyataan_tanggungan = $request->verifikasi_pernyataan;
            $formulir->form_submitted = "4";
            $formulir->verifikasi_pengajuan = "BelumFinal";
            $formulir->save();


            
        }


           return redirect()->route('user.createPengajuanStepFive');

    }

    public function createStepFive(Request $request){
        $year = date('Y', strtotime(now()));
        $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();

        if($get_form == null){
            return redirect()->route('user.page');
        }else{
            $cek_form = $get_form->form_submitted;



            return view('user.formulir.createStepFive', compact('cek_form', 'get_form'));
        }
      

    }



    public function postCreateStepFive(Request $request){
        $this->validate($request, 
        [
            'verifikasi_pengajuan' => 'required',
          
        ],
        $messages = 
        [
            'verifikasi_pengajuan.required' => "Centang persyaratan berikut untuk menyetujui persyaratan dan finalisasi data.",
        
        ]);

        if($request->verifikasi_pengajuan = "1"){
            $year = date('Y', strtotime(now()));
            $get_form = Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
        
            $id_form = $get_form->id;
    
           
            
            if($get_form == null){
    
    
                $formulir = new Formulir();
                $formulir->form_submitted = "1";
                $formulir->save();
    
                return redirect()->route('user.createPengajuanStepOne');
    
            }else{
                $year = date('Y', strtotime(now()));
                $cek_form_submitted =  Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->where('form_submitted', '=', '4' )->first();

                if($cek_form_submitted != null ){
                    $formulir = Formulir::findOrFail($id_form);
                    $formulir->verifikasi_pengajuan = "Diajukan";
                    $formulir->form_submitted = "5";
                    $formulir->save();

                    $log_verifikasi = new Log_verifikasi();
                    $log_verifikasi->id_pendaftar = auth()->id();
                    $log_verifikasi->tanggal_verifikasi = now();
                    $log_verifikasi->formulir_id = $id_form;
                    $log_verifikasi->log_verifikasi = "Diajukan";
                    $log_verifikasi->save();

                    return redirect()->route('user.page');
                }else{
                    $year = date('Y', strtotime(now()));
                    $cek_form_submitted_edit =  Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->where('form_submitted', '=', '5' )->first();

                    if($cek_form_submitted_edit != null){
                        $formulir = Formulir::findOrFail($id_form);
                        $formulir->verifikasi_pengajuan = "Diajukan";
                        $formulir->form_submitted = "5";
                        $formulir->save();
    
                        $log_verifikasi = new Log_verifikasi();
                        $log_verifikasi->id_pendaftar = auth()->id();
                        $log_verifikasi->tanggal_verifikasi = now();
                        $log_verifikasi->formulir_id = $id_form;
                        $log_verifikasi->log_verifikasi = "Diajukan";
                        $log_verifikasi->save();
    
                        return redirect()->route('user.page');
                    }else{

                        $year = date('Y', strtotime(now()));
                        $status_form =  Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->first();
                        if($status_form->form_submitted == "0"){
                         return redirect()->route('user.createPengajuanStepOne');
                        }elseif($status_form->form_submitted == "1"){
                         return redirect()->route('user.createPengajuanStepTwo');
                        }elseif($status_form->form_submitted == "2"){
                         return redirect()->route('user.createPengajuanStepThree');
                        }elseif($status_form->form_submitted == "3"){
                         return redirect()->route('user.createPengajuanStepFour');
                        }elseif($status_form->form_submitted == "4"){
                         $formulir = Formulir::findOrFail($id_form);
                         $formulir->verifikasi_pengajuan = "Diajukan";
                         $formulir->form_submitted = "5";
                         $formulir->save();
     
                         $log_verifikasi = new Log_verifikasi();
                         $log_verifikasi->id_pendaftar = auth()->id();
                         $log_verifikasi->tanggal_verifikasi = now();
                         $log_verifikasi->formulir_id = $id_form;
                         $log_verifikasi->log_verifikasi = "Diajukan";
                         $log_verifikasi->save();
     
                         return redirect()->route('user.page');
     
                    }

                
                   }
        
                  
                }
               
              
    
                
            }
        }
       

      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function show(Formulir $formulir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulir $formulir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulir $formulir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulir  $formulir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulir $formulir)
    {
        //
    }

    public function destroyKendaraan($id)
    {
      Kendaraan::where('id', '=', $id)->delete();
      return  redirect()->route('user.createPengajuanStepThree');
    }


    public static function getNamaKelurahan($id)
    {
        $namaKelurahan = Kelurahan::where('kecamatan_id', '=', $id)->get();

        return $namaKelurahan;
    }
}
