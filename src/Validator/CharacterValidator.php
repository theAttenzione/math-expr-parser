<?php
declare(strict_types=1);

namespace MathExprParser\Validator;

use MathExprParser\Exception\Validator\InvalidFormatException;

/**
 * Validates the string characters
 */
class CharacterValidator implements ValidatorInterface
{
    /**
     * Allowed symbols list
     *
     * @var string
     */
    private $allowedCharacters;

    /**
     * CharacterValidator constructor
     *
     * @param string $allowedCharacters as a string
     */
    public function __construct(string $allowedCharacters = '0-9+-*\/()')
    {
        $this->allowedCharacters = $allowedCharacters;
    }

    /**
     * @inheritdoc
     */
    public function validate(string $string) : void
    {
        if (preg_match('|[^' . $this->allowedCharacters . ']|', $string, $matches)) {
            throw new InvalidFormatException('Given expression contains wrong characters ' . $matches[0]);
        }
    }
}