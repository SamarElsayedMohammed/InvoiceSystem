<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_name',
        'description',
        'created_by'
    ];

    public function Products()
    {
        return $this->hasMany(Product::class, "id", "id");
    }
}
