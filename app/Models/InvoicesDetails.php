<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoicesDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'user_id',
        'invoice_id',
        'product_id',
        'Section_id',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
        'Amount_Paid',
        'Amount_Remainder'
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', "product_id");
    }
    public function section()
    {
        return $this->hasOne(Section::class, 'id', "Section_id");
    }
}