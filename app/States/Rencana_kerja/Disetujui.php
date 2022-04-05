<?php

namespace App\States\Rencana_kerja;

class Disetujui extends StatusVerifikasiState
{
    public static $name = "Disetujui";

    public function label(): string
    {
        return "Disetujui";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Disetujui</span>";
    }

    public function name(): string
    {
        return "Disetujui";
    }
}
