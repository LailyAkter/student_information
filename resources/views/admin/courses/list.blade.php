@extends('layouts.backend.master')

@section('title','Course')

@section('content')
    <div class="row">
        <div class="col-lg-10">
                <h2>ALL Course</h2>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add Course</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" id="courseTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th width="280px">Action</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($courses as $course)
                <tr id="{{ $course->id }}">
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>
                        <a data-id="{{ $course->id }}" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="{{ $course->id }}" class="btn btn-danger btnDelete">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
 
<!-- Add Course Modal -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Course Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Course</h4>
            </div> 
            <div class="modal-body">
                <form id="addCourse" name="addCourse" action="{{ route('course.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtCourseName">Course Name</label>
                        <input type="text" class="form-control" id="txtCourseName" placeholder="Enter Course Name" name="txtCourseName">
                    </div>
                    <div class="form-group">
                        <label for="txtCourseCode">Course Code</label>
                        <input type="text" class="form-control" id="txtCourseCode" placeholder="Enter Course Code" name="txtCourseCode">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
<!-- Update course Modal -->
<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- course Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Course</h4>
            </div>
            <div class="modal-body">
                <form id="updateCourse" name="updateCourse" action="{{ route('course.update') }}" method="post">
                    <input type="hidden" name="hdnCourseId" id="hdnCourseId"/>
                    @csrf
                    <div class="form-group">
                        <label for="txtCourseName">Course Name</label>
                        <input type="text" class="form-control" id="txtCourseName" placeholder="Enter Course Name" name="txtCourseName">
                    </div>
                    <div class="form-group">
                        <label for="txtCourseCode">Course Code</label>
                        <input type="text" class="form-control" id="txtCourseCode" placeholder="Enter Course Code" name="txtCourseCode">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
 
<script>
  $(document).ready(function () {
    //Add the Student  
    $("#addCourse").validate({
        rules: {
            txtCourseName: "required",
            txtCourseCode: "required",
        },
        messages: {
        },
    
        submitHandler: function(form) {
        var form_action = $("#addCourse").attr("action");
        $.ajax({
            data: $('#addCourse').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
            var course = '<tr id="'+data.id+'">';
            course += '<td>' + data.id + '</td>';
            course += '<td>' + data.course_name + '</td>';
            course += '<td>' + data.course_code + '</td>';
            course += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
            course += '</tr>';            
            $('#courseTable tbody').prepend(course);
            $('#addCourse')[0].reset();
            $('#addModal').modal('hide');
            },
            error: function (data) {
            }
        });
    }
 });
  
 
    //When click edit Course
    $('body').on('click', '.btnEdit', function () {
      var course_id = $(this).attr('data-id');
      $.get('course/' + course_id +'/edit', function (data) {
          $('#updateModal').modal('show');
          $('#updateCourse #hdnCourseId').val(data.id); 
          $('#updateCourse #txtCourseName').val(data.course_name);
          $('#updateCourse #txtCourseCode').val(data.course_code);
      })
   });
    // Update the course
    $("#updateCourse").validate({
    rules: {
        txtCourseName: "required",
        txtCourseCode: "required",
    },
    messages: {
    },
 
    submitHandler: function(form) {
        var form_action = $("#updateCourse").attr("action");
        $.ajax({
            data: $('#updateCourse').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
            var course = '<td>' + data.id + '</td>';
            course += '<td>' + data.course_name + '</td>';
            course += '<td>' + data.course_code + '</td>';
            course += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
            $('#courseTable tbody #'+ data.id).html(course);
            $('#updateCourse')[0].reset();
            $('#updateModal').modal('hide');
            },
            error: function (data) {
            }
        });
    }
 }); 
 
   //delete student
    $('body').on('click', '.btnDelete', function () {
        var course_id = $(this).attr('data-id');
        $.get('course/' + course_id +'/delete', function (data) {
            $('#courseTable tbody #'+ course_id).remove();
        })
    }); 
 
});   
</script>
@endsection