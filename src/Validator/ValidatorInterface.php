<?php
declare(strict_types=1);

namespace MathExprParser\Validator;

use MathExprParser\Exception\Validator\InvalidFormatException;

/**
 * Interface ValidatorInterface
 */
interface ValidatorInterface
{
    /**
     * Validates a string
     *
     * @param string $string string to be validated
     *
     * @return void
     *
     * @throws InvalidFormatException
     */
    public function validate(string $string) : void;
}