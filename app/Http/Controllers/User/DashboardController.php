<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Formulir;
use App\Models\Kelurahan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orangtua;
use App\States\Formulir\BelumFinal;
use Illuminate\Support\Facades\Auth;
use App\States\Formulir\Diajukan;
use App\States\Formulir\Disetujui;
use App\States\Formulir\Dibatalkan;
use App\States\Formulir\Ditolak;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        // $cek_form = User::whereHas('formulir', function ($query) {
        //     $query->where('user_id', '=', auth()->id())->where('verifikasi_pengajuan', '=', BelumFinal::class);
        // })->count();
        $year = date('Y', strtotime(now()));
 
        $cek_form= Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', BelumFinal::class)->whereYear('created_at', '=', $year)->get();

        
        if(count($cek_form) != "0"){
           // return "tidak ada form";
            //cek form ada form yang belum final arahkan ke formulir
            //redirect ke halaman form
            //$jenis_kendaraan = Kendaraan::getStatesFor('jenis_kendaraan');
          return redirect()->route('user.createPengajuanStepOne');
          //   return view('user.formulir.create', compact('jenis_kendaraan'));
            
        }else{
            //tidak ada form yang verifikasi pengajuannya belum final, bisa jadi diajukan, dibatalkan, ditolak
            $cek_form_diajukan= Formulir::where('user_id', '=', auth()->id())->whereState('verifikasi_pengajuan', Diajukan::class)->whereYear('created_at', '=', $year)->get();


            if(count($cek_form_diajukan) != "0"){
              //  return "form diajukan";

                
                //ada form yang diajukan
                return view('user.dashboard');
            }else{
                $cek_form_sisa= Formulir::where('user_id', '=', auth()->id())->whereNotState('verifikasi_pengajuan', BelumFinal::class)->whereNotState('verifikasi_pengajuan', Diajukan::class)->whereYear('created_at', '=', $year)->get();

              //  return $cek_form_sisa;
                //tidak ada form yang diajukan, maka bisa jadi belum mendaftar, dibatalkan atau ditolak maka arshkan ke form
              return redirect()->route('user.createPengajuanStepOne');
            }
          
        }
      }

      public function tampilKelurahan($id)
      {
          $kelurahan = Kelurahan::where('kecamatan_id', '=', $id)->orderBy('nama_kelurahan', 'ASC')->get();
  
          return $kelurahan;
      }

      public function tampilOrangTua($id)
      {
          $formulir = Formulir::where('user_id', '=', auth()->id())->first();

          $orangtua = Orangtua::where('formulir_id', '=',$formulir->id)->where('jenis_orangtua', '=', $id)->get();
  
          return $orangtua;
      }
   
}
