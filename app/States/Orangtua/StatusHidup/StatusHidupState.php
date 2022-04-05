<?php

namespace App\States\Orangtua\StatusHidup;

use Spatie\ModelStates\State;

abstract class StatusHidupState extends State
{
    abstract public function label(): string;

    abstract public function name(): string;

}