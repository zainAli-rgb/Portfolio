<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'business_type_id',
        'name',
        'slug',
        'parent_id',
        'is_active'
    ];

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function fields()
    {
        return $this->hasMany(CategoryField::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Self relation (parent/child)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
