<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'gender',
    ];

    // An office belongs to a district
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    // Optional: If users belong to offices
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

}
