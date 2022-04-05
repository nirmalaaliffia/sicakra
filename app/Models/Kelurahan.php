<?php

namespace App\Models;

use App\Models\Orangtua;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function orangtua()
    {
        return $this->hasMany(Orangtua::class, 'kelurahan_id');
    }

    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'kelurahan_id');
    }

}
