<?php

namespace App\States\Rencana_kerja\Spj;

class BelumFinal extends StatusSpjState
{
    public static $name = "BelumFinal";

    public function label(): string
    {
        return "Belum Final";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Belum Final</span>";
    }

    public function name(): string
    {
        return "Belum Final";
    }
}
