<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    protected $fillable = [
        'teacher_id',
        'course_id',
        'title',
        'description',
        'due_date',
        'file_id'
    ];


}
