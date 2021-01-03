@extends('layouts.backend.master')
@section('title',' Student Dashboard')
@section('content')

<div class="row clearfix">
    <div class="col-xs-12 col-sm-8">
    
        <div class="card card-about-me">
            <div class="header">
                <h2>ABOUT ME</h2>
            </div>
            <div class="body">
                <ul>
                    <li>
                        <div class="title">
                            <i class="material-icons">library_books</i>
                            Personal Information
                        </div>
                        <div class="content">
                            <!-- @foreach($information as $inf) -->
                                <span>{{$inf->father_name}}</span>
                            <!-- @foreach -->
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">location_on</i>
                            Location
                        </div>
                        <div class="content">
                            Malibu, California
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">edit</i>
                            Skills
                        </div>
                        <div class="content">
                            <span class="label bg-red">UI Design</span>
                            <span class="label bg-teal">JavaScript</span>
                            <span class="label bg-blue">PHP</span>
                            <span class="label bg-amber">Node.js</span>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">notes</i>
                            Description
                        </div>
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  
</div>

@endsection