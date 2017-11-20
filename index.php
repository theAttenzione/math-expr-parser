<?php
declare(strict_types=1);

require __DIR__ . DIRECTORY_SEPARATOR . '_autoload.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'container.php';

if (empty($_SERVER['argv'][1])) {
    echo "You must provide an expression as the only argument";
    exit("\r\n");
}

/**
 * @var MathExprParser\Sanitizer\SpacesSanitizer    $sanitizer
 * @var MathExprParser\Validator\ValidatorInterface $validator
 * @var \MathExprParser\Service\Parser\Parser       $parser
 */

$expressionString = $sanitizer->sanitize($_SERVER['argv'][1]);

try {
    $validator->validate($expressionString);
} catch (\MathExprParser\Exception\Validator\InvalidFormatException $e) {
    echo $e->getMessage();
    exit("\r\n");
}

try {
    $expression = $parser->parse($expressionString);
    echo $expression->evaluate();
} catch (\MathExprParser\Exception\Parser\ParserException $e) {
    /** log $e->getMessage here */
    echo 'An error has occurred';
}

exit("\r\n");
