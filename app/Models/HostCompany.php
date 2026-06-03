<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostCompany extends Model
{
    protected $fillable = [
        'name',
        'api_key',
        'allowed_domain',
        'status',
    ];
}
