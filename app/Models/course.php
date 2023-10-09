<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code'       
    ];
    public function teacher()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'teacher_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrolls', 'course_id', 'student_id');
    }

    
}
