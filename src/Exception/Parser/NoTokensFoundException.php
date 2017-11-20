<?php
declare(strict_types=1);

namespace MathExprParser\Exception\Parser;

/**
 * Class NoTokensFoundException
 */
class NoTokensFoundException extends \RuntimeException implements ParserException
{
    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Could not tokenize string ' . $message, $code, $previous);
    }
}