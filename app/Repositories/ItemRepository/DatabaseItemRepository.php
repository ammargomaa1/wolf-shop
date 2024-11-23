<?php 
namespace App\Repositories\ItemRepository;

use App\Models\Item as ModelsItem;
use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use App\Services\WolfService\Item;

class DatabaseItemRepository implements ItemRepositoryInterface
{
    /**
     * @param Item[] $items
     */
    public static function updateOrCreate(array $items): void{
        ModelsItem::upsert(
            self::mapItemsToArrays($items),
            ['name'],
            ['sell_in', 'quality']
        );
    }

    private static function mapItemsToArrays(array $items): array{
        return array_map(function($item){
            $itemData = [
                'name' => $item->name,
                'sell_in' => $item->sell_in,
                'quality' => $item->quality,
            ];

            if ($item->getImgUrl()) {
                $itemData['image_url'] = $item->getImgUrl();
            }

            return $itemData;
        }, $items);
    }
}