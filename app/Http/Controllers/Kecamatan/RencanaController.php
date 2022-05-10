<?php

namespace App\Http\Controllers\Kecamatan;

use DateTime;
use App\Models\Opd;
use Illuminate\Http\Request;
use App\Models\Rencana_kerja;
use App\Http\Controllers\Controller;
use App\States\Rencana_kerja\Ditolak;
use App\States\Rencana_kerja\Diajukan;
use App\States\Rencana_kerja\Disetujui;

class RencanaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Rencana_kerja::where('user_id', '=', auth()->id())->orderBy('waktu_mulai', 'ASC')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();
     
        return view('kecamatan.rencanakerja.indexRencanaKerja', compact('forms', 'opds'));
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
        $waktuMulai = DateTime::createFromFormat('d/m/Y H:i', $request->waktu_mulai);
        $newDateMulai = $waktuMulai->format('Y-m-d H:i');

        $waktuSelesai = DateTime::createFromFormat('d/m/Y H:i', $request->waktu_selesai);
        $newDateSelesai = $waktuSelesai->format('Y-m-d H:i');

            $rencana_kerja = new rencana_kerja();
            $rencana_kerja->user_id = auth()->id();
            $rencana_kerja->nama_rencana =  $request->nama_rencana;
            $rencana_kerja->lokasi = $request->lokasi;
            $rencana_kerja->waktu_mulai = $newDateMulai;
            $rencana_kerja->waktu_selesai = $newDateSelesai;
            $rencana_kerja->penanggung_jawab = $request->penanggung_jawab;
            $rencana_kerja->creator_id = auth()->id();
            $rencana_kerja->status_verifikasi = "Diajukan";
            $rencana_kerja->rundown_kegiatan = $request->rundown;
            $rencana_kerja->jumlah_peserta = $request->peserta;
            $rencana_kerja->status_spj = "BelumUpload";
            $rencana_kerja->save();

            return redirect()->route('kecamatan.rencanaKerja.daftar') ->with('success', 'Data Berhasil Ditambahkan!');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rencana_kerja  $rencana_kerja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forms = Rencana_kerja::where('id', '=', $id)->where('user_id', '=', auth()->id())->with('opd')->get();

        return $forms;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rencana_kerja  $rencana_kerja
     * @return \Illuminate\Http\Response
     */
    public function edit($rencana_kerja)
    {
        $forms = Rencana_kerja::where('id', '=', $rencana_kerja)->where('user_id', '=', auth()->id())->with('opd')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();
        return view('kecamatan.rencanakerja.edit', compact('forms', 'opds'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rencana_kerja  $rencana_kerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $waktuMulai = DateTime::createFromFormat('d/m/Y H:i', $request->waktu_mulai);
        $newDateMulai = $waktuMulai->format('Y-m-d H:i');

        $waktuSelesai = DateTime::createFromFormat('d/m/Y H:i', $request->waktu_selesai);
        $newDateSelesai = $waktuSelesai->format('Y-m-d H:i');

        $rencana_kerja = Rencana_kerja::findOrFail($id);
        $rencana_kerja->nama_rencana = $request->nama_rencana;
        $rencana_kerja->lokasi = $request->lokasi;
        $rencana_kerja->waktu_mulai = $newDateMulai;
        $rencana_kerja->waktu_selesai = $newDateSelesai;
        $rencana_kerja->penanggung_jawab = $request->penanggung_jawab;
        $rencana_kerja->rundown_kegiatan = $request->rundown;
        $rencana_kerja->jumlah_peserta = $request->peserta;
        $rencana_kerja->status_verifikasi = "Diajukan";
        $rencana_kerja->save();

        return redirect()->route('kecamatan.rencana.daftar') ->with('success', 'Data Berhasil Diubah!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rencana_kerja  $rencana_kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencana_kerja $rencana_kerja)
    {
        //
    }

    public function daftarDiajukan(){
        $forms = Rencana_kerja::where('user_id', '=', auth()->id())->whereState('status_verifikasi', Diajukan::class)->get();
    
        return view('kecamatan.rencanakerja.daftar.daftarDiajukan', compact('forms'));
    }

    public function daftarDisetujui(){
        $forms = Rencana_kerja::where('user_id', '=', auth()->id())->whereState('status_verifikasi', Disetujui::class)->get();
    
        return view('kecamatan.rencanakerja.daftar.daftarDisetujui', compact('forms'));
    }

    public function daftarDitolak(){
        $forms = Rencana_kerja::where('user_id', '=', auth()->id())->whereState('status_verifikasi', Ditolak::class)->get();
    
        return view('kecamatan.rencanakerja.daftar.daftarDitolak', compact('forms'));
    }
}
