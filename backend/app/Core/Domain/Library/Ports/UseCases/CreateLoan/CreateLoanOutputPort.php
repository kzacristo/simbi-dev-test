<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateLoan;

use App\Core\Common\Ports\ViewModel;

interface CreateLoanOutputPort
{
    public function present(CreateLoanResponseModel $reponseModel): ViewModel;
}
