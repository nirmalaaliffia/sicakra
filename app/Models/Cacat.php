<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacat extends Model
{
    use HasFactory;

    protected $table = "cacats";
    protected $guarded = [];


    public function orangtua()
    {
        return $this->hasMany(Orangtua::class, 'kelurahan_id');
    }


    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'disabilitas');
    }
}
