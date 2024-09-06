<?php

namespace App\Core\Domain\Library\Entities;

use App\Core\Common\Entities\Entity;
use App\Core\Common\Traits\{WithCreatedAt, WithUpdatedAt};
use DateTime;

final class User extends Entity
{
    use WithCreatedAt, WithUpdatedAt;

    /**
     * @var ?string $id
     */
    public ?string $id;
    /**
     * @var ?string $name
     */
    public ?string $name;
    /**
     * @var ?string $email
     */
    public ?string $email;
    /**
     * @var ?string $password
     */
    public ?string $password;

    /**
     * @param ?string $id
     * @param ?string $name
     * @param ?string $email
     * @param ?string $password
     */

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $email = null,
        ?string $password = null,
        ?DateTime $createdAt = null,
        ?DateTime $updatedAt = null,

    ) {
        parent::__construct($id);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
