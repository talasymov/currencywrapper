<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SymbolsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowedSymbols = explode(',', ALLOWED_SYMBOLS_LIST);

        $symbols = explode(',', $value);

        return count(array_diff($symbols, $allowedSymbols)) === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected symbols is invalid.';
    }
}
