<?php

use PredictorAPI\Client\Client;

if (! function_exists('predict')) {
    function predict(string $predictor, array $payload = []): array
    {
        try {
            return app(Client::class)->predict($predictor, $payload);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}


