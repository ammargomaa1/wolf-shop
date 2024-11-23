<?php
namespace App\Repositories\ItemRepository\Contracts;

use App\Services\WolfService\Item;

interface ItemRepositoryInterface {
    /**
     * @param Item[] $items
     */
    public static function updateOrCreate(array $items): void;
}