<?php
declare(strict_types=1);

namespace MathExprParser\ValueObject\Expression;

use MathExprParser\Operator\OperatorInterface;

/**
 * Class Subexpression
 */
class Subexpression implements ExpressionInterface
{
    /**
     * Left operand
     *
     * @var ExpressionInterface
     */
    private $left;

    /**
     * Right operand
     *
     * @var ExpressionInterface
     */
    private $right;

    /**
     * Operator
     *
     * @var OperatorInterface
     */
    private $operator;

    /**
     * Subexpression constructor
     *
     * @param ExpressionInterface $left
     * @param ExpressionInterface $right
     * @param OperatorInterface   $operator
     */
    public function __construct(ExpressionInterface $left, ExpressionInterface $right, OperatorInterface $operator)
    {
        $this->left     = $left;
        $this->right    = $right;
        $this->operator = $operator;
    }

    public function evaluate(): float
    {
        return $this->operator->calculate($this->left->evaluate(), $this->right->evaluate());
    }
}