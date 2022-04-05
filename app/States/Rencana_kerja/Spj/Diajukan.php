<?php

namespace App\States\Rencana_kerja\Spj;

class Diajukan extends StatusSpjState
{
    public static $name = "Diajukan";

    public function label(): string
    {
        return "Relisasi Diajukan";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-warning'>Diajukan</span>";
    }

    public function name(): string
    {
        return "Realisasi Diajukan";
    }
}
