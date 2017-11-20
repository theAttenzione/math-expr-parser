<?php
declare(strict_types=1);

namespace MathExprParser\Service\Tokenizer;

use MathExprParser\ValueObject\Expression\Token\ExpressionToken;

/**
 * Class AbstractTokenizer
 */
abstract class AbstractTokenizer
{
    /**
     * Tokenizes the last matched pattern
     *
     * @param string $string string
     *
     * @return ExpressionToken
     */
    public function tokenize(string $string) : ? ExpressionToken
    {
        $split = preg_split(
            '|([' . preg_quote(implode('', $this->getOperators()), '|') . ']+)|',
            $string,
            -1,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_OFFSET_CAPTURE
        );

        $filteredOperators = array_filter($split, function ($value) {
            return in_array($value[0], $this->getOperators());
        });

        krsort($filteredOperators);

        foreach ($filteredOperators as $operator) {
            if ($this->isToBeEnclosedByParetheses() === $this->enclosedByParetheses($operator[1], $string)) {
                return new ExpressionToken(
                    $this->trimParetheses(substr($string, 0, $operator[1])),
                    $this->trimParetheses(substr($string, $operator[1] + 1)),
                    $operator[0]
                );
            }
        }

        return null;
    }

    /**
     * Operators to tokenize by
     *
     * @return array
     */
    abstract protected function getOperators() : array;

    /**
     * Whether expression enclosed by parentheses
     *
     * @return bool
     */
    abstract protected function isToBeEnclosedByParetheses() : bool;

    /**
     * Whether this string is enclosed by paretheses
     *
     * @param int    $position position
     * @param string $string   string
     *
     * @return bool
     */
    protected function enclosedByParetheses(int $position, string $string) : bool
    {
        $leftPart               = substr($string, 0, $position);
        $openingParethesisCount = substr_count($leftPart, '(');
        $closingParethesisCount = substr_count($leftPart, ')');

        return !($openingParethesisCount === $closingParethesisCount);
    }

    /**
     * Trims unneeded paretheses
     *
     * @param string $string string
     *
     * @return string
     */
    protected function trimParetheses(string $string) : string
    {
        $openingParethesisCount = substr_count($string, '(');
        $closingParethesisCount = substr_count($string, ')');

        if ($openingParethesisCount > $closingParethesisCount) {
            return ltrim($string, '(');
        }
        if ($openingParethesisCount < $closingParethesisCount) {
            return rtrim($string, ')');
        }

        return $string;
    }
}
