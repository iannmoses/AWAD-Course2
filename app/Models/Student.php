<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    public const PROGRAMMES = ['Business Computing', 'Business Administration', 'Accounting and Finance', 'Marketing'];

    public const YEARS = ['Year I', 'Year II', 'Year III', 'Year IV'];

    protected $fillable = ['user_id', 'student_number', 'programme', 'year'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_registrations')
            ->withPivot('registration_date', 'status')
            ->withTimestamps();
    }
}
