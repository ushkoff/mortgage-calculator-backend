<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankCreateRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;
use App\Repositories\BankRepository;

class BankController extends Controller
{
    /**
     * @var BankRepository
     */
    private $bankRepository;

    /**
     * BankController constructor.
     */
    public function __construct()
    {
        $this->bankRepository = app(BankRepository::class);
    }

    /**
     * Get bank list
     */
    public function index()
    {
        $bankList = $this->bankRepository->getAllBanks();

        return BankResource::collection($bankList);
    }

    /**
     * Store a newly created bank
     */
    public function store(BankCreateRequest $request)
    {
        $data = [
            'title' => $request->title,
            'interest_rate' => $request->interest_rate,
            'loan_term' => $request->loan_term,
            'max_loan' => $request->max_loan,
            'min_down_payment' => $request->min_down_payment
        ];

        $bank = Bank::create($data);

        return response()->json(['message' => 'Your bank has been successfully added!'], 200);
    }

    /**
     * Display the specified bank
     */
    public function show($id)
    {
        $bank = $this->bankRepository->getBankByID($id);

        return new BankResource($bank);
    }

    /**
     * Update the specified bank.
     */
    public function update(BankCreateRequest $request, $id)
    {
        $data = [
            'title' => $request->title,
            'interest_rate' => $request->interest_rate,
            'loan_term' => $request->loan_term,
            'max_loan' => $request->max_loan,
            'min_down_payment' => $request->min_down_payment
        ];

        $bank = $this->bankRepository->getBankByID($id);

        $result = $bank->update($data);
        $bank->save();

        if ($result) {
            return response()->json(['message' => 'Your bank has been successfully edited.'], 200);
        }
    }

    /**
     * Remove the specified bank
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);

        $bank->forceDelete();

        return response()->json(['message' => 'Bank has been successfully deleted.'], 200);
    }
}
