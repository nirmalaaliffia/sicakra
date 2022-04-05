<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log_verifikasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $guarded = [];
    protected $table = "log_verifikasis";
    protected $dates = ['deleted_at'];

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id');
    }
}
