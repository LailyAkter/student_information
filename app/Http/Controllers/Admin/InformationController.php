<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;
use App\Department;
use App\Course;
use App\User;
use Brian2694\Toastr\Facades\Toastr;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Information::all();

        return view('admin.information.index',compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();
        $students = User::all();
        // dd($students);


        return view('admin.information.create',compact('departments','courses','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'father_name'=>'required',
            'mother_name'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
            'course_id'=>'required',
            'department_id'=>'required',
            'student_id'=>'required',
            'phone_number'=>'required'
        ]);
         
        $info = new Information();
        $info->father_name = $request->father_name;
        $info->mother_name = $request->mother_name;
        $info->phone_number = $request->phone_number;
        $info->present_address = $request->present_address;
        $info->permanent_address = $request->permanent_address;
        $info->course_id = $request->course_id;
        $info->student_id = $request->student_id;
        $info->department_id = $request->department_id;
        $info->save();

        Toastr::success('Successfully information Added ','Success');
        return redirect()->back();
        

        // $info = new Information([
        //     'father_name' => $request->post('textFatherName'),
        //     'mother_name'=> $request->post('textMotherName'),
        //     'present_address'=> $request->post('textPresentAddress'),
        //     'permanent_address' => $request->post('textPermanentAddress'),
        //     'mother_name'=> $request->post('textMotherName'),
        //     'present_address'=> $request->post('textPresentAddress'),
        // ]);
        // $info->save();    
        //     return Response::json($student,$departments);
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
        $departments = Department::all();
        $courses = Course::all();
        $students = User::all();
        $info = Information::find($id);
        return view('admin.information.edit',compact('info','departments','courses','students'));
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
        $data = $request->validate([
            'father_name'=>'required',
            'mother_name'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
            'course_id'=>'required',
            'department_id'=>'required',
            'student_id'=>'required',
            'phone_number'=>'required'
        ]);
        $info = Information::findOrFail($id);
        $info->father_name = $request->father_name;
        $info->mother_name = $request->mother_name;
        $info->phone_number = $request->phone_number;
        $info->present_address = $request->present_address;
        $info->permanent_address = $request->permanent_address;
        $info->course_id = $request->course_id;
        $info->student_id = $request->student_id;
        $info->department_id = $request->department_id;
        $info->save();

        Toastr::success('Successfully information Updated ','Success');
        return redirect('admin/info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Information::findOrFail($id);
        $info->delete();

        Toastr::error('Successfully information Deleted ','Success');
        return redirect()->back();
    }
}
