<?php

namespace App\Services\WolfService\Strategies;

use App\Services\WolfService\Item;
use App\Services\WolfService\Strategies\Contracts\UpdateItemStrategyContract;

class XiaomiRedmiNote13Strategy implements UpdateItemStrategyContract
{
    public static function update(Item &$item): void
    {
        $item->sellIn = 9;
        if ($item->quality != 0) {
            $item->quality = 48;
        }
    }
}
