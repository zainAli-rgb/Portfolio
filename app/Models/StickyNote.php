<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickyNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'color',
        'user_id',
        'priority',
        'viewed_at',
        'reminder_at',
    ];
    protected $casts = [
        'reminder_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function externalUsers()
    {
        return $this->hasMany(ExternalUserSticky::class, 'sticky_id');
    }


}
