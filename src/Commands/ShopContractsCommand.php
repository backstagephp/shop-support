<?php

namespace Backstage\ShopContracts\Commands;

use Illuminate\Console\Command;

class ShopContractsCommand extends Command
{
    public $signature = 'shop-contracts';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
