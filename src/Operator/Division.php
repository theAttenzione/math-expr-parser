<?php
declare(strict_types=1);

namespace MathExprParser\Operator;

use MathExprParser\Exception\Parser\WrongOperandException;

/**
 * Arithmetic operator
 */
class Division implements OperatorInterface
{
    /**
     * @inheritdoc
     */
    public function calculate(float $left, float $right): float
    {
        if ($right == 0) {
            throw new WrongOperandException('Division by zero');
        }

        return $left / $right;
    }
}