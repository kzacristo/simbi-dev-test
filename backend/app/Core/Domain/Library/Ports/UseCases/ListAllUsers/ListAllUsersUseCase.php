<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListAllUsers;

use App\Core\Common\Ports\ViewModel;

interface ListAllUsersUseCase
{
    public function execute(): ViewModel;
}
