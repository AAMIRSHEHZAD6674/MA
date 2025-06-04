<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Target extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'target_assign',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Relationship: Target belongs to a User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
