<?php

use Illuminate\Support\Facades\Route;
use PredictorAPI\Client\Http\Controllers\ProxyController;

Route::post('/predict/{predictor}', [ProxyController::class, 'predict']);
