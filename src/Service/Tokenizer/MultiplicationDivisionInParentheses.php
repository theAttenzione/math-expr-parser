<?php
declare(strict_types=1);

namespace MathExprParser\Service\Tokenizer;

use MathExprParser\ValueObject\Expression\Token\ExpressionToken;

/**
 * High priority within parentheses
 */
class MultiplicationDivisionInParentheses extends AbstractTokenizer
{
    /**
     * @inheritdoc
     */
    protected function getOperators() : array
    {
        return ['*', '/'];
    }

    /**
     * @inheritdoc
     */
    protected function isToBeEnclosedByParetheses() : bool
    {
        return true;
    }
}