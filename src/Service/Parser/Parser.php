<?php
declare(strict_types=1);

namespace MathExprParser\Service\Parser;

use MathExprParser\Exception\Parser\NoTokensFoundException;
use MathExprParser\Exception\Parser\ParserException;
use MathExprParser\Exception\Parser\UnsupportedOperatorException;
use MathExprParser\Operator\OperatorInterface;
use MathExprParser\Service\Tokenizer\TokenizerInterface;
use MathExprParser\ValueObject\Expression\ExpressionInterface;
use MathExprParser\ValueObject\Expression\SingleValue;
use MathExprParser\ValueObject\Expression\Subexpression;
use MathExprParser\ValueObject\Expression\Token\ExpressionToken;

/**
 * Class Parser
 */
class Parser
{
    /**
     * Tokenizers
     *
     * @var TokenizerInterface[]
     */
    private $tokenizers;

    /**
     * Operators
     *
     * @var \ArrayObject OperatorInterface []
     */
    private $operators;

    /**
     * Parser constructor
     *
     * @param array        $tokenizers tokenizers
     * @param \ArrayObject $operators  operators
     */
    public function __construct(array $tokenizers, \ArrayObject $operators)
    {
        $this->tokenizers = $tokenizers;
        $this->operators  = $operators;
    }

    /**
     * Parses an expression string
     *
     * @param string $expressionString expression string
     *
     * @return ExpressionInterface
     *
     * @throws ParserException
     */
    public function parse(string $expressionString) : ExpressionInterface
    {
        if (!$this->isTokenizingNeeded($expressionString)) {
            return $this->createSingleValue($expressionString);
        }

        $token = $this->getToken($expressionString);
        if (!$token) {
            throw new NoTokensFoundException($expressionString);
        }

        return $this->createSubexpression($token);
    }

    /**
     * Whether parsing needed
     *
     * @param string $expressionString expression string
     *
     * @return bool
     */
    private function isTokenizingNeeded(string $expressionString) : bool
    {
        return !is_numeric($expressionString);
    }

    /**
     * Returns tokens for given string
     *
     * @param string $expressionString expression string
     *
     * @return ?ExpressionToken
     */
    private function getToken(string $expressionString) : ? ExpressionToken
    {
        foreach ($this->tokenizers as $tokenizer) {
            $token = $tokenizer->tokenize($expressionString);
            if (!$token) {
                continue;
            }
            return $token;
        }

        return null;
    }

    /**
     * Creates SingleValue
     *
     * @param string $expressionString expression string
     *
     * @return SingleValue
     */
    private function createSingleValue(string $expressionString) : SingleValue
    {
        return new SingleValue((float) $expressionString);
    }

    /**
     * Creates a subexpression
     *
     * @param ExpressionToken $token token
     *
     * @return ExpressionInterface
     *
     * @throws ParserException
     */
    private function createSubexpression(ExpressionToken $token)
    {
        if (!$this->operators->offsetExists($token->getOperator())) {
            throw new UnsupportedOperatorException($token->getOperator());
        }

        return new Subexpression(
            $this->parse($token->getLeft()),
            $this->parse($token->getRight()),
            $this->operators->offsetGet($token->getOperator())
        );
    }
}
