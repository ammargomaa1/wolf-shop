<?php

namespace App\Services\WolfService\Strategies;

use App\Services\WolfService\Item;
use App\Services\WolfService\Strategies\Contracts\UpdateItemStrategyContract;

class AppleIpadAirStrategy implements UpdateItemStrategyContract
{
    public static function update(Item &$item): void
    {
        $item->sellIn--;

        if ($item->sellIn <= 0) {
            $item->quality = 0;
            return;
        }
        $increaseBy = self::calculateQualityIncrease($item->sellIn);
        $item->quality =  min(50, $item->quality + $increaseBy);
    }

    private static function calculateQualityIncrease(int $sellIn): int
    {
        if ($sellIn <= 5) {
            return 3;
        } elseif ($sellIn <= 10) {
            return 2;
        } else {
            return 1;
        }
    }
}
