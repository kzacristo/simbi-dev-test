<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateUser;

use App\Core\Domain\Library\Entities\User;

final class CreateUserResponseModel
{
    /**
     * @param User $user
     */

    public function __construct(private User $user) {}

    /**
     * @return User
     */

    public function getUser(): User
    {
        return $this->user;
    }
}
