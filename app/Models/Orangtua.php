<?php

namespace App\Models;

use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use App\States\Orangtua\JenisOrangtuaState;
use App\States\Orangtua\StatusHidup\StatusHidupState;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orangtua extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasStates;
    
    protected $table = "orangtuas";
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'formulir_id', 'jenis_orangtua', 'nama_orangtua', 'alamat', 'rt', 'rw', 'kelurahan_id', 'kecamatan_id', 'tempat_lahir', 'no_ktp', 'no_kk', 'no_telp', 'pekerjaan', 'penghasilan', 'disabilitas_orangtua', 'status_hidup'
    ];


      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'jenis_orangtua' => JenisOrangTuaState::class,
        'status_hidup' => StatusHidupState::class,
        
    ];

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function cacat()
    {
        return $this->belongsTo(Cacat::class, 'disabilitas_orangtua');
    }
}
