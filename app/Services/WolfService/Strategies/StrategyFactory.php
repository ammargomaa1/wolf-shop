<?php
namespace App\Services\WolfService\Strategies;

use App\Services\WolfService\Enums\ItemType;
use App\Services\WolfService\Strategies\Contracts\UpdateItemStrategyContract;

class StrategyFactory
{
    public static function getStrategy(string $itemName): UpdateItemStrategyContract
    {
        return match ($itemName) {
            ItemType::APPLE_AIR_PODS->value => new AirPodsItemStrategy(),
            ItemType::SAMSUNG_GALAXY_S23->value => new SamsungS23Strategy(),
            ItemType::APPLE_IPAD_AIR->value => new AppleIpadAirStrategy(),
            ItemType::XIAOMI_REDMI_NOTE_13->value => new XiaomiRedmiNote13Strategy(),
            default => new GenericItemStrategy(),
        };
    }
}