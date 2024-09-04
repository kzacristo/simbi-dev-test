<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class UserMustHaveAPublisher extends DomainException
{
    protected $message = 'User must have a publisher';
}
