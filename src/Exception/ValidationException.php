<?php
declare(strict_types=1);

namespace gumione\ZenSdk\Exception;

use Throwable;

/**
 * Class ValidationException
 *
 * Exception thrown when validation of some input data fails.
 */
class ValidationException extends \Exception
{
    /**
     * @var array An array of errors produced during validation.
     */
    private array $errors;

    /**
     * Constructor.
     *
     * @param array $errors An array of errors produced during validation.
     * @param int $code The exception code.
     * @param Throwable|null $previous The previous exception used for the exception chaining.
     */
    public function __construct(array $errors, $code = 0, Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct("Validation failed: " . json_encode($errors), $code, $previous);
    }

    /**
     * Returns an array of errors produced during validation.
     *
     * @return array An array of errors produced during validation.
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}