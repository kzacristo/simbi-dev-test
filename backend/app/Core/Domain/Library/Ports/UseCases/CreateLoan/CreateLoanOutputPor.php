<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreatLoan;

use App\Core\Common\Ports\ViewModel;

interface CreateLoanOutputPort
{
    public function present(CreateLoanResponseModel $reponseModel): ViewModel;
}
