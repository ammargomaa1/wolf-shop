<?php

namespace App\Services\WolfService\Strategies;

use App\Services\WolfService\Item;
use App\Services\WolfService\Strategies\Contracts\UpdateItemStrategyContract;

class GenericItemStrategy implements UpdateItemStrategyContract
{
    public static function update(Item &$item): void
    {
        $item->quality--;
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality--;
        }

        $item->quality = max(0, $item->quality);
    }
}
