<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentMarkService;
use App\Http\Requests\AddStudentMarkRequest;
use App\Http\Requests\UpdateStudentMarkRequest;
use Response;

class StudentMarkController extends Controller
{
    protected $studentMarkService;

    public function __construct(StudentMarkService $studentMarkService) 
    {
        $this->studentMarkService = $studentMarkService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentMarkService->index();
        $studentsInfo = $this->studentMarkService->getStudents();
  
        return view('StudentMark.list', compact('students', 'studentsInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddStudentMarkRequest $request)
    {
        $create = $this->studentMarkService->store($request);
        if (!$create) return abort(500, 'Whoops, looks like something went wrong');
        
        return Response::json(['success' => '1']);
    }

    /**
     * Student mark edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudentMark($id)
    {
        return $this->studentMarkService->editStudentMark($id);
    }

    /**
     * Student mark update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudentMark(UpdateStudentMarkRequest $request)
    {
        $update = $this->studentMarkService->updateStudentMark($request->student_mark_id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteStudentMark($id)
    {
        $delete = $this->studentMarkService->deleteStudentMark($id);
  
        if (!$delete) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }
}
