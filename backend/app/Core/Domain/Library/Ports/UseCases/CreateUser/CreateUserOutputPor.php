<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateUser;

use App\Core\Common\Ports\ViewModel;

interface CreateUserOutputPort
{
    public function present(CreateUserResponseModel $reponseModel): ViewModel;
}
