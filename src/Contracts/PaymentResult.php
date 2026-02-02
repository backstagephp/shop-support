<?php

namespace Backstage\Shop\Support\Contracts;

interface PaymentResult
{
    /**
     * Get the payment ID from the gateway.
     */
    public function getId(): string;

    /**
     * Get the payment status.
     */
    public function getStatus(): string;

    /**
     * Check if the payment was successful.
     */
    public function isSuccessful(): bool;

    /**
     * Check if the payment is pending.
     */
    public function isPending(): bool;

    /**
     * Check if the payment failed.
     */
    public function isFailed(): bool;

    /**
     * Check if the payment was cancelled.
     */
    public function isCancelled(): bool;

    /**
     * Check if the payment requires a redirect.
     */
    public function requiresRedirect(): bool;

    /**
     * Get the redirect URL if required.
     */
    public function getRedirectUrl(): ?string;

    /**
     * Get the amount in cents.
     */
    public function getAmount(): int;

    /**
     * Get the currency code.
     */
    public function getCurrency(): string;

    /**
     * Get raw response data from the gateway.
     */
    public function getRawData(): array;

    /**
     * Get any error message if the payment failed.
     */
    public function getErrorMessage(): ?string;
}
