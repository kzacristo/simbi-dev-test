<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\Persistence\UserRepository;
use App\Core\Domain\Library\Ports\UseCases\ListAllUsers\{
    ListAllUsersOutputPort,
    ListAllUsersResponseModel,
    ListAllUsersUseCase,
};

final class ListAllUsersService implements ListAllUsersUseCase
{
    /**
     * @param ListAllUsersOutputPort $output
     * @param UserRepository $userRepository
     */
    public function __construct(private ListAllUsersOutputPort $output, private UserRepository $userRepository) {}

    public function execute(): ViewModel
    {
        $users = $this->userRepository->getAll();
        return $this->output->present(new ListAllUsersResponseModel($users));
    }
}
