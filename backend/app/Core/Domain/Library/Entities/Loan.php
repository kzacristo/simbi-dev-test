<?php

namespace App\Core\Domain\Library\Entities;

use App\Core\Common\Entities\Entity;
use App\Core\Common\Traits\{WithCreatedAt, WithUpdatedAt};
use DateTime;

final class Loan extends Entity
{
    use WithCreatedAt, WithUpdatedAt;
    /**
     * @var ?string $id
     */
    public ?string $id;
    /**
     * @var ?string $userId
     */
    public ?string $userId;
    /**
     * @var ?string $bookId
     */
    public ?string $bookId;
    /**
     * @var ?DateTime
     */
    public ?DateTime $loanDate;
    /**
     * @var ?DateTime $returDate
     */
    public ?DateTime $returnDate;

    /**
     * @param ?string $id
     * @param ?string $userId
     * @param ?string $bookId
     * @param ?DateTime $loanDate
     * @param ?DateTime $returnDate
     */

    public function __construct(
        ?string $id = null,
        ?string $userId = null,
        ?string $bookId = null,
        ?DateTime $loanDate = null,
        ?DateTime $returnDate = null
    ) {
        parent::__construct($id);
        $this->userId = $userId;
        $this->bookId = $bookId;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
    }

    /**
     * @param User $user
     *
     * @return void
     */
    public function addUser(User $user): void
    {
        $this->userId = $user->id;
    }

    /**
     * @return void
     */

    public function addBook(Book $book): void
    {
        $this->bookId = $book->id;
    }
}
