# PredictorAPI Laravel Client

Fluently call Predictor API from Laravel — backend or frontend — with **one simple helper**. Minimal setup, production-ready.

---

## Installation

```bash
composer require predictorapi/laravel-client
```

Laravel auto-discovers the package. No manual provider registration needed.

---

## Configuration

Add your API key to `.env`:

```env
PREDICTOR_API_KEY=your_api_key_here
```

---

## Usage

### Backend

```php
$result = predict('valid-iban', ['iban' => 'NL91ABNA0417164300']);
```

### Frontend Proxy

Add a route like this in your routes/web.php or routes/api.php


```php
use PredictorAPI\Client\Http\Controllers\ProxyController;

Route::post('/predict/{predictor}', [ProxyController::class, 'predict']);
```

POST to Laravel route `/api/predict/{predictor}`:

- Works with Blade, Vue, React, Alpine, Livewire.  
- API key stays backend-only.
- All your middlewere, authentication can be applied.

---

## Requirements

- PHP >= 8.0  
- Laravel 10+
