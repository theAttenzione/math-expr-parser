<?php
declare(strict_types=1);

namespace MathExprParser\ValueObject\Expression\Token;

/**
 * Class ExpressionToken
 */
class ExpressionToken
{
    /**
     * Left operand
     *
     * @var string
     */
    private $left;

    /**
     * Right operand
     *
     * @var string
     */
    private $right;

    /**
     * Operator
     *
     * @var string
     */
    private $operator;

    /**
     * ExpressionToken constructor
     *
     * @param string $left     left operand
     * @param string $right    right operand
     * @param string $operator operator
     */
    public function __construct(string $left, string $right, string $operator)
    {
        $this->left     = $left;
        $this->right    = $right;
        $this->operator = $operator;
    }

    /**
     * Return Left
     *
     * @return string
     */
    public function getLeft() : string
    {
        return $this->left;
    }

    /**
     * Return Right
     *
     * @return string
     */
    public function getRight() : string
    {
        return $this->right;
    }

    /**
     * Return Operator
     *
     * @return string
     */
    public function getOperator() : string
    {
        return $this->operator;
    }
}
