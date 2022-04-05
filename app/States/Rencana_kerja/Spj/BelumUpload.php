<?php

namespace App\States\Rencana_kerja\Spj;

class BelumUpload extends StatusSpjState
{
    public static $name = "BelumUpload";

    public function label(): string
    {
        return "Belum Upload";
    }

    public function badge(): string
    {
        return "<span class='badge badge-pill badge-danger'>Belum Upload</span>";
    }

    public function name(): string
    {
        return "Belum Upload";
    }
}
