<?php

namespace App\Core\Domain\Library\Exceptions;

use InvalidArgumentException;

final class LoanMissingDataException extends InvalidArgumentException
{
    protected $message = 'Loan is missing required data: userId or bookId';
}
