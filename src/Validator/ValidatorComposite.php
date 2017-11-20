<?php
declare(strict_types=1);

namespace MathExprParser\Validator;

/**
 * Class ValidatorComposite
 */
class ValidatorComposite implements ValidatorInterface
{
    /**
     * Validators
     *
     * @var ValidatorInterface[]
     */
    private $validators;


    public function __construct(ValidatorInterface ... $validators)
    {
        $this->validators = $validators;
    }

    /**
     * @inheritdoc
     */
    public function validate(string $string): void
    {
        foreach ($this->validators as $validator) {
            $validator->validate($string);
        }
    }
}