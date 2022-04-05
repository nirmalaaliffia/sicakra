<?php

namespace App\States\Orangtua;

use Spatie\ModelStates\State;

abstract class JenisOrangtuaState extends State
{
    abstract public function label(): string;

    abstract public function name(): string;

}
