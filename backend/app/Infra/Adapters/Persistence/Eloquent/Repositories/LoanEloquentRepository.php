<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Repositories;

use App\Core\Domain\Library\Entities\Loan;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Infra\Adapters\Persistence\Eloquent\Models\Loan as EloquentLoan;
use App\Infra\Adapters\Persistence\Eloquent\Models\Mappers\LoanMapper;

final class LoanEloquentRepository implements LoanRepository
{
    /**
     * @param Loan $loan
     *
     * @return Loan
     */
    public function create(Loan $loan): Loan
    {
        $eloquentLoan = LoanMapper::toEloquentModel($loan);
        $eloquentLoan->save();

        return LoanMapper::toDomainEntity($eloquentLoan);
    }

    /**
     * @return array<Loan>
     */
    public function getAll(): array
    {
        $loans = EloquentLoan::with([])
            ->get()
            ->all();

        if (empty($loans)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($loans);
    }

    /**
     * @param string $loanId
     *
     * @return array<Loan>
     */
    public function getLoanByLoanId(string $loanId): array
    {
        $eloquentLoan = EloquentLoan::where(['id' => $loanId])
            ->with(['id'])
            ->get()
            ->all();

        if (empty($eloquentLoan)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($eloquentLoan);
    }

    /**
     * @param string $userId
     *
     * @return array<Loan>
     */
    public function getLoanByUserId(string $userId): array
    {
        $eloquentLoan = EloquentLoan::where(['user_id' => $userId])
            ->with(['user_id'])
            ->get()
            ->all();

        if (empty($eloquentLoan)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($eloquentLoan);
    }

    /**
     * @param string $bookId
     *
     * @return array<Loan>
     */
    public function getLoanByBookId(string $bookId): array
    {
        $eloquentLoan = EloquentLoan::where(['user_id' => $bookId])
            ->with(['user_id'])
            ->get()
            ->all();

        if (empty($eloquentLoan)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($eloquentLoan);
    }
}
