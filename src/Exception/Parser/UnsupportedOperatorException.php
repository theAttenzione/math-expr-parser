<?php
declare(strict_types=1);

namespace MathExprParser\Exception\Parser;

/**
 * Class UnsupportedOperatorException
 */
class UnsupportedOperatorException extends \RuntimeException implements ParserException
{
    /**
     * @inheritdoc
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Operator is not supported ' . $message, $code, $previous);
    }
}