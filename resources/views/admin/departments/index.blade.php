@extends('layouts.backend.master')

@section('title','Department')

@section('content')
    <div class="row">
        <div class="col-lg-10">
                <h2>ALL DEPARTMENT</h2>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add Department</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" id="departmentTable">
        <thead>
            <tr>
                <th>id</th>
                <th>Department Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead> 
        <tbody>
                @foreach ($departments as $department)
                    <tr id="{{ $department->id }}">
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->department_name }}</td>
                        <td>
                            <a data-id="{{ $department->id }}" class="btn btn-primary btnEdit">Edit</a>
                            <a data-id="{{ $department->id }}" class="btn btn-danger btnDelete">Delete</button>
                        </td>
                    </tr>
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
            <h4 class="modal-title">Add New Department</h4>
        </div>
        <div class="modal-body">
            <form id="addDepartment" name="addDepartment" action="{{ route('department.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="txtDepartmentName">Department Name</label>
                    <input type="text" class="form-control" id="txtDepartmentName" placeholder="Enter Your Department" name="txtDepartmentName">
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
 
    <!-- Department Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Department</h4>
      </div>
   <div class="modal-body">
    <form id="updateDepartment" name="updateDepartment" action="{{ route('department.update') }}" method="post">
        <input type="hidden" name="hdnDepartmentId" id="hdnDepartmentId"/>
        @csrf
        <div class="form-group">
            <label for="txtDepartmentName">Department Name</label>
            <input type="text" class="form-control" id="txtDepartmentName" placeholder="Enter Department Name" name="txtDepartmentName">
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
 //Add the Department  
    $("#addDepartment").validate({
        rules: {
            txtDepartmentName: "required",
        },
        messages: {
        },
    
        submitHandler: function(form) {
        var form_action = $("#addDepartment").attr("action");
        $.ajax({
            data: $('#addDepartment').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function (data) {
            var department = '<tr id="'+data.id+'">';
            department += '<td>' + data.id + '</td>';
            department += '<td>' + data.department_name + '</td>';
            department += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
            department += '</tr>';            
            $('#departmentTable tbody').prepend(department);
            $('#addDepartment')[0].reset();
            $('#addModal').modal('hide');
            },
            error: function (data) {
            }
        });
    }
});
  
 
    //When click edit department
    $('body').on('click', '.btnEdit', function () {
      var department_id = $(this).attr('data-id');
      $.get('department/' + department_id +'/edit', function (data) {
          console.log(data);
          $('#updateModal').modal('show');
          $('#updateDepartment #hdnDepartmentId').val(data.id); 
          $('#updateDepartment #txtDepartmentName').val(data.department_name);
      })
   });
    // Update the department
 $("#updateDepartment").validate({
    rules: {
        txtDepartmentName: "required",
    },
    messages: {
    },
 
    submitHandler: function(form) {
    var form_action = $("#updateDepartment").attr("action");
    $.ajax({
        data: $('#updateDepartment').serialize(),
        url: form_action,
        type: "POST",
        dataType: 'json',
        success: function (data) {
        var department = '<td>' + data.id + '</td>';
        department += '<td>' + data.department_name + '</td>';
        department += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
        $('#departmentTable tbody #'+ data.id).html(department);
        $('#updateDepartment')[0].reset();
        $('#updateModal').modal('hide');
        },
        error: function (data) {
        }
    });
 }
 }); 
 
   //delete department
    $('body').on('click', '.btnDelete', function () {
        var department_id = $(this).attr('data-id');
        $.get('department/' + department_id +'/delete', function (data) {
            $('#departmentTable tbody #'+ department_id).remove();
        })
    }); 
 
});   
</script>
@endsection