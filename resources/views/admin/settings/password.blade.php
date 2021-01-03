@extends('layouts.backend.master')
@section('title','Password Change')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Password Change</h2>
            </div>
            <div class="body">
                <form action="{{url('admin/password/update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group form-float">
                        <div class='form-line'>
                            <input
                                type="password"
                                class="form-control"
                                name='old_password'
                            />
                            <label class="form-label">Old Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class='form-line'>
                            <input
                                type="password"
                                class="form-control"
                                name='password'
                            />
                            <label class="form-label">New Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class='form-line'>
                            <input
                                type="password"
                                class="form-control"
                                name='password_confirmation'
                            />
                            <label class="form-label">Confirm Password</label>
                        </div>
                    </div>
                    <button type='submit' class='btn btn-success'>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
