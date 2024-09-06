<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Repositories;

use App\Core\Domain\Library\Entities\User;
use App\Core\Domain\Library\Ports\Persistence\UserRepository;
use App\Infra\Adapters\Persistence\Eloquent\Models\User as EloquentUser;
use App\Infra\Adapters\Persistence\Eloquent\Models\Mappers\UserMapper;

final class UserEloquentRepository implements UserRepository
{
    /**
     * @param User $user
     *
     * @return User
     */
    public function create(User $user): User
    {
        $eloquentUser = UserMapper::toEloquentModel($user);
        $eloquentUser->save();

        return UserMapper::toDomainEntity($eloquentUser);
    }

    /**
     * @return array<User>
     */
    public function getAll(): array
    {
        $users = EloquentUser::with([])
            ->get()
            ->all();

        if (empty($users)) {
            return [];
        }

        return UserMapper::toManyDomainEntities($users);
    }

    /**
     * @param string $userId
     *
     * @return array<User>;
     */
    public function getLoanByUserId(string $userId): array
    {
        $eloquentUser = EloquentUser::where(['id' => $userId])
            ->with(['id'])
            ->get()
            ->all();
        if (empty($eloquentUser)) {
            return [];
        }

        return UserMapper::toManyDomainEntities($eloquentUser);
    }

    /**
     * @param string $name
     *
     * @return array<User>;
     */
    public function getUserByName(string $name): array
    {
        $eloquentUser = EloquentUser::where(['name' => $name])
            ->with(['id'])
            ->get()
            ->all();
        if (empty($eloquentUser)) {
            return [];
        }

        return UserMapper::toManyDomainEntities($eloquentUser);
    }
}
