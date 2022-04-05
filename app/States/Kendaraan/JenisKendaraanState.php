<?php

namespace App\States\Kendaraan;

use Spatie\ModelStates\State;

abstract class JenisKendaraanState extends State
{
    abstract public function label(): string;

    abstract public function name(): string;

}
