<?php

namespace App\Models;

use App\Models\Orangtua;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatans";
    protected $guarded = [];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id');
    }

    public function orangtua()
    {
        return $this->hasMany(Orangtua::class, 'kecamatan_id');
    }

    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'kecamatan_id');
    }
}
