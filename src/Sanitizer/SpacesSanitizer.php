<?php
declare(strict_types=1);

namespace MathExprParser\Sanitizer;

/**
 * Sanitizes input data
 */
class SpacesSanitizer
{
    /**
     * Sanitizes input string
     *
     * @param string $input input string
     *
     * @return string
     */
    public function sanitize(string $input) : string
    {
        return str_replace(' ', '', $input);
    }
}