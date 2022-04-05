<?php

namespace App\States\Rencana_kerja\Spj;

class Ditolak extends StatusSpjState
{
    public static $name = "Ditolak";

    public function label(): string
    {
        return "Ditolak";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-success'>Disetujui</span>";
    }

    public function name(): string
    {
        return "Ditolak";
    }
}
