<?php

namespace App\Http\Controllers\Api;

use App\Services\AtmService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AtmController extends Controller
{
    private $atmService;

    public function __construct(AtmService $atmService)
    {
        $this->atmService = $atmService;
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $banknotes = $this->atmService->withdraw($request->account_id, $request->amount);
            return response()->json(['banknotes' => $banknotes]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

