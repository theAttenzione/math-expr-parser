<?php
declare(strict_types=1);

namespace MathExprParser\ValueObject\Expression;

/**
 * Expression Interface
 */
interface ExpressionInterface
{
    /**
     * Evaluates the expression
     *
     * @return float
     */
    public function evaluate() : float;
}