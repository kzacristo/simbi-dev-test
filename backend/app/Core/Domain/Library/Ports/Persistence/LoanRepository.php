<?php

namespace App\Core\Domain\Library\Ports\Persistence;

use App\Core\Domain\Library\Entities\Loan;

interface LoanRepository{
    /**
     * @param Loan $loan
     *
     * @return Loan
     */

     public function create(Loan $loan): Loan;

     /**
      * @return array<Loan>;
      */
      public function getAll(): array;

    /**
     * @param string $loanId
     *
     * @return array<Loan>;
     */

     public function getLoanByLoanId(string $loanId): array;


     /**
     * @param string $userId
     *
     * @return array<Loan>;
     */

     public function getLoanByUserId(string $userId): array;

     /**
     * @param string $bookId
     *
     * @return array<Loan>;
     */

     public function getLoanByBookId(string $bookId): array;
}
