<?php

namespace App\States\Rencana_kerja;

class Ditolak extends StatusVerifikasiState
{
    public static $name = "Ditolak";

    public function label(): string
    {
        return "Ditolak";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Ditolak</span>";
    }

    public function name(): string
    {
        return "Ditolak";
    }
}
