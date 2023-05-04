<?php

declare(strict_types=1);

namespace gumione\ZenSdk\DTO;

/**
 * Class ZenTransactionDTO
 * @package gumione\ZenSdk\DTO
 */
class ZenTransactionDTO {

    private string $id;
    private string $merchantTransactionId;
    private string $amount;
    private string $currency;
    private string $createdAt;
    private string $modifiedAt;
    private string $type;
    private string $status;
    private string $paymentChannel;
    private ?array $shippingAddress;
    private ?array $items;
    private ?string $verifyReturnmac;
    private ?array $cashback;
    private ?array $source;
    private ?array $fraudFields;
    private ?string $rejectCode;
    private ?string $rejectReason;
    private ?array $refunds;
    private ?array $meta;
    private ?array $customer;

    /**
     * ZenTransactionDTO constructor.
     * @param string $id The Zen Transaction ID.
     * @param string $merchantTransactionId The Merchant Transaction ID.
     * @param string $amount The transaction amount.
     * @param string $currency The transaction currency.
     * @param string $createdAt The transaction creation datetime.
     * @param string $modifiedAt The transaction modification datetime.
     * @param string $type The transaction type.
     * @param string $status The transaction status.
     * @param string $paymentChannel The payment channel.
     * @param array|null $shippingAddress The shipping address.
     * @param array|null $items The transaction items.
     * @param string|null $verifyReturnmac The verify returnmac string.
     * @param array|null $cashback The cashback information.
     * @param array|null $source The source information.
     * @param array|null $fraudFields The fraud fields.
     * @param string|null $rejectCode The reject code.
     * @param string|null $rejectReason The reject reason.
     * @param array|null $refunds The refunds data.
     * @param array|null $meta The meta data.
     * @param array|null $customer The customer data.
     */
    public function __construct(
            string $id,
            string $merchantTransactionId,
            string $amount,
            string $currency,
            string $createdAt,
            string $modifiedAt,
            string $type,
            string $status,
            string $paymentChannel,
            ?array $shippingAddress = null,
            ?array $items = null,
            ?string $verifyReturnmac = null,
            ?array $cashback = null,
            ?array $source = null,
            ?array $fraudFields = null,
            ?string $rejectCode = null,
            ?string $rejectReason = null,
            ?array $refunds = null,
            ?array $meta = null,
            ?array $customer = null
    ) {
        $this->id = $id;
        $this->merchantTransactionId = $merchantTransactionId;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->createdAt = $createdAt;
        $this->modifiedAt = $modifiedAt;
        $this->type = $type;
        $this->status = $status;
        $this->paymentChannel = $paymentChannel;
        $this->shippingAddress = $shippingAddress;
        $this->items = $items;
        $this->verifyReturnmac = $verifyReturnmac;
        $this->cashback = $cashback;
        $this->source = $source;
        $this->fraudFields = $fraudFields;
        $this->rejectCode = $rejectCode;
        $this->rejectReason = $rejectReason;
        $this->refunds = $refunds;
        $this->meta = $meta;
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMerchantTransactionId(): string {
        return $this->merchantTransactionId;
    }

    /**
     * @return string
     */
    public function getAmount(): string {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getModifiedAt(): string {
        return $this->modifiedAt;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPaymentChannel(): string {
        return $this->paymentChannel;
    }

    /**
     * @return array|null
     */
    public function getShippingAddress(): ?array {
        return $this->shippingAddress;
    }

    /**
     * @return array|null
     */
    public function getItems(): ?array {
        return $this->items;
    }

    /**
     * @return string|null
     */
    public function getVerifyReturnmac(): ?string {
        return $this->verifyReturnmac;
    }

    /**
     * @return array|null
     */
    public function getCashback(): ?array {
        return $this->cashback;
    }

    /**
     * @return array|null
     */
    public function getSource(): ?array {
        return $this->source;
    }

    /**
     * @return array|null
     */
    public function getFraudFields(): ?array {
        return $this->fraudFields;
    }

    /**
     * @return string|null
     */
    public function getRejectCode(): ?string {
        return $this->rejectCode;
    }

    /**
     * @return string|null
     */
    public function getRejectReason(): ?string {
        return $this->rejectReason;
    }

    /**
     * @return array|null
     */
    public function getRefunds(): ?array {
        return $this->refunds;
    }

    /**
     * @return array|null
     */
    public function getMeta(): ?array {
        return $this->meta;
    }

    /**
     * @return array|null
     */
    public function getCustomer(): ?array {
        return $this->customer;
    }

    /**
     * Get the DTO data as an associative array.
     *
     * @return array An associative array of the DTO data.
     */
    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'merchantTransactionId' => $this->getMerchantTransactionId(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'createdAt' => $this->getCreatedAt(),
            'modifiedAt' => $this->getModifiedAt(),
            'type' => $this->getType(),
            'status' => $this->getStatus(),
            'paymentChannel' => $this->getPaymentChannel(),
            'shippingAddress' => $this->getShippingAddress(),
            'items' => $this->getItems(),
            'verifyReturnmac' => $this->getVerifyReturnmac(),
            'cashback' => $this->getCashback(),
            'source' => $this->getSource(),
            'fraudFields' => $this->getFraudFields(),
            'rejectCode' => $this->getRejectCode(),
            'rejectReason' => $this->getRejectReason(),
            'refunds' => $this->getRefunds(),
            'meta' => $this->getMeta(),
            'customer' => $this->getCustomer(),
        ];
    }

}
