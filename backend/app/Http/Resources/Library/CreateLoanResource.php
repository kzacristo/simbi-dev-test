<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\Loan;
use DateTimeInterface;
use Illuminate\Http\Resources\Json\JsonResource;


final class CreateLoanResource extends JsonResource
{
    /**
     * @param Loan $loan
     */

    public function __construct(private Loan $loan) {}


}
