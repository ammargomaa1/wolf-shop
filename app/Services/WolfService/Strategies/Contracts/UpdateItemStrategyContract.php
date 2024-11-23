<?php
namespace App\Services\WolfService\Strategies\Contracts;

use App\Services\WolfService\Item;

interface UpdateItemStrategyContract {
    public static function update(Item &$item): void;
}