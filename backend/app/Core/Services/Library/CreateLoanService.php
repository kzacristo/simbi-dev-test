<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Entities\Loan;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Core\Domain\Library\Ports\UseCases\CreateLoan\{
    CreateLoanOutputPort,
    CreateLoanRequestModel,
    CreateLoanResponseModel,
    CreateLoanUseCase,
};

final class CreateLoanService implements CreateLoanUseCase
{
    /**
     * @param CreateLoanOutputPort $output
     */
    public function __construct(private CreateLoanOutputPort $output, private LoanRepository $loanRepository) {}

    /**
     * @param CreateLoanRequestModel $requestModel
     *
     * @return ViewModel
     */
    public function execute(CreateLoanRequestModel $requestModel): ViewModel
    {
        $loanDate = new \DateTime($requestModel->getLoanDate());
        $returnDate = new \DateTime($requestModel->getReturnDate());

        $userId = $requestModel->getUserId();
        $bookId = $requestModel->getBookId();

        if (empty($userId) || empty($bookId)) {
            throw new \InvalidArgumentException('User ID and Book ID cannot be null.');
        }

        $loan = $this->loanRepository->create(
            new Loan(
                userId: $userId,
                bookId: $bookId,
                loanDate: $loanDate,
                returnDate: $returnDate,
                status: $requestModel->getStatus()
            )
        );

        return $this->output->present(new CreateLoanResponseModel($loan));
    }
}
