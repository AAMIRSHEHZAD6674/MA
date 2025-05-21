<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inspection extends Model
{
    protected $fillable = [
        'school_code',
        'data',
        'latitude',
        'longitude',
        'school_status',
        'students_cleanliness',
        'school_cleanliness',
        'attachments',
        'district_id',
        'user_id',
        'head_management_assessment',
        'teaching_learning_assessment',
    ];
    protected $casts = [
        'attachments' => 'array',
        'data' => 'array',
    ];


    // Relationships

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }


    // Optional: If you have related attendance tables

    public function staffAttendances(): HasMany
    {
        return $this->hasMany(StaffAttendance::class);
    }

    public function studentAttendances(): HasMany
    {
        return $this->hasMany(StudentAttendance::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
