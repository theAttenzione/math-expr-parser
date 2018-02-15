<?php
declare(strict_types=1);

namespace MathExprParser\Exception\Parser;

use MathExprParser\Exception\UserShownException;

/**
 * Class WrongOperandException
 */
class WrongOperandException extends \Exception implements UserShownException
{
}
