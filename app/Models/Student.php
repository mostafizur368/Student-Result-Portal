<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'name', 'roll', 'department', 'email',
        'phone', 'dob', 'gender', 'password',
    ];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [
            'dob' => 'date',
            'password' => 'hashed',
        ];
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
