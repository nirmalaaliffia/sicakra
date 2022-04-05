<?php

namespace App\States\Rencana_kerja;

class Dibatalkan extends StatusVerifikasiState
{
    public static $name = "Dibatalkan";

    public function label(): string
    {
        return "Dibatalkan";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Dibatalkan</span>";
    }

    public function name(): string
    {
        return "Dibatalkan";
    }
}
