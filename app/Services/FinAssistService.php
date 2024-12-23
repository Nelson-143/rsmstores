<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FinAssistService
{
    /**
     * Process user query and return insights.
     *
     * @param string $query
     * @return array
     */
    public function processQuery(string $query): array
    {
        // Replace this with actual FinGPT API or logic
        $apiEndpoint = config('services.fingpt.endpoint');
        $apiKey = config('services.fingpt.key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($apiEndpoint, [
            'query' => $query,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Failed to retrieve FinAssist insights.');
    }
}
