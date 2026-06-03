<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sticky_id',
        'read_at',
        'sheduled_at',
        'is_triggered',
    ];
    protected $casts = [
        'scheduled_at' => 'datetime',
        'read_at' => 'datetime',
    ];
    public function sticky()
    {
        return $this->belongsTo(StickyNote::class, 'sticky_id');
    }
}
