<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Models\Mappers;

use App\Core\Domain\Library\Entities\User as DomainUser;
use App\Infra\Adapters\Persistence\Eloquent\Models\User as EloquentUser;

final class UserMapper
{
    /**
     * @param DomainUser $user
     *
     * @return EloquentUser
     */

    public static function toEloquentModel(DomainUser $user): EloquentUser
    {

        return new EloquentUser([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ]);
    }

    /**
     * @param EloquentUser $user
     * @param bool $withRelations
     *
     * @return DomainUser
     */
    public static function toDomainEntity(EloquentUser $user, bool $withRelations = true): DomainUser
    {
        $domainUser = new DomainUser(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: $user->password
        );

        return $domainUser;
    }

    /**
     * @param array<EloquentUser> $users
     *
     * @return array<DomainUser>
     */
    public static function toManyDomainEntities(array $users): array
    {
        return array_map(static fn($user) => self::toDomainEntity($user), $users);
    }
}
