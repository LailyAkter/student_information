@extends('layouts.backend.master')

@section('title','Information')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ url('admin/info/create') }}">
                <i class="material-icons">add</i>
                <span>Add New student Information</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL STUDENT INFORMATION
                            <span class="badge bg-blue">{{ $infos->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Present Address</th>
                                    <th>Parmanent Address</th>
                                    <th>Phone Number</th>
                                    <!-- <th>Department Name</th> -->
                                    <th>Course Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Present Address</th>
                                    <th>Parmanent Address</th>
                                    <th>Phone Number</th>
                                    <!-- <th>Department Name</th> -->
                                    <th>Course Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($infos as $key=>$info)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$info->user->name}}</td>
                                            <td>{{ $info->father_name }}</td>
                                            <td>{{ $info->mother_name }}</td>
                                            <td>{{ $info->present_address }}</td>
                                            <td>{{ $info->permanent_address }}</td>
                                            <td>{{ $info->phone_number }}</td>
                                            <!-- <td>{{ $info->department->department_name }}</td> -->
                                            <td>{{ $info->course->course_name }}</td>
                                            
                                            <td style='float:left'>
                                                <a href="{{ url('admin/info',$info->id.'/edit') }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <div style='float:right;margin-left:10px'>
                                                    <form action="{{url('admin/info',$info->id)}}" method='POST'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='submit' class="btn btn-danger btn-sm">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('admin/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('admin/js/pages/tables/jquery-datatable.js') }}"></script>

@endpush