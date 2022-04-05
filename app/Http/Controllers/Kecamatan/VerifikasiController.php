<?php

namespace App\Http\Controllers\Kecamatan;

use App\Models\Opd;
use App\Models\Spj;
use Illuminate\Http\Request;
use App\Models\Rencana_kerja;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\States\Rencana_kerja\Ditolak;
use App\States\Rencana_kerja\Diajukan;
use App\States\Rencana_kerja\Disetujui;
use App\States\Rencana_kerja\Spj\Ditolak as StatesSpjDitolak;
use App\States\Rencana_kerja\Spj\Diajukan as StatesSpjDiajukan;
use App\States\Rencana_kerja\Spj\Disetujui as StatesSpjDisetujui;
use App\Notice;
use App\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TelegramRegister;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Rencana_kerja::where('id', '=', $id)->first();
        $spjs = Spj::where('rencana_kerja_id', '=', $id)->orderBy('created_at', 'DESC')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();
     
        return view('kecamatan.realisasi.laporan.daftarRealisasi', compact('form', 'opds', 'spjs'));
    }

    public function readOnly($id)
    {
        $form = Rencana_kerja::where('id', '=', $id)->first();
        $spjs = Spj::where('rencana_kerja_id', '=', $id)->orderBy('created_at', 'DESC')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();
     
        return view('kecamatan.realisasi.laporan.daftarRealisasiReadOnly', compact('form', 'opds', 'spjs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftarDiajukan(){
       
        // $forms =  Rencana_kerja::join('users', 'users.id', '=', 'rencana_kerjas.user_id')
        //         ->where('users.kecamatan_id', auth()->id())->whereState('status_verifikasi', Diajukan::class)->where('rencana_kerjas.deleted_at', '=', null)->get();
    
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Diajukan' and a.deleted_at is null"));
      
      return view('kecamatan.daftarDiajukan', compact('forms'));
    }

    public function daftarDisetujui(){
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Disetujui' and a.deleted_at is null"));
        return view('kecamatan.daftarDisetujui', compact('forms'));
    }

    public function daftarDitolak(){
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Ditolak' and a.deleted_at is null"));

        return view('kecamatan.daftarDitolak', compact('forms'));
    }


    public function realisasiDiajukan(){
       
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, status_spj, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Disetujui' and a.status_spj = 'Diajukan' and a.deleted_at is null"));

       
      
      return view('kecamatan.realisasi.daftarDiajukan', compact('forms'));
    }

    public function realisasiDisetujui(){
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, status_spj, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Disetujui' and a.status_spj = 'Disetujui' and a.deleted_at is null"));

       
        return view('kecamatan.realisasi.daftarDisetujui', compact('forms'));
    }

    public function realisasiDitolak(){
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, status_spj, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Disetujui' and a.status_spj = 'Ditolak' and a.deleted_at is null"));

        return view('kecamatan.realisasi.daftarDitolak', compact('forms'));
    }

    public function realisasiSemua(){
        $forms = DB::select(DB::raw("select a.id as id, u.id as user, o.nama_skpd, status_spj, nama_rencana, lokasi, waktu_mulai, waktu_selesai, penanggung_jawab, creator_id, tanggal_verifikasi, verificated_by, status_verifikasi, keterangan, jumlah_peserta,rundown_kegiatan, a.created_at, a.updated_at, a.deleted_at, kecamatan_id
        from rencana_kerjas a
        join users u on u.id = a.user_id
        left join opds o on o.id = a.penanggung_jawab
        where u.kecamatan_id= '".auth()->id()."' and a.status_verifikasi = 'Disetujui' and a.deleted_at is null"));

        return view('kecamatan.realisasi.daftarSemua', compact('forms'));
    }

    public function verifikasiSetuju($id){
   
        $rencana_kerja = Rencana_kerja::findOrFail($id);
        $rencana_kerja->status_verifikasi = "Disetujui";
        $rencana_kerja->save();
        
        return redirect()->route('kecamatan.rencanaKerja.diajukan')->with('success', 'Rencana Kerja Berhasil Disetujui!');

    }

    public function verifikasiTolak($id){
   
        $rencana_kerja = Rencana_kerja::findOrFail($id);
        $rencana_kerja->status_verifikasi = "Ditolak";
        $rencana_kerja->save();
        
        return redirect()->route('kecamatan.rencanaKerja.diajukan')->with('success', 'Rencana Kerja Berhasil Ditolak!');

    }


    public function verifikasiDitarik($id){
   
        $rencana_kerja = Rencana_kerja::findOrFail($id);
        $rencana_kerja->status_verifikasi = "Diajukan";
        $rencana_kerja->status_verifikasi = "Diajukan";
        $rencana_kerja->save();
        
        return redirect()->route('kecamatan.rencanaKerja.diajukan')->with('success', 'Rencana Kerja Berhasil Dibuka Kuncian!');

    }

    

    public function verifikasiRealisasiSetuju(Request $request, $id){
   
        $spj = Spj::findOrFail($id);
        $spj->status = "Disetujui";
        $spj->save();
        
        return redirect()->route('kecamatan.verifikasi.laporanSpj.show', $request->laporanSpj_id)->with('success', 'Rencana Kerja Berhasil Disetujui!');

    }

    public function verifikasiRealisasiTolak(Request $request, $id){
   
        $spj = Spj::findOrFail($id);
        $spj->status = "Ditolak";
        $spj->save();
        
        return redirect()->route('kecamatan.verifikasi.laporanSpj.show', $request->laporanSpj_id)->with('danger', 'Rencana Kerja Berhasil Ditolak!');

    }


    public function finalisasiRealisasiSetuju($id){
   
        $spj = Spj::where('rencana_kerja_id', '=', $id)->get();

        if(count($spj) != "0"){
            $rencana_kerja = Rencana_kerja::findOrFail($id);
            $rencana_kerja->status_spj = "Disetujui";
            $rencana_kerja->save();


           
            foreach($spj as $laporan){
                $gantiStatus = Spj::findOrFail($laporan->id);
                $gantiStatus->status = "Disetujui";
                $gantiStatus->save();
            }
           



            return redirect()->route('kecamatan.laporanSpj.diajukan')->with('success', 'Data Realisasi Berhasil Disetujui!');

        }else{
          
           return redirect()->route('kecamatan.verifikasi.laporanSpj.show', $id)->with('danger', 'Kelurahan wajib Upload Realisasi Dahulu!');

        }     
    }


    public function finalisasiRealisasiTolak(Request $request , $id){
   
        $spj = Spj::where('rencana_kerja_id', '=', $id)->get();

      
        if(count($spj) != "0"){
            $rencana_kerja = Rencana_kerja::findOrFail($request->rencanaKerja_id);
            $rencana_kerja->status_spj = "Ditolak";
            $rencana_kerja->keterangan_tolak_spj = $request->alasanDitolak ;
            $rencana_kerja->save();


           
            foreach($spj as $laporan){
                $gantiStatus = Spj::findOrFail($laporan->id);
                $gantiStatus->status = "Ditolak";
                $gantiStatus->save();
            }
           



            return redirect()->route('kecamatan.laporanSpj.diajukan')->with('danger', 'Data Realisasi Berhasil Ditolak!');

        }else{
          
           return redirect()->route('kecamatan.verifikasi.laporanSpj.show', $id)->with('danger', 'Kelurahan wajib Upload Realisasi Dahulu!');

        }     
    }


    public function bukaKuncianRealisasi($id){

        $spj = Spj::where('rencana_kerja_id', '=', $id)->get();

        if(count($spj) != "0"){
            $rencana_kerja = Rencana_kerja::findOrFail($id);
            $rencana_kerja->status_spj = "BelumUpload";
            $rencana_kerja->save();

            return redirect()->route('kecamatan.laporanSpj.diajukan')->with('success', 'Data Pengajuan Realisasi Dibatalkan!');

        }else{
            return redirect()->route('kecamatan.verifikasi.laporanSpj.show', $id)->with('danger', 'Kelurahan wajib Upload Realisasi Dahulu!');

        }   


   
    
    }
}
