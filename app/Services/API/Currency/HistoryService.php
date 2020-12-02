<?php


namespace App\Services\API\Currency;


use App\Rules\SymbolsRule;
use Illuminate\Support\Facades\Validator;

class HistoryService extends ClientService
{
    public function validate(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'start_at' => 'required|date_format:"Y-m-d"|before:end_at',
            'end_at' => 'required|date_format:"Y-m-d"',
            'base' => 'in:' . ALLOWED_SYMBOLS_LIST,
            'symbols' => ['string', new SymbolsRule]
        ]);
    }

    public function handle(): array
    {
        return $this->sendRequest('history', request()->only(['start_at', 'end_at', 'base', 'symbols']));
    }
}
