<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOption extends Model
{
    protected $fillable = [
        'field_id',
        'value',
        'label'
    ];

    public function field()
    {
        return $this->belongsTo(CategoryField::class, 'field_id');
    }
}
