<?php

namespace App\States\Kendaraan;

class Mobil extends JenisKendaraanState
{
    public static $name = "Mobil";

    public function label(): string
    {
        return "Mobil";
    }

    public function name(): string
    {
        return "Mobil";
    }
}
