<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\CreateUser\{CreateUserRequestModel, CreateUserUseCase};
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController extends Controller
{
    /**
     * @param CreateUserUseCase $useCase
     */

    public function __construct(private CreateUserUseCase $useCase) {}

    /**
     * Permite adicionar um novo usuario
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     * @param CreateUserRequest $request
     *
     * @return JsonResponse
     */

    public function __invoke(CreateUserRequest $request)
    {
        $viewModel = $this->useCase->execute(new CreateUserRequestModel($request->validated()));

        return response()->json($viewModel->getResponse(), Response::HTTP_CREATED);
    }
}
