<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StudentMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'maths_mark',
        'science_mark',
        'history_mark',
        'term',
        'total_marks',
        'created_at'
    ];

    public function student()
	{
		return $this->hasOne(Student::class, 'id', 'student_id')->select(array(
            'id',
            'name'
        ));
	}

    // public function getCreatedAtAttribute()
    // {
    //     return date('d-m-y');
    // }
}
