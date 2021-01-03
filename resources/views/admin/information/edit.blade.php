@extends('layouts.backend.master')

@section('title','Student Information')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Update Student Information
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/info',$info->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Student Name</label>
                                <select name="student_id" id="" class='form-control'>
                                    <option value="">Student Name</option>
                                    @foreach($students as $p)
                                    <option value="{{$p->id}}" {{$info->student_id ==$p->id?"selected":""}}>{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="textFatherName">Father Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="textFatherName" 
                                    placeholder="Enter father Name" 
                                    name="father_name"
                                    value="{{$info->father_name}}"
                                />
                                @if($errors->has('father_name'))
                                    <span class='text-danger'>Father Name is Required!</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="textMotherName">Mother Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="textMotherName" 
                                    placeholder="Enter mother Name" 
                                    name="mother_name"
                                    value="{{$info->mother_name}}"
                                />
                                @if($errors->has('mother_name'))
                                    <span class='text-danger'>Mother Name is Required!</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="textPresentAddress">Present Address</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="textPresentAddress" 
                                    placeholder="Enter Present Address" 
                                    name="present_address"
                                    value="{{$info->present_address}}"
                                />
                                @if($errors->has('present_address'))
                                    <span class='text-danger'>Present Address is Required!</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="textPermanentAddress">Permanent Address</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="textPermanentAddress" 
                                    placeholder="Enter Parmanent Address" 
                                    name="permanent_address"
                                    value="{{$info->permanent_address}}"
                                />
                                @if($errors->has('permanent_address'))
                                    <span class='text-danger'>Permanent Address is Required!</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="textPhoneNumber">Phone Number</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="phone_number" 
                                    placeholder="Enter Phone Number" 
                                    name="phone_number"
                                    value="{{$info->phone_number}}"
                                />
                                @if($errors->has('phone_number'))
                                    <span class='text-danger'>Phone Number is Required!</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Department Name</label>
                                <select name="department_id" id="" class='form-control'>
                                    <option value="">Department Name</option>
                                    @foreach($departments as $p)
                                    <option value="{{$p->id}}" {{$info->department_id ==$p->id?"selected":""}}>{{$p->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Course Name</label>
                                <select name="course_id" id="" class='form-control'>
                                    <option value="">Course Name</option>
                                    @foreach($courses as $p)
                                    <option value="{{$p->id}}" {{$info->course_id ==$p->id?"selected":""}}>{{$p->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ url('admin/tag') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush