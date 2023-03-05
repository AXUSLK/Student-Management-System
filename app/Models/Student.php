<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'status',
        'gender',
        'course_id',
        'user_id',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function firstName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lastName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userEmail()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function studentGender()
    {
        return $this->hasOne(Lov::class, 'id', 'gender');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
