<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product_id',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date',
    ];

    public function file()
    {

        return $this->morphMany(File::class, 'Fileable');
    }

    public function InvoiceDetails()
    {
        return $this->hasMany(InvoicesDetails::class, "invoice_id", "id");
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, "id", "section_id");
    }
}
