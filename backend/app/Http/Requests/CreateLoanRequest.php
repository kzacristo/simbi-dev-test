<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            "user_id" => ["required", "string"],
            "book_id" => ["required", "string"],
            "loan_date" => ["required", "date"],
            "return_date" => ["required", "date"],
        ];
    }
}
