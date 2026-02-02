<?php

namespace Backstage\Shop\Support\Contracts;

use Illuminate\Database\Eloquent\Model;

interface PaymentGateway
{
    /**
     * Get the gateway identifier.
     */
    public function getName(): string;

    /**
     * Create a payment for an order.
     *
     * @param  \Backstage\Shop\Models\Order  $order
     */
    public function createPayment(Model $order, array $options = []): PaymentResult;

    /**
     * Retrieve payment details by payment ID.
     */
    public function getPayment(string $paymentId): ?PaymentResult;

    /**
     * Refund a payment (full or partial).
     */
    public function refundPayment(string $paymentId, ?int $amount = null): PaymentResult;

    /**
     * Create a customer in the payment gateway.
     *
     * @param  \Backstage\Shop\Models\Customer  $customer
     */
    public function createCustomer(Model $customer): string;

    /**
     * Get a customer from the payment gateway.
     */
    public function getCustomer(string $gatewayCustomerId): ?array;

    /**
     * Update a customer in the payment gateway.
     */
    public function updateCustomer(string $gatewayCustomerId, array $data): bool;

    /**
     * Delete a customer from the payment gateway.
     */
    public function deleteCustomer(string $gatewayCustomerId): bool;

    /**
     * Handle incoming webhook from the payment gateway.
     */
    public function handleWebhook(array $payload): void;

    /**
     * Verify a webhook signature.
     */
    public function verifyWebhookSignature(string $payload, string $signature): bool;

    /**
     * Get the redirect URL for a payment.
     */
    public function getPaymentUrl(string $paymentId): ?string;

    /**
     * Check if the gateway supports a specific feature.
     */
    public function supports(string $feature): bool;

    /**
     * Get available payment methods for this gateway.
     */
    public function getAvailablePaymentMethods(): array;

    /**
     * Create a product in the payment gateway.
     *
     * @param  \Backstage\Shop\Models\Product  $product
     */
    public function createProduct(Model $product): string;

    /**
     * Get a product from the payment gateway.
     */
    public function getProduct(string $gatewayProductId): ?array;

    /**
     * Update a product in the payment gateway.
     *
     * @param  \Backstage\Shop\Models\Product  $product
     */
    public function updateProduct(string $gatewayProductId, Model $product): bool;

    /**
     * Delete/archive a product in the payment gateway.
     */
    public function deleteProduct(string $gatewayProductId): bool;

    /**
     * Sync a product to the payment gateway (create or update).
     *
     * @param  \Backstage\Shop\Models\Product  $product
     */
    public function syncProduct(Model $product): string;

    /**
     * Create a price for a product in the payment gateway.
     *
     * @param  \Backstage\Shop\Models\Product  $product
     */
    public function createPrice(Model $product, int $amount, string $currency, array $options = []): string;

    /**
     * Get a price from the payment gateway.
     */
    public function getPrice(string $gatewayPriceId): ?array;

    /**
     * Update a price in the payment gateway.
     */
    public function updatePrice(string $gatewayPriceId, array $data): bool;

    /**
     * Archive/deactivate a price in the payment gateway.
     */
    public function archivePrice(string $gatewayPriceId): bool;

    /**
     * Sync a price to the payment gateway (create or update).
     *
     * @param  \Backstage\Shop\Models\Product  $product
     */
    public function syncPrice(Model $product, int $amount, string $currency, array $options = []): string;

    /**
     * List all prices for a product.
     */
    public function listPrices(string $gatewayProductId): array;
}
