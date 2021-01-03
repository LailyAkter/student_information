@extends('layouts.backend.master')
@section('title','Profile Update')

@section('content')
    <section class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Profile Update</h2>
                    </div>
                    <div class="body">
                        <form action="{{url('student/profile/update')}}" method='post' enctype="multipart/form-data">
                        @csrf
                            <div class="form-group form-float">
                                <div class='form-line'>
                                    <input 
                                        type="text" 
                                        id="inputName" 
                                        class="form-control" 
                                        name='name'
                                        placeholder='Enter Your Name'
                                        value="{{Auth::user()->name}}"
                                    />
                                    <label class="form-label"> Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class='form-line'>
                                    <label>Image</label>
                                    <input 
                                        type="file" 
                                        id="inputName" 
                                        class="form-control" 
                                        name='image'
                                    />
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class='form-line'>
                                    <input 
                                        type="email" 
                                        id="inputName" 
                                        class="form-control" 
                                        name='email'
                                        placeholder='Enter Your Email'
                                        value="{{Auth::user()->email}}"
                                    />
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <button type='submit' class='btn btn-success'>Update Profile</button>
                            <a href="{{url('author/dashboard')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection