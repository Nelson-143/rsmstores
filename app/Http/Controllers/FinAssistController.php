<?php

namespace App\Http\Controllers;

use App\Services\FinAssistService;
use App\Models\AnalysisConversations;
use App\Models\AnalysisMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FinAssistController extends Controller
{
    protected $finAssistService;

    public function __construct(FinAssistService $finAssistService)
    {
        $this->finAssistService = $finAssistService;
    }

    public function index()
    {
        // Fetch past conversations with messages
        $conversations = AnalysisConversations::with('messages')->latest()->get();
        return view('finassist.finassist', compact('conversations'));
    }

    public function handleQuery(Request $request)
    {
        $userInput = $request->input('message');

        if (!$userInput) {
            return response()->json(['error' => 'No message provided'], 400);
        }

        // Start or get current conversation
        $conversation = AnalysisConversations::firstOrCreate(['user_id' => auth()->id()]);

        // Save user message
        $userMessage = new AnalysisMessages([
            'conversation_id' => $conversation->id,
            'role' => 'user',
            'content' => $userInput
        ]);
        $userMessage->save();

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json'
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are an AI assistant for Roman Stock Manager.'],
                    ['role' => 'user', 'content' => $userInput]
                ],
                'temperature' => 0.7
            ]);

            if ($response->failed()) {
                throw new \Exception('API request failed');
            }

            $botResponse = $response->json()['choices'][0]['message']['content'] ?? 'Something went wrong, please try again.';
        } catch (\Exception $e) {
            Log::error('FinAssist API Error: ' . $e->getMessage());
            $botResponse = 'FinAssist is currently reading some finance books, please wait, we shall resume soon 😂';
        }

        // Save bot response
        $botMessage = new AnalysisMessages([
            'conversation_id' => $conversation->id,
            'role' => 'assistant',
            'content' => $botResponse
        ]);
        $botMessage->save();

        return response()->json(['response' => $botResponse]);
    }
}
