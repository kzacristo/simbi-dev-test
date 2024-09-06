<?php

namespace App\Adapters\Presenters\Library;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\UseCases\CreateUser\{CreateUserOutputPort, CreateUserResponseModel};
use App\Http\Resources\Library\CreateUserResource;

final class CreateUserJsonPresenter implements CreateUserOutputPort
{
    /**
     * @param CreateUserResponseModel $responseModel
     *
     * @return ViewModel
     */
    public function present(CreateUserResponseModel $responseModel): ViewModel
    {
        return new JsonResourceViewModel(new CreateUserResource($responseModel->getUser()));
    }
}
