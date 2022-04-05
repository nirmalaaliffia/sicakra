<?php

namespace App\States\Orangtua\StatusHidup;

class Hidup extends StatusHidupState
{
    public static $name = "Hidup";

    public function label(): string
    {
        return "Hidup";
    }

    public function name(): string
    {
        return "Hidup";
    }
}
