<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_active',
    ];

    /*
    |---------------------------------------
    | Relationships
    |---------------------------------------
    */

    // A vendor belongs to a user (owner)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A vendor can have many business types
    public function businessTypes()
    {
        return $this->hasMany(BusinessType::class);
    }
}