<?php

namespace Backstage\Shop\Support;

class CheckoutDriver
{
    /**
     * The registered driver classes.
     *
     * @var array<string, class-string<PaymentGateway>>
     */
    protected array $drivers = [];

    /**
     * Register a driver.
     *
     * @param  class-string<PaymentGateway>  $driverClass
     */
    public function setupDriver(string $driver, string $driverClass): static
    {
        $this->drivers[$driver] = $driverClass;

        return $this;
    }

    /**
     * Get all registered drivers.
     *
     * @return array<string, class-string<PaymentGateway>>
     */
    public function getDrivers(): array
    {
        return $this->drivers;
    }

    /**
     * Check if a driver is registered.
     */
    public function hasDriver(string $driver): bool
    {
        return isset($this->drivers[$driver]);
    }

    /**
     * Get a specific driver class.
     *
     * @return class-string<PaymentGateway>|null
     */
    public function getDriver(string $driver): ?string
    {
        return $this->drivers[$driver] ?? null;
    }
}
