<?php

namespace App\Services;
use App\Models\Student;
use Carbon\Carbon;


class StudentService
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return Student::create(request()->only([
            'name','age','gender', 'reporting_person'
        ]));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::select('id', 'name', 'age', 'gender', 'reporting_person')->where('is_deleted', 0)->get();
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function editStudent($id)
    {
        return Student::select('id', 'name', 'age', 'gender', 'reporting_person')->where('id', $id)->first();
    }

    /*
     * Update the specified resource in storage.
     */
    public function updateStudent($id)
    {
        return Student::where('id', $id)->update(request()->only([
            'name','age','gender', 'reporting_person'
        ]));
    }

    /*
     * Update the specified resource in storage.
     */
    public function deleteStudent($id)
    {
        return Student::where('id', $id)->update(['is_deleted' => 1]);
    }

}