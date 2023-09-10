<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDateRule implements Rule
{
    public $invoice_Date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($invoice_Date)
    {
        $this->invoice_Date = $invoice_Date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value >= $this->invoice_Date;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'invalid Date';
    }
}
