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
use function PredictorAPI\Client\predict;

$result = predict('valid-iban', ['iban' => 'NL91ABNA0417164300']);
```

### Frontend Proxy

POST to Laravel route `/api/predict/{predictor}`:

```js
const res = await fetch('/api/predict/valid-iban', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ iban: 'NL91ABNA0417164300' })
});
const result = await res.json();
```

- Works with Blade, Vue, React, Alpine, Livewire.  
- API key stays backend-only.

---

## Routes

- `POST /api/predict/{predictor}`  
- `{predictor}` = PredictorAPI name  
- Body = JSON payload matching the predictor inputs

---

## Requirements

- PHP >= 8.0  
- Laravel 10+
