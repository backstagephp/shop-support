<?php

namespace Backstage\Shop\Support\Facades;

use Backstage\Shop\Support\CheckoutDriver;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CheckoutDriver setupDriver(string $driver, string $driverClass)
 * @method static array getDrivers()
 * @method static bool hasDriver(string $driver)
 * @method static string|null getDriver(string $driver)
 *
 * @see \Backstage\Shop\Support\CheckoutDriver
 */
class AvailableCheckoutDrivers extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CheckoutDriver::class;
    }
}
