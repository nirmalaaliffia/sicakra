<?php

namespace App\Models;

use App\Models\User;
use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\States\Formulir\VerifikasiPengajuanState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\States\Formulir\KepemilikanRumah\KepemilikanRumahState;
use App\States\Orangtua\JenisOrangtuaState;

class Formulir extends Model
{
    use HasFactory; 
    use SoftDeletes;
    use HasStates;
  
    protected $table = "formulirs";
    protected $dates = ['deleted_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nama', 'alamat', 'rt', 'rw', 'penanggungbiaya', 'kelurahan_id', 'kecamatan_id', 'tempat_lahir', 'no_ktp', 'no_kk', 'asal_sekolah', 'nilai_rata_ujian_sekolah', 'nilai_ipk', 'nama_universitas', 'no_induk_mahasiswa', 'tahun_masuk_universitas' , 'jenjang', 'fakultas','jurusan','semester', 'disabilitas', 'kepemilikan_rumah', 'jumlah_tanggungan', 'verifikasi_pengajuan', 'form_submitted'
    ];

 
      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verifikasi_pengajuan' => VerifikasiPengajuanState::class,
        'penanggungbiaya' => JenisOrangTuaState::class,
        'kepemilikan_rumah' => KepemilikanRumahState::class,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orangtua()
    {
        return $this->hasMany(Orangtua::class, 'formulir_id');
    }

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'formulir_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
    
    public function jenjang()
    {
        return $this->belongsTo(jenjang::class, 'jenjang_id');
    }

    public function cacat()
    {
        return $this->belongsTo(Cacat::class, 'disabilitas');
    }


    public function log_verifikasi()
    {
        return $this->hasMany(Log_verifikasi::class, 'formulir_id');
    }


}
