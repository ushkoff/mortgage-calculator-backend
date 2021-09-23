<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable  = [
        'title',
        'interest_rate',
        'loan_term',
        'max_loan',
        'min_down_payment'
    ];
}
