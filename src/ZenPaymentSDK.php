<?php
/**
 * ZenPaymentsSDK is a client for Zen API
 * @link https://developer.zen.com/payments/api/
 */

declare(strict_types=1);

namespace gumione\ZenSdk\Payments;

use gumione\ZenSdk\Http\HttpClient;
use gumione\ZenSdk\DTO\ZenTransactionDTO;
use gumione\ZenSdk\DTO\ZenCreateTransactionDTO;
use gumione\ZenSdk\Validation\ZenTransactionValidator;

class ZenPaymentsSDK implements PaymentInterface {

    private HttpClient $client;
    private string $apiKey;

    /**
     * Constructor for ZenPaymentsSDK
     *
     * @param string $apiKey API Key for Zen API
     * @param string $baseUrl (Optional) Base URL for Zen API
     */
    public function __construct(string $apiKey, string $baseUrl = 'https://api.zen.com/v1/') {
        $this->apiKey = $apiKey;
        $this->client = new HttpClient([
            'base_uri' => $baseUrl,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => $this->apiKey
            ]
        ]);
    }

    /**
     * Get transaction by ID
     *
     * @param string $transactionId ID of transaction to retrieve
     * @return ZenTransactionDTO
     */
    public function getTransaction(string $transactionId): ZenTransactionDTO {

        $response = $this->client->get("transactions/{$transactionId}");

        $transactionData = json_decode($response->getBody(), true);
        $transactionDTO = new ZenTransactionDTO($transactionData);

        return $transactionDTO;
    }

    /**
     * Create transaction
     *
     * @param ZenCreateTransactionDTO $transactionDTO DTO representing transaction to be created
     * @return ZenTransactionDTO
     * @throws ValidationException
     */
    public function createTransaction(ZenCreateTransactionDTO $transactionDTO): ZenTransactionDTO {

        $validator = new ZenTransactionValidator();
        $validator->validate($transactionDTO);

        $response = $this->client->post('transactions', [
            'json' => $transactionDTO->toArray()
        ]);

        $transactionData = json_decode($response->getBody(), true);
        $transactionDTO = new ZenTransactionDTO($transactionData);

        return $transactionDTO;
    }

}