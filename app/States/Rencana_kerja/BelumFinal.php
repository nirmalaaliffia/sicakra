<?php

namespace App\States\Rencana_kerja;

class BelumFinal extends StatusVerifikasiState
{
    public static $name = "BelumFinal";

    public function label(): string
    {
        return "BelumFinal";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>BelumFinal</span>";
    }

    public function name(): string
    {
        return "BelumFinal";
    }
}
