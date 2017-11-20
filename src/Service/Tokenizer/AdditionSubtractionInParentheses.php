<?php
declare(strict_types=1);

namespace MathExprParser\Service\Tokenizer;

use MathExprParser\ValueObject\Expression\Token\ExpressionToken;

/**
 * Tokenizes a low priority operations within parentheses
 */
class AdditionSubtractionInParentheses extends AbstractTokenizer
{
    /**
     * @inheritdoc
     */
    protected function getOperators() : array
    {
        return ['+', '-'];
    }

    /**
     * @inheritdoc
     */
    protected function isToBeEnclosedByParetheses() : bool
    {
        return true;
    }
}