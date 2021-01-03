@extends('layouts.backend.master')

@section('title','Student')

@section('content')
    <div class="row">
        <div class="col-lg-10">
                <h2>ALL STUDENT</h2>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add Student</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" id="studentTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th width="280px">Action</th>
            </tr>
        </thead> 
        <tbody>
            @foreach ($students as $student)
                @if($student->role_id == 2 )
                <tr id="{{ $student->id }}">
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->password }}</td>
                    <td>
                        <a data-id="{{ $student->id }}" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="{{ $student->id }}" class="btn btn-danger btnDelete">Delete</button>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
 
 
<!-- Add Student Modal -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Student Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Student</h4>
            </div> 
            <div class="modal-body">
                <form id="addStudent" name="addStudent" action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtFirstName">Name</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Email</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
                    </div>
                    <div class="form-group">
                        <label for="txtPassword">Password</label>
                        <input type="text" class="form-control" id="txtPassword" placeholder="Enter Last Name" name="txtPassword">
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
<!-- Update Student Modal -->
<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Student Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Student</h4>
            </div>
            <div class="modal-body">
                <form id="updateStudent" name="updateStudent" action="{{ route('student.update') }}" method="post">
                    <input type="hidden" name="hdnStudentId" id="hdnStudentId"/>
                    @csrf
                    <div class="form-group">
                        <label for="txtFirstName">Name</label>
                        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
                    </div>
                    <div class="form-group">
                        <label for="txtLastName">Email</label>
                        <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
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
    $("#addStudent").validate({
        rules: {
            txtFirstName: "required",
            txtLastName: "required",
            txtPassword: "required"
        },
        messages: {
        },
    
        submitHandler: function(form) {
        var form_action = $("#addStudent").attr("action");
        $.ajax({
            data: $('#addStudent').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
            var student = '<tr id="'+data.id+'">';
            student += '<td>' + data.id + '</td>';
            student += '<td>' + data.name + '</td>';
            student += '<td>' + data.email + '</td>';
            student += '<td>' + data.password + '</td>';
            student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
            student += '</tr>';            
            $('#studentTable tbody').prepend(student);
            $('#addStudent')[0].reset();
            $('#addModal').modal('hide');
            },
            error: function (data) {
            }
        });
    }
 });
  
 
    //When click edit student
    $('body').on('click', '.btnEdit', function () {
      var student_id = $(this).attr('data-id');
      $.get('student/' + student_id +'/edit', function (data) {
          $('#updateModal').modal('show');
          $('#updateStudent #hdnStudentId').val(data.id); 
          $('#updateStudent #txtFirstName').val(data.name);
          $('#updateStudent #txtLastName').val(data.email);
      })
   });
    // Update the student
    $("#updateStudent").validate({
    rules: {
        txtFirstName: "required",
        txtLastName: "required",
    },
    messages: {
    },
 
    submitHandler: function(form) {
        var form_action = $("#updateStudent").attr("action");
        $.ajax({
            data: $('#updateStudent').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
            var student = '<td>' + data.id + '</td>';
            student += '<td>' + data.name + '</td>';
            student += '<td>' + data.email + '</td>';
            student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
            $('#studentTable tbody #'+ data.id).html(student);
            $('#updateStudent')[0].reset();
            $('#updateModal').modal('hide');
            },
            error: function (data) {
            }
        });
    }
 }); 
 
   //delete student
    $('body').on('click', '.btnDelete', function () {
        var student_id = $(this).attr('data-id');
        $.get('student/' + student_id +'/delete', function (data) {
            $('#studentTable tbody #'+ student_id).remove();
        })
    }); 
 
});   
</script>
@endsection