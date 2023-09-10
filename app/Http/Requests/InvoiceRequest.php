<?php

namespace App\Http\Requests;

use App\Rules\ValidDateRule;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'invoice_number' => ['required'],
            'invoice_Date' => ['required', 'date'],
            'Due_date' => ['required', 'date', new ValidDateRule($this->invoice_Date)],
            'Amount_collection' => ['required', 'decimal:2'],
            'Amount_Commission' => ['required', 'decimal:2'],
            'Discount' => ['required', 'numeric'],
            'Rate_VAT' => ['required', 'numeric'],
            'Value_VAT' => ['required', 'numeric'],
            'Total' => ['required', 'numeric'],
            'note' => ['nullable', 'string'],
            'section_id' => ['required', "exists:sections,id"],
            'product_id' => ['required', "exists:products,id"],
        ];
    }
}