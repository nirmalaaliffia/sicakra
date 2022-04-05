<?php

namespace App\States\Orangtua\StatusHidup;

class Meninggal extends StatusHidupState
{
    public static $name = "Meninggal dunia";

    public function label(): string
    {
        return "Meninggal dunia";
    }

    public function name(): string
    {
        return "Meninggal dunia";
    }
}
