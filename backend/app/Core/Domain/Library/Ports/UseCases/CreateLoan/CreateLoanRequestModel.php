<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateLoan;

use Nette\Utils\Random;

final class CreateLoanRequestModel
{
    /**
     * @param array $attributes
     */

    public function __construct(private array $attributes = []) {}

    /**
     * @return string|null
     */
    public function getUserId(): string|null
    {
        return $this->attributes['user_id'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getBookId(): string|null
    {
        return $this->attributes['book_id'] ?? null;
    }

    /**
     * @return string|null
     */

    public function getLoanDate(): string|null
    {
        return $this->attributes['loan_date'] ?? null;
    }

    /**
     * @return string|null
     */

    public function getReturnDate(): string|null
    {
        return $this->attributes['return_date'] ?? null;
    }

    /**
     * @return string|null
     */

    public function getStatus(): string|null
    {
        $status = ['loaned', 'returned'];
        return $this->attributes[$status[array_rand($status)]] ?? null;
        // return $this->attributes['status'] ?? null;
    }
}
