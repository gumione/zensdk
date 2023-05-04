<?php

declare(strict_types=1);

namespace gumione\ZenSdk\DTO;

class ZenCreateTransactionDTO {

    /** @var string */
    private $merchantTransactionId;

    /** @var string */
    private $amount;

    /** @var string */
    private $currency;

    /** @var string|null */
    private $description;

    /** @var string|null */
    private $customerIp;

    /** @var string|null */
    private $merchantPosId;

    /** @var string|null */
    private $notifyUrl;

    /** @var string|null */
    private $returnUrl;

    /** @var string|null */
    private $callbackUrl;

    /** @var array|null */
    private $additionalParams;

    /** @var string|null */
    private $paymentMethod;

    /** @var string */
    private $paymentChannel;

    /** @var array */
    private $buyer;

    /** @var array|null */
    private $shippingAddress;

    /** @var array */
    private $items;

    /** @var array */
    private $fraudFields;

    /** @var array */
    private $paymentSpecificData;

    /**
     * ZenCreateTransactionDTO constructor.
     *
     * @param string $merchantTransactionId The merchant transaction ID.
     * @param string $amount The transaction amount.
     * @param string $currency The transaction currency.
     * @param string $paymentChannel The payment channel.
     * @param array $customer The customer data.
     *      array{
     *          firstName: string,
     *          lastName: string,
     *          email: string,
     *          phone: string,
     *          ip: string
     *      }
     * @param array $fraudFields The fraud fields.
     *      array{
     *          fingerPrintId: string,
     *          referer: string
     *      }
     * @param array $paymentSpecificData The payment specific data.
     *      array{
     *          type: string,
     *          descriptor: string,
     *          card: array{
     *              number: string,
     *              expiryDate: string,
     *              cvv: string
     *          },
     *          skip3ds: bool,
     *          browserDetails: array{
     *              acceptHeader: string,
     *              colorDepth: string,
     *              javaEnabled: bool,
     *              lang: string,
     *              screenHeight: string,
     *              screenWidth: string,
     *              timezone: string,
     *              windowSize: string,
     *              userAgent: string
     *          }
     *      }
     * @param array $items The transaction items.
     *      array{
     *          code: string,
     *          category: string,
     *          name: string,
     *          price: string,
     *          quantity: int,
     *          lineAmountTotal: string
     *      }
     * @param array $buyer The buyer data.
     *      array{
     *          email: string,
     *          phone: string
     *      }
     * @param array|null $shippingAddress The shipping address.
     *      array{
     *          id: string,
     *          userId: string,
     *          firstName: string,
     *          lastName: string,
     *          country: string,
     *          street: string,
     *          city: string,
     *          countryState: string,
     *          province: string,
     *          buildingNumber: string,
     *          roomNumber: string,
     *          postcode: string,
     *          companyName: string,
     *          phone: string
     *      }|null
     * @param string|null $description The transaction description.
     * @param string|null $customerIp The customer IP address.
     * @param string|null $merchantPosId The merchant POS ID.
     * @param string|null $notifyUrl The notify URL.
     * @param string|null $returnUrl The return URL.
     * @param string|null $callbackUrl The callback URL.
     * @param array|null $additionalParams Additional parameters.
     * @param string|null $paymentMethod The payment method.
     *
     * @throws ValidationException If validation of the input data fails.
     */
    public function __construct(
            string $merchantTransactionId,
            string $amount,
            string $currency,
            string $paymentChannel,
            array $customer,
            array $fraudFields,
            array $paymentSpecificData,
            array $items,
            array $buyer,
            ?array $shippingAddress = null,
            ?string $description = null,
            ?string $customerIp = null,
            ?string $merchantPosId = null,
            ?string $notifyUrl = null,
            ?string $returnUrl = null,
            ?string $callbackUrl = null,
            ?array $additionalParams = null,
            ?string $paymentMethod = null
    ) {
        $this->merchantTransactionId = $merchantTransactionId;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->customer = $customer;
        $this->description = $description;
        $this->customerIp = $customerIp;
        $this->merchantPosId = $merchantPosId;
        $this->notifyUrl = $notifyUrl;
        $this->returnUrl = $returnUrl;
        $this->callbackUrl = $callbackUrl;
        $this->additionalParams = $additionalParams;
        $this->paymentMethod = $paymentMethod;
        $this->paymentChannel = $paymentChannel;
        $this->buyer = $buyer;
        $this->shippingAddress = $shippingAddress;
        $this->items = $items;
        $this->fraudFields = $fraudFields;
        $this->paymentSpecificData = $paymentSpecificData;

        $this->validate();
    }

    /**
     * @return string|null
     */
    public function getReturnUrl(): ?string {
        return $this->returnUrl;
    }

    /**
     * @return string|null
     */
    public function getCallbackUrl(): ?string {
        return $this->callbackUrl;
    }

    /**
     * @return array|null
     */
    public function getAdditionalParams(): ?array {
        return $this->additionalParams;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string {
        return $this->paymentMethod;
    }

    /**
     * @return string|null
     */
    public function getPaymentChannel(): ?string {
        return $this->paymentChannel;
    }

    /**
     * @return array|null
     */
    public function getBuyer(): ?array {
        return $this->buyer;
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
     * @return array
     */
    public function toArray(): array {
        $data = [
            'authorization' => ['amount' => $this->amount, 'currency' => $this->currency],
            'merchantTransactionId' => $this->merchantTransactionId,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'description' => $this->description,
            'customerIp' => $this->customerIp,
            'merchantPosId' => $this->merchantPosId,
            'notifyUrl' => $this->notifyUrl,
            'returnUrl' => $this->returnUrl,
            'callbackUrl' => $this->callbackUrl,
            'paymentMethod' => $this->paymentMethod,
            'paymentChannel' => $this->paymentChannel,
            'buyer' => $this->buyer,
            'shippingAddress' => $this->shippingAddress,
            'items' => $this->items,
            'verifyReturnmac' => $this->verifyReturnmac,
            'cashback' => $this->cashback,
        ];

        if ($this->additionalParams) {
            $data['additionalParams'] = $this->additionalParams;
        }

        return $data;
    }

}
