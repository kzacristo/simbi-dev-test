<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListAllUsers;

use App\Core\Common\Ports\ViewModel;

interface ListAllUsersOutputPort{
    /**
     * @param ListAllUsersResponseModel $responseModel
     *
     * @return ViewModel
     */

     public function present(ListAllUsersResponseModel $responseModel): ViewModel;
}
