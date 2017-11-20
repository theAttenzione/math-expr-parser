<?php
declare(strict_types=1);

$sanitizer = new \MathExprParser\Sanitizer\SpacesSanitizer();

$validator = new \MathExprParser\Validator\ValidatorComposite(
    new \MathExprParser\Validator\CharacterValidator(
        '0-9\+\-\*\/\(\)\.'
    )
);

$tokenziers = [
    new \MathExprParser\Service\Tokenizer\AdditionSubtraction(),
    new \MathExprParser\Service\Tokenizer\MultiplicationDivision(),
    new \MathExprParser\Service\Tokenizer\AdditionSubtractionInParentheses(),
    new \MathExprParser\Service\Tokenizer\MultiplicationDivisionInParentheses(),
];

$operators = new \ArrayObject(
    [
        '+' => new \MathExprParser\Operator\Addition(),
        '-' => new \MathExprParser\Operator\Subtraction(),
        '*' => new \MathExprParser\Operator\Multiplication(),
        '/' => new \MathExprParser\Operator\Division(),
    ]
);

$parser = new \MathExprParser\Service\Parser\Parser(
    $tokenziers,
    $operators
);
