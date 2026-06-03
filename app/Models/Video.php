<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'original_name',
        'file_path',
        'output_path',
        'format',
        'resolution',
        'status'
    ];
}
