<?php

declare(strict_types=1);

namespace App\Services\WolfService;

use App\Services\WolfService\Strategies\StrategyFactory;

final class WolfService
{
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
}
