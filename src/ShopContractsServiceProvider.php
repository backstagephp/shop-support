<?php

namespace Backstage\ShopContracts;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Backstage\ShopContracts\Commands\ShopContractsCommand;

class ShopContractsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('shop-contracts')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_shop_contracts_table')
            ->hasCommand(ShopContractsCommand::class);
    }
}
