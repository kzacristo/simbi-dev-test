<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\ListAllUsers\ListAllUsersUseCase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListAllUsersController extends Controller
{
    /**
     * @param ListAllUserUseCase $useCase
     */

    public function __construct(private ListAllUsersUseCase $useCase) {}

    /**
     * Lista todos os usuarios cadastrados
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
     * @return JsonResponse
     */
    public function __invoke()
    {
        $viewModel = $this->useCase->execute();
        return response()->json($viewModel->getResponse(), Response::HTTP_OK);
    }
}
