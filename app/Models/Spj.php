<?php

namespace App\Models;

use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\States\Rencana_kerja\Spj\StatusSpjState;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spj extends Model
{
    use HasFactory; 
    use SoftDeletes;
    use HasStates;

    protected $table = "spjs";
    protected $dates = ['deleted_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rencana_kerja_id', 'id_user', 'bukti_pendukung', 'link_bukti', 'status'
    ];


      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => StatusSpjState::class,

    ];

}
