<?php

namespace App\Services\WolfService\Strategies;

use App\Services\WolfService\Item;
use App\Services\WolfService\Strategies\Contracts\UpdateItemStrategyContract;

class AirPodsItemStrategy implements UpdateItemStrategyContract
{
    public static function update(Item &$item): void
    {
        $item->quality = min(50, $item->quality + 1);
        $item->sellIn--;
    }
}
