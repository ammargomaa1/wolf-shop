<?php

namespace App\Services\WolfService;

use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use Illuminate\Support\Facades\Http;

class ItemImporterService
{

    public function __construct(private ItemRepositoryInterface $repository) {}

    public function import(): void
    {
        $response = Http::withBasicAuth('username', 'password')
            ->get('https://api.restful-api.dev/objects');

        if ($response->failed()) {
            throw new \Exception('Failed to fetch data from the API.');
        }

        $itemsData = $response->json();
        $itemsToUpsert = [];

        foreach ($itemsData as $itemData) {
            $itemsToUpsert[] = $this->createItemFromData($itemData);
        }

        $this->repository->updateOrCreate($itemsToUpsert);
    }

    private function createItemFromData(array $itemData): Item
    {
        // there should be a default value here neither than hardcoded 0
        // The API has items with the same name but different data, since it's a task we will go around the naming
        $item = new Item(
            $itemData['name'] . $itemData['id'],
            !empty($itemData['sellIn']) ? $itemData['sellIn'] : 0,
            !empty($itemData['quality']) ? $itemData['quality'] : 0
        );

        if (!empty($itemData['imgUrl'])) {
            $item->setImgUrl($itemData['imgUrl']);
        }else{
            $item->setImgUrl('');
        }

        return $item;
    }
}
