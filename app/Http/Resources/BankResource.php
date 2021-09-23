<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'interestRate' => $this->interest_rate,
            'loanTerm' => $this->loan_term,
            'maximumLoan' => $this->max_loan,
            'minimumDownPayment' => $this->min_down_payment
        ];
    }
}
