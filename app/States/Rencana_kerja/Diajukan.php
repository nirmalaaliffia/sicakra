<?php

namespace App\States\Rencana_kerja;

class Diajukan extends StatusVerifikasiState
{
    public static $name = "Diajukan";

    public function label(): string
    {
        return "Diajukan";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Diajukan</span>";
    }

    public function name(): string
    {
        return "Diajukan";
    }
}
