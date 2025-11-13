<?php

namespace PredictorAPI\Client;

use Illuminate\Support\Facades\Http;
use Exception;

class Client
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('predictorapi.url');
        $this->apiKey = config('predictorapi.key');

        if (empty($this->apiKey)) {
            throw new Exception(
                "PredictorAPI API key is not set. " .
                "Add it to your .env: PREDICTORAPI_KEY=your_key and publish config if needed."
            );
        }
    }

    /**
     * Make a prediction call to PredictorAPI
     *
     * @param string $predictor The predictor name (e.g., 'valid-iban')
     * @param array $payload Input data for the predictor
     * @return array Response from the API
     * @throws Exception if request fails
     */
    public function predict(string $predictor, array $payload = []): array
    {
        $response = Http::withHeaders([
            'X-Api-Key' => $this->apiKey,
            'Accept' => 'application/json',
        ])->post("{$this->baseUrl}/predict/{$predictor}", $payload);

        if ($response->failed()) {
            throw new Exception(
                "PredictorAPI request failed ({$response->status()}): " . $response->body()
            );
        }

        return $response->json();
    }
}
