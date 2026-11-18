<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    protected $fillable = ['student_id', 'course_marks', 'grade'];

    protected static function booted(): void
    {
        static::saving(function (Result $result) {
            $result->grade = self::gradeFromMarks((float) $result->course_marks);
        });
    }

    public static function gradeFromMarks(float $marks): string
    {
        return match (true) {
            $marks >= 80 => 'A+',
            $marks >= 70 => 'A',
            $marks >= 60 => 'A-',
            $marks >= 50 => 'B',
            $marks >= 40 => 'C',
            default => 'F',
        };
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
