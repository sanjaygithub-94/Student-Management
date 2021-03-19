<?php

namespace App\Services;
use App\Models\Student;
use App\Models\StudentMark;
use Carbon\Carbon;
use DB;


class StudentMarkService
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return StudentMark::create(request()->merge([
            'total_marks' => request()->maths_mark + request()->science_mark + request()->history_mark
        ])->only([
            'student_id','maths_mark','science_mark', 
            'history_mark', 'term', 'total_marks'
        ]));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentMark::select('id', 'student_id', 'maths_mark', 'science_mark', 'history_mark', 
                    'term', 'total_marks','created_at')
                ->where('is_deleted', 0)->with('student')->get();
    }

    /**
     * Display a listing of the students.
     */
    public function getStudents()
    {
        return Student::select('id', 'name')->where('is_deleted', 0)->get()->toArray();
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function editStudentMark($id)
    {
        return StudentMark::select('id', 'student_id', 'maths_mark', 'science_mark', 'history_mark', 'term', 'created_at', 'total_marks')
                            ->where('is_deleted', 0)->with('student')
                            ->where('id', $id)->first();
    }

    /*
     * Update the specified resource in storage.
     */
    public function updateStudentMark($id)
    {
        return StudentMark::where('id', $id)->update(request()->merge([
            'total_marks' => request()->maths_mark + request()->science_mark + request()->history_mark
        ])->only([
            'student_id','maths_mark','science_mark', 
            'history_mark', 'term', 'total_marks'
        ]));
    }

    /*
     * Update the specified resource in storage.
     */
    public function deleteStudentMark($id)
    {
        return StudentMark::where('id', $id)->update(['is_deleted' => 1]);
    }
}