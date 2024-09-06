<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\ListAllLoans\ListAllLoansUseCase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ListAllLoansController extends Controller
{
    /**
     * @param ListAllLoansUseCase $useCase
     */

    public function __construct(private ListAllLoansUseCase $useCase) {}

    /**
     * Lista todos os emprestimos cadastrados.
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
