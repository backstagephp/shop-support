<?php

namespace Backstage\Shop\Support\Gateways;

use Backstage\Shop\Checkout\PaymentResult;
use Backstage\Shop\Support\Contracts\PaymentGateway;
use Backstage\Shop\Support\Contracts\PaymentResult as PaymentResultContract;
use Backstage\Shop\Models\Customer;
use Backstage\Shop\Models\Order;
use Backstage\Shop\Models\Product;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractGateway implements PaymentGateway
{
    protected array $config;

    protected array $supportedFeatures = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    abstract public function getName(): string;

    abstract public function createPayment(Model $order, array $options = []): PaymentResultContract;

    abstract public function getPayment(string $paymentId): ?PaymentResultContract;

    abstract public function refundPayment(string $paymentId, ?int $amount = null): PaymentResultContract;

    abstract public function createCustomer(Model $customer): string;

    abstract public function getCustomer(string $gatewayCustomerId): ?array;

    abstract public function updateCustomer(string $gatewayCustomerId, array $data): bool;

    abstract public function deleteCustomer(string $gatewayCustomerId): bool;

    abstract public function handleWebhook(array $payload): void;

    abstract public function verifyWebhookSignature(string $payload, string $signature): bool;

    abstract public function getPaymentUrl(string $paymentId): ?string;

    abstract public function getAvailablePaymentMethods(): array;

    abstract public function createProduct(Model $product): string;

    abstract public function getProduct(string $gatewayProductId): ?array;

    abstract public function updateProduct(string $gatewayProductId, Model $product): bool;

    abstract public function deleteProduct(string $gatewayProductId): bool;

    abstract public function syncProduct(Model $product): string;

    abstract public function createPrice(Model $product, int $amount, string $currency, array $options = []): string;

    abstract public function getPrice(string $gatewayPriceId): ?array;

    abstract public function updatePrice(string $gatewayPriceId, array $data): bool;

    abstract public function archivePrice(string $gatewayPriceId): bool;

    abstract public function syncPrice(Model $product, int $amount, string $currency, array $options = []): string;

    abstract public function listPrices(string $gatewayProductId): array;

    public function supports(string $feature): bool
    {
        return in_array($feature, $this->supportedFeatures);
    }

    protected function getConfig(string $key, mixed $default = null): mixed
    {
        return $this->config[$key] ?? $default;
    }

    protected function createResult(
        string $id,
        string $status,
        int $amount,
        string $currency,
        array $rawData = [],
        ?string $redirectUrl = null,
        ?string $errorMessage = null,
    ): PaymentResultContract {
        return new PaymentResult(
            id: $id,
            status: $status,
            amount: $amount,
            currency: $currency,
            rawData: $rawData,
            redirectUrl: $redirectUrl,
            errorMessage: $errorMessage,
        );
    }
}
