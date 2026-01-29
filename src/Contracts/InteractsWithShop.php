<?php

namespace Backstage\Shop\Support\Contracts;

interface InteractsWithShop
{
    public function getProductModel(): string;

    public function setProductModel(string $model): void;

    public function usesDefaultProductModel(): bool;
}
