<?php
declare(strict_types=1);

namespace MathExprParser\Service\Tokenizer;

use MathExprParser\ValueObject\Expression\Token\ExpressionToken;

/**
 * High priority out of parentheses
 */
class MultiplicationDivision extends AbstractTokenizer
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
        return false;
    }
}