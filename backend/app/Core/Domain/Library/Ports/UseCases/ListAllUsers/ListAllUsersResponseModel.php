<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListAllUsers;

use App\Core\Domain\Library\Entities\User;

final class ListAllUsersResponseModel
{
    /**
     * @param array<User> $users
     */
    public function __construct(private array $users) {}

    /**
     * @return array<User>
     */
    public function getUsers(): array
    {
        return $this->users;
    }
}
