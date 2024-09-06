<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Entities\User;
use App\Core\Domain\Library\Ports\Persistence\UserRepository;
use App\Core\Domain\Library\Ports\UseCases\CreateUser\{
    CreateUserOutputPort,
    CreateUserRequestModel,
    CreateUserResponseModel,
    CreateUserUseCase
};

final class CreateUserService implements CreateUserUseCase
{
    /**
     * @param CreateUserOutputPor $output
     */
    public function __construct(private CreateUserOutputPort $output, private UserRepository $userRepository) {}

    /**
     * @param CreateUserRequestModel $requestModel
     *
     * @return ViewModel
     */

    public function execute(CreateUserRequestModel $requestModel): ViewModel
    {
        $user = $this->userRepository->create(
            new User(
               name: $requestModel->getName(),
               email: $requestModel->getEmail(),
               password: $requestModel->getPassword()
            )
        );

        return $this->output->present(new CreateUserResponseModel($user));
    }
}
