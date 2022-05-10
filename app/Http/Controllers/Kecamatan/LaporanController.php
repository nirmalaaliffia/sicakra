<?php

namespace App\Http\Controllers\Kecamatan;

use App\Models\Opd;
use App\Models\spj;
use Illuminate\Http\Request;
use App\Models\Rencana_kerja;
use App\Http\Controllers\Controller;
use App\Models\Spj as ModelsSpj;
use App\States\Rencana_kerja\Disetujui;

class LaporanController extends Controller
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
        $forms = Rencana_kerja::where('user_id', '=', auth()->id())->whereState('status_verifikasi', Disetujui::class)->orderBy('waktu_mulai', 'DESC')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();

        if(count($forms) == 0){
          
            return view('kecamatan.laporan.daftarLaporan', compact('forms', 'opds'));
        }
     
        return view('kecamatan.laporan.daftarLaporan', compact('forms', 'opds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($spj)
    {
        $form = Rencana_kerja::where('user_id', '=', auth()->id())->where('id', '=', $spj)->first();
        $spjs = ModelsSpj::where('id_user', '=', auth()->id())->where('rencana_kerja_id', '=', $spj)->orderBy('created_at', 'DESC')->get();
        $opds =  Opd::orderBy('nama_skpd')->get();
     
        return view('kecamatan.laporan.daftarRealisasi', compact('form', 'opds', 'spjs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $file_pendukung=$request->file('file');
    
         
                $nama_file = $file_pendukung->getClientOriginalName();
                $fileName = pathinfo($nama_file, PATHINFO_FILENAME);
                $extension = $file_pendukung->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
    
                $path = $file_pendukung->storeAs('document', $fileName, 'public');
    
                ModelsSpj::create([
                    'bukti_pendukung' => $fileName,
                    'link_bukti' => '/storage/'.$path,
                    'status' => "BelumFinal",
                    'rencana_kerja_id' => $request->rencana_kerja_id,
                    'id_user' =>  auth()->id()
                   
                ]);


             
         
    
                return redirect()->route('kecamatan.laporanSpj.create', $request->rencana_kerja_id) ->with('success', 'Data Berhasil Diubah!');

        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function show(spj $spj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function edit(spj $spj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, spj $spj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $spj)
    {
        ModelsSpj::where('id', '=', $spj)->delete();
        return redirect()->route('kecamatan.laporanSpj.create', $request->rencana_kerja_id)->with('danger', 'Data Berhasil Dihapus!');


    }

    public function ajukan($id){

        $spj = ModelsSpj::where('rencana_kerja_id', '=', $id)->get();

        if(count($spj) != "0"){
            $rencana_kerja = Rencana_kerja::findOrFail($id);
            $rencana_kerja->status_spj = "Diajukan";
            $rencana_kerja->keterangan_tolak_spj = null;
            $rencana_kerja->save();


           
            foreach($spj as $laporan){
                $gantiStatus = ModelsSpj::findOrFail($laporan->id);
                $gantiStatus->status = "Diajukan";
                $gantiStatus->save();
            }
           



            return redirect()->route('kecamatan.laporanSpj')->with('success', 'Data Realisasi Berhasil Diajukan!');

        }else{
           return redirect()->route('kecamatan.laporanSpj.create', $id)->with('danger', 'Upload Realisasi Dahulu!');

        }     

    }


    public function ajukanBatal($id){

        $spj = ModelsSpj::where('rencana_kerja_id', '=', $id)->get();

        if(count($spj) != "0"){
            $rencana_kerja = Rencana_kerja::findOrFail($id);
            $rencana_kerja->status_spj = "BelumUpload";
            $rencana_kerja->save();

            return redirect()->route('kecamatan.laporanSpj')->with('success', 'Data Pengajuan Realisasi Dibatalkan!');

        }else{
           return redirect()->route('kecamatan.laporanSpj.create', $id)->with('danger', 'Upload Realisasi Dahulu!');

        }     

    }
}
