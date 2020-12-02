<?php


namespace App\Services\API\Currency;


use App\Rules\SymbolsRule;
use Illuminate\Support\Facades\Validator;

class LatestService extends ClientService
{
    public function validate(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'base' => 'in:' . ALLOWED_SYMBOLS_LIST,
            'symbols' => ['string', new SymbolsRule]
        ]);
    }

    public function handle(): array
    {
        return $this->sendRequest('latest', request()->only(['base', 'symbols']));
    }
}
