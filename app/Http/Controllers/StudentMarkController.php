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
   
        return view('StudentMark.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $students = $this->studentMarkService->index();
        return view('StudentMark.list', compact('students'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Student-mark Add page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addStudentMark()
    {
        $students = $this->studentMarkService->getStudents();

        return view('StudentMark.add', compact('students'));
    }

    /**
     * Student mark edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudentMark($id)
    {
        $studentDetails = $this->studentMarkService->editStudentMark($id);
        $students = $this->studentMarkService->getStudents();
   
        return view('StudentMark.edit', compact('students', 'studentDetails'));
    }

    /**
     * Student mark update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudentMark(UpdateStudentMarkRequest $request, $id)
    {
        $update = $this->studentMarkService->updateStudentMark($id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        $students = $this->studentMarkService->index();
        return view('StudentMark.list', compact('students'));
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

        $students = $this->studentMarkService->index();

        return view('StudentMark.list', compact('students'));
    }
}
