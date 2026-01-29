<?php

namespace Backstage\Shop\Support;

use Spatie\LaravelPackageTools\Package;
use Backstage\Shop\Support\CheckoutDriver;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShopContractsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('shop-support');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(CheckoutDriver::class, fn () => new CheckoutDriver);
    }
}
