<?php
declare(strict_types=1);

namespace MathExprParser\Operator;

interface OperatorInterface
{
    public function calculate(float $left, float $right) : float;
}