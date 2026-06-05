<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    protected $fillable = [
        'product_id',
        'field_id',
        'value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function field()
    {
        return $this->belongsTo(CategoryField::class, 'field_id');
    }
}
