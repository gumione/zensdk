<?php
declare(strict_types=1);

namespace gumione\ZenSdk\Payments;

use gumione\ZenSdk\DTO\ZenTransactionDTO;
use gumione\ZenSdk\DTO\ZenCreateTransactionDTO;

interface PaymentInterface
{
    /**
     * Returns transaction by ID
     * 
     * @param string $transactionId Transaction ID
     * 
     * @return ZenTransactionDTO Transaction DTO
     */
    public function getTransaction(string $transactionId): ZenTransactionDTO;

    /**
     * Creates a new transaction
     * 
     * @param ZenCreateTransactionDTO $transactionDTO Transaction DTO
     * 
     * @return ZenTransactionDTO Created transaction DTO
     */
    public function createTransaction(ZenCreateTransactionDTO $transactionDTO): ZenTransactionDTO;
}