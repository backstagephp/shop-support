<?php

namespace Backstage\ShopContracts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Backstage\ShopContracts\ShopContracts
 */
class ShopContracts extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Backstage\ShopContracts\ShopContracts::class;
    }
}
