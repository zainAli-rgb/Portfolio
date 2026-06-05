<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldValidation extends Model
{
    protected $fillable = [
        'field_id',
        'rule',
        'value'
    ];

    public function field()
    {
        return $this->belongsTo(CategoryField::class, 'field_id');
    }
}
