<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\FinAssistService;

class FinAssistController extends Controller
{
    protected $finAssistService;

    public function __construct(FinAssistService $finAssistService)
    {
        $this->finAssistService = $finAssistService;
    }

    /**
     * Display the FinAssist dashboard.
     */
    public function index()
    {
        return view('finassist.finassist');
    }

    /**
     * Handle user queries via FinAssist.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleQuery(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        try {
            $response = $this->finAssistService->processQuery($request->input('query'));

            return response()->json([
                'status' => 'success',
                'data' => $response,
            ]);

        } catch (\Exception $e) {
            Log::error('FinAssist Query Error: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Unable to process your query at this time.',
            ], 500);
        }
    }
}
