<?php
declare(strict_types=1);

namespace MathExprParser\ValueObject\Expression;

/**
 * Class SingleValue
 */
class SingleValue implements ExpressionInterface
{
    /**
     * Value
     *
     * @var float
     */
    private $value;

    /**
     * SingleValue constructor
     *
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function evaluate(): float
    {
        return $this->value;
    }
}