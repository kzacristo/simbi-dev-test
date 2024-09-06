<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateUser;

use App\Core\Common\Ports\ViewModel;

interface CreateUserUseCase{
    public function execute(CreateUserRequestModel $requestModel): ViewModel;
}
