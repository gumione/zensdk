<?php
declare(strict_types=1);

namespace gumione\ZenSdk\Validation;

use gumione\ZenSdk\Exception\ValidationException;

/**
 * Class ZenTransactionValidator
 * @package gumione\ZenSdk\Validation
 */
class ZenTransactionValidator {

    /**
     * Validates Zen Transaction data.
     *
     * @param array $data
     * @throws ValidationException
     */
    public static function validate(array $data): void {
        $requiredFields = [
            'merchantTransactionId',
            'paymentChannel',
            'amount',
            'currency',
            'customer',
            'fraudFields',
            'paymentSpecificData',
            'items'
        ];

        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $data)) {
                throw new ValidationException(sprintf('Field %s is required', $field));
            }
        }

        if (!is_string($data['merchantTransactionId'])) {
            throw new ValidationException('Field merchantTransactionId must be a string');
        }

        if (!is_string($data['amount'])) {
            throw new ValidationException('Amount must be a string');
        }

        if (!preg_match('/^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$/', $data['amount'])) {
            throw new ValidationException('Invalid amount format');
        }

        if (!is_string($data['currency'])) {
            throw new ValidationException('Field currency must be a string');
        }

        if (!is_array($data['customer'])) {
            throw new ValidationException('Field customer must be an array');
        }

        if (!is_array($data['fraudFields'])) {
            throw new ValidationException('Field fraudFields must be an array');
        }

        if (!is_array($data['paymentSpecificData'])) {
            throw new ValidationException('Field paymentSpecificData must be an array');
        }

        if (!is_array($data['items'])) {
            throw new ValidationException('Field items must be an array');
        }
    }

}