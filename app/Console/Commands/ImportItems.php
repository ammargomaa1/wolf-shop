<?php

namespace App\Console\Commands;

use App\Repositories\ItemRepository\Contracts\ItemRepositoryInterface;
use App\Services\WolfService\ItemImporterService;
use Illuminate\Console\Command;

class ImportItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import Item to our inventory from API https://api.restful-api.dev/objects';

    public function __construct(private ItemImporterService $itemImporter)
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->itemImporter->import();
    }
}
