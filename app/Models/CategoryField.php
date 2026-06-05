<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryField extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'field_type',
        'is_required',
        'sort_order'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function validations()
    {
        return $this->hasMany(FieldValidation::class, 'field_id');
    }

    public function options()
    {
        return $this->hasMany(FieldOption::class, 'field_id');
    }
}
