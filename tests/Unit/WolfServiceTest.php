<?php

namespace Tests\Unit;

use App\Services\WolfService\Item;
use App\Services\WolfService\WolfService;
use PHPUnit\Framework\TestCase;

class WolfServiceTest extends TestCase
{
    public function test_item_quality_degrades_each_day(): void
    {
        $item = new Item('Usual Item', 10, 5);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(4, $serviceItems[0]->quality);
    }

    public function test_item_sell_in_degrades_each_day(): void
    {
        $item = new Item('Usual Item', 10, 5);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(9, $serviceItems[0]->sellIn);
    }

    public function test_item_quality_degrades_twice_as_fast_after_sell_in(): void
    {
        $item = new Item('Usual Item', 0, 6);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(4, $serviceItems[0]->quality);
    }

    public function test_item_quality_is_never_negative(): void
    {
        $item = new Item('Usual Item', 0, 1);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(0, $serviceItems[0]->quality);
    }

    public function test_item_quality_is_never_negative_after_sell_in_and_quality_is_zero(): void
    {
        $item = new Item('Usual Item', -1, 0);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(0, $serviceItems[0]->quality);
    }

    public function test_apple_air_pods_increases_the_older_it_gets(): void
    {
        $item = new Item('Apple AirPods', 10, 5);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(6, $serviceItems[0]->quality);
    }

    public function test_apple_air_pods_increases_the_older_it_gets_but_never_more_than_50(): void
    {
        $item = new Item('Apple AirPods', 10, 50);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(50, $serviceItems[0]->quality);
    }

    public function test_samsung_galaxy_s23_never_decrease_in_quality(): void
    {
        $item = new Item('Samsung Galaxy S23', 10, 50);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(50, $serviceItems[0]->quality);
    }

    public function test_samsung_galaxy_s23_never_decrease_in_quality_event_if_it_is_more_than_50(): void
    {
        $item = new Item('Samsung Galaxy S23', 10, 80);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(80, $serviceItems[0]->quality);
    }

    public function test_samsung_galaxy_s23_never_decrease_in_quality_even_after_sell_in(): void
    {
        $item = new Item('Samsung Galaxy S23', -1, 50);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(50, $serviceItems[0]->quality);
    }

    public function test_apple_ipad_air_increases_in_quality_by_2_if_there_are_10_days_or_less(): void
    {
        $item = new Item('Apple iPad Air', 10, 5);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(7, $serviceItems[0]->quality);
    }

    public function test_apple_ipad_air_increases_in_quality_by_3_if_there_are_5_days_or_less(): void
    {
        $item = new Item('Apple iPad Air', 5, 6);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(9, $serviceItems[0]->quality);
    }

    public function test_apple_ipad_air_never_increases_more_than_50(): void
    {
        $item = new Item('Apple iPad Air', 5, 50);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(50, $serviceItems[0]->quality);
    }

    public function test_apple_ipad_air_drops_to_zero_quality_after_concert(): void
    {
        $item = new Item('Apple iPad Air', 0, 50);

        $service = new WolfService([$item]);

        $service->updateQuality();
        $serviceItems = $service->getItems();
        $this->assertEquals(0, $serviceItems[0]->quality);
    }
}
