<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;
    protected $table = "opds";
  
    protected $fillable = [
        'kode_skpd', 'nama_skpd'
    ];


    public function rencana_kerja()
    {
        return $this->hasMany(Rencana_kerja::class, 'penanggung_jawab');
    }

}
