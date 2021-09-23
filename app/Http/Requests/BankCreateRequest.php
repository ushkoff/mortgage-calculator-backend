<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'interest_rate' =>'required',
            'loan_term' => 'required',
            'max_loan' => 'required',
            'min_down_payment' => 'required'
        ];
    }
}
