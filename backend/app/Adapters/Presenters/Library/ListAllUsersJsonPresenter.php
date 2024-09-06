<?php

namespace App\Adapters\Presenters\Library;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\UseCases\ListAllUsers\{ListAllUsersOutputPort, ListAllUsersResponseModel};

use App\Http\Resources\Library\ListAllUsersResource;

final class ListAllUsersJsonPresenter implements ListAllUsersOutputPort
{
    /**
     * @param ListAllUsersResponseModel $responseModel
     *
     * @return ViewModel
     */
    public function present(ListAllUsersResponseModel $responseModel): ViewModel
    {
        return new JsonResourceViewModel(ListAllUsersResource::collection($responseModel->getUsers()));
    }
}
