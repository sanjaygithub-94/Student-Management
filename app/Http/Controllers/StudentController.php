<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Response;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService) 
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentService->index();
   
        return view('Student.list', compact('students'));
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
    public function store(AddStudentRequest $request)
    {
        $create = $this->studentService->store($request);
        if (!$create) return abort(500, 'Whoops, looks like something went wrong');
        
        return Response::json(['success' => '1']);
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
     * Student edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudent($id)
    {
        return $this->studentService->editStudent($id);
    }

    /**
     * Student update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(UpdateStudentRequest $request)
    {
        $update = $this->studentService->updateStudent($request->student_id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent($id)
    {
        $delete = $this->studentService->deleteStudent($id);
  
        if (!$delete) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }
}
