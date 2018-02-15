<?php
declare(strict_types=1);

namespace MathExprParser\Exception\Validator;

use MathExprParser\Exception\UserShownException;

/**
 * Class InvalidFormatException
 */
class InvalidFormatException extends \RuntimeException implements UserShownException
{

}