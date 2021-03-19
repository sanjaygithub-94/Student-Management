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
        // $students = $this->studentService->index();
        // return view('Student.list', compact('students'));
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
     * Student Add page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addStudent()
    {
        return view('Student.add');
    }

    /**
     * Student edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStudent($id)
    {
        $student = $this->studentService->editStudent($id);
   
        return view('Student.edit', compact('student'));
    }

    /**
     * Student update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(UpdateStudentRequest $request, $id)
    {
        $update = $this->studentService->updateStudent($id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        $students = $this->studentService->index();
        return view('Student.list', compact('students'));
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

        $students = $this->studentService->index();

        return view('Student.list', compact('students'));
    }
}
