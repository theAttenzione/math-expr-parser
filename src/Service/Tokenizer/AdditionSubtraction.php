<?php
declare(strict_types=1);

namespace MathExprParser\Service\Tokenizer;

/**
 * Tokenizes a low priority operations ouf of parentheses
 */
class AdditionSubtraction extends AbstractTokenizer
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
        return false;
    }
}
