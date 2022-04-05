<?php

namespace App\States\Rencana_kerja\Spj;

class Disetujui extends StatusSpjState
{
    public static $name = "Disetujui";

    public function label(): string
    {
        return "Disetujui";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-success'>Disetujui</span>";
    }

    public function name(): string
    {
        return "Disetujui";
    }
}
