<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Models\Mappers;

use App\Core\Domain\Library\Entities\Loan as DomainLoan;
use App\Infra\Adapters\Persistence\Eloquent\Models\Loan as EloquentLoan;

final class LoanMapper
{
    /**
     * @param DomainLoan $loan
     *
     * @return EloquentLoan
     */
    public static function toEloquentModel(DomainLoan $loan): EloquentLoan
    {
        return new EloquentLoan([
            'id' => $loan->id,
            'userId' => $loan->userId,
            'bookId' => $loan->bookId,
            'loanDate' => $loan->loanDate,
            'returnDate' => $loan->returnDate,
            'status' => $loan->status,
        ]);
    }

    /**
     * @param EloquentLoan $loan
     * @param bool $withRelations
     *
     * @return DomainLoan
     */
    public static function toDomainEntity(EloquentLoan $loan, bool $withRelations = true): DomainLoan
    {
        $domainLoan = new DomainLoan(
            id: $loan->id,
            userId: $loan->userId,
            bookId: $loan->bookId,
            loanDate: $loan->loanDate,
            returnDate: $loan->returnDate,
            status: $loan->status,
            createdAt: $loan->created_at,
            updatedAt: $loan->updated_at,
        );

        if ($withRelations) {
            if (!empty($loan->userId)) {
                $domainLoan->addUser(UserMapper::toDomainEntity($loan->userId));
            }
            if (!empty($loan->bookId)) {
                $domainLoan->addBook(BookMapper::toDomainEntity($loan->bookId));
            }
        }

        return $domainLoan;
    }

    /**
     * @param array<EloquentLoan> $loans
     *
     * @return array<DomainLoan>
     */
    public static function toManyDomainEntities(array $loans): array
    {
        return array_map(static fn($loan) => self::toDomainEntity($loan), $loans);
    }
}
