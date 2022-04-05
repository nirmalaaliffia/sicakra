<?php

namespace App\Models;

use App\States\Kendaraan\JenisKendaraanState;
use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasStates;
  

    protected $table = "kendaraans";
    protected $dates = ['deleted_at'];


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'formulir_id', 'jenis_kendaraan', 'plat_nomor', 'tahun_pembuatan', 'merk'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'jenis_kendaraan' => JenisKendaraanState::class,
    ];


    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id');
    }
}
