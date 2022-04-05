<?php

namespace App\Models;

use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\States\Rencana_kerja\Spj\StatusSpjState;
use App\States\Rencana_kerja\StatusVerifikasiState;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rencana_kerja extends Model
{
    use HasFactory; 
    use SoftDeletes;
    use HasStates;
  
    protected $table = "rencana_kerjas";
    protected $dates = ['deleted_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nama_rencana', 'lokasi', 'waktu_mulai', 'waktu_selesai', 'penanggung_jawab', 'creator_id', 'tanggal_verifikasi', 'verificated_by', 'status_verifikasi', 'keterangan', 'jumlah_peserta', 'rundown_kegiatan', 'status_spj'
    ];

 
      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status_verifikasi' => StatusVerifikasiState::class,
        'status_spj' => StatusSpjState::class,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'penanggung_jawab');
    }

}
