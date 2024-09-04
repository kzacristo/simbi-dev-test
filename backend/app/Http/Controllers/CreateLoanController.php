<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\CreatLoan\{CreateLoanRequestModel, CreateLoanUseCase};
use App\Http\Requests\CreateLoanRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateLoanController extends Controller
{
    /**
     * @param CreateLoanUseCase $useCase
     */

    public function __construct(private CreateLoanUseCase $useCase) {}

    /**
     * Permite adicionar um novo emprestimo
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
     * @param CreateLoanRequest $request
     *
     * @return JsonResponse
     */

    public function __invoke(CreateLoanRequest $request){
        $viewModel = $this->useCase->execute(new CreateLoanRequestModel($request->validate()));
        return response()->json($viewModel->getResponse(), Response::HTTP_CREATED);
    }
}
