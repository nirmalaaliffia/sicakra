<?php

namespace App\States\Kendaraan;

class Motor extends JenisKendaraanState
{
    public static $name = "Motor";

    public function label(): string
    {
        return "Motor";
    }

    public function name(): string
    {
        return "Motor";
    }
}
