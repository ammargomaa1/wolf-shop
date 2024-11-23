<?php

declare(strict_types=1);

namespace App\Services\WolfService;

use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use App\Services\WolfService\Strategies\StrategyFactory;

final class WolfService
{
    private ItemRepositoryInterface $repository;
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {}

    public function updateQuality(): void
    {
        foreach ($this->items as &$item) {
            $strategy = StrategyFactory::getStrategy($item->name);
            $strategy->update($item);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setRepository(ItemRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    public function saveItems(): void
    {
        $this->repository->updateOrCreate($this->items);
    }
}
