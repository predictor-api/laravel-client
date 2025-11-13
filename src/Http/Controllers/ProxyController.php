<?php

namespace PredictorAPI\Client\Http\Controllers;

use Illuminate\Http\Request;
use PredictorAPI\Client\Client;

class ProxyController
{
    public function predict(string $predictor, Request $request, Client $client)
    {
        return response()->json($client->predict($predictor, $request->all()));
    }
}
