<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\Loan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListAllLoansResource extends JsonResource
{
    /**
     * @param Loan $loan
     */
    public function __construct(private Loan $loan) {}
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->loan->id,
            'user_id' => $this->loan->userId,
            'book_id' => $this->loan->bookId,
            'loan_date' => $this->loan->loanDate,
            'return_date' => $this->loan->returnDate,
            'status' => $this->loan->status
        ];
    }
}
