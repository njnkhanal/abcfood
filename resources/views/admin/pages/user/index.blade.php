
@extends('admin.layouts.master')
@section('main-content')

<div class="container">
    <div style="text-align: right">
     <a href="{{ route('user.create') }}"><button type="button" name="add" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add User</button></a>
    </div>

<br>
<table id="user_table" class="table table-striped table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th> FIRST NAME</th>
        <th> LAST NAME</th>
        <th> EMAIL</th>
        <th> PHONE NUMBER</th>
        <th> IMAGE</th>
        <th> ROLE</th>
        <th> ACTION</th> 
        {{-- <th>
            <button type="button" name="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
        </th> --}}
    </tr>
</thead>
</table>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#user_table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax":"{{route('getUserData')}}",
              "columns":[
                { "data": "id" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "email" },
                { "data": "phone_number" },
                {"data":"image",orderable:false,searchable:false},
                {"data":"role",orderable:false,searchable:false},
                {"data":"action",orderable:false, searchable:false},
                // {"data":"checkbox",orderable:false,searchable:false}
              ]
            });
        
        });
        </script>
        
    

@endsection