<?php

namespace App\Core\Domain\Library\Ports\Persistence;

use App\Core\Domain\Library\Entities\User;

interface UserRepository
{
    /**
     * @param User $user
     *
     * @return User
     */

    public function create(User $user): User;

    /**
     * @return array<User>;
     */
    public function getAll(): array;

    /**
     * @param string $userId
     *
     * @return array<User>;
     */

    public function getLoanByUserId(string $userId): array;

    /**
     * @param string $name
     *
     * @return array<User>;
     */
    public function getUserByName(string $name): array;

}
