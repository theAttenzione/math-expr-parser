<?php
declare(strict_types=1);

namespace MathExprParser\Operator;

/**
 * Arithmetic operator
 */
class Multiplication implements OperatorInterface
{
    /**
     * @inheritdoc
     */
    public function calculate(float $left, float $right): float
    {
        return $left * $right;
    }
}