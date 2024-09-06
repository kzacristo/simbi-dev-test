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
     * @var ?string $status
     */
    public ?string $status;

    /**
     * @param ?string $id
     * @param ?string $userId
     * @param ?string $bookId
     * @param ?DateTime $loanDate
     * @param ?DateTime $returnDate
     * @param ?string $status
     */

    public function __construct(
        ?string $id = null,
        ?string $userId = null,
        ?string $bookId = null,
        ?DateTime $loanDate = null,
        ?DateTime $returnDate = null,
        ?string $status = null,
        ?DateTime $createdAt = null,
        ?DateTime $updatedAt = null,
    ) {
        parent::__construct($id);
        $this->userId = $userId;
        $this->bookId = $bookId;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
