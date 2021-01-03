<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['students'] = Student::orderBy('id','desc')->paginate(5);   
        //     return view('admin.students.list',$data);

        $students = User::all();

        return view('admin.students.list',compact('students'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.students.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $student = new User([
            'name' => $request->post('txtFirstName'),
            'email'=> $request->post('txtLastName'),
            'password'=> $request->post('txtPassword')
        ]);
        $student->save();    
            return Response::json($student);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $student  = User::where($where)->first();
 
        return Response::json($student);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $student = User::find($request->post('hdnStudentId'));
                $student->name = $request->post('txtFirstName');
                $student->email = $request->post('txtLastName');
                $student->update();
        return Response::json($student);
 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = User::where('id',$id)->delete();
        return Response::json($student);
    }
}
