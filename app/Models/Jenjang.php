<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = "jenjangs";
    protected $guarded = [];


    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'jenjang_id');
    }
}
