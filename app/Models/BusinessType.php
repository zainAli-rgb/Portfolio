<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $fillable = ['name', 'slug', 'is_active'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
