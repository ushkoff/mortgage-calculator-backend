<?php

namespace App\Repositories;

use App\Models\Bank as Model;
use App\Repositories\CoreRepository;

/**
 * Class BankRepository
 * @package Repositories
 */
class BankRepository extends CoreRepository
{
    /**
     * BankRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get bank by ID
     *
     * @param $id
     */
    public function getBankByID($id)
    {
        $columns = [
            'id',
            'title',
            'interest_rate',
            'loan_term',
            'max_loan',
            'min_down_payment'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->findOrFail($id);

        return $result;
    }

    /**
     * Get list of all banks
     *
     * @param $blacklist
     * @return array
     */
    public function getAllBanks($blacklist = [])
    {
        $columns = [
            'id',
            'title',
            'interest_rate',
            'loan_term',
            'max_loan',
            'min_down_payment'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->get();

        return $result;
    }
}