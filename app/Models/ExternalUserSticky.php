<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalUserSticky extends Model
{
    use HasFactory;

    protected $table = 'external_user_stickies';

    protected $fillable = [
        'sticky_id',
        'external_user_id',
        'company_name',
    ];

    /**
     * The sticky this external user is linked to
     */
    public function sticky()
    {
        return $this->belongsTo(StickyNote::class, 'sticky_id');
    }

}
