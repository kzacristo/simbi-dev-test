<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAPublisher extends DomainException
{
    protected $message = 'Loan must have a publisher';
}
