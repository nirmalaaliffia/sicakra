<?php

namespace App\States\Rencana_kerja\Spj;

use Spatie\ModelStates\State;

abstract class StatusSpjState extends State
{
    abstract public function label(): string;

    abstract public function name(): string;

    abstract public function badge(): string;

    // public static function config(): StateConfig
    // {
    //     return parent::config()
    //         ->default(BelumFinal::class)
    //         ->allowTransition(BelumFinal::class, Diajukan::class)
    //         ->allowTransition(BelumFinal::class, Dibatalkan::class)
    //         ->allowTransition(Diajukan::class, Disetujui::class)
    //         ->allowTransition(Diajukan::class, Ditolak::class)
    //         ->allowTransition(Diajukan::class, Dibatalkan::class)
    //     ;
    // }
}
