@extends('admin.layouts.master')
@section('main-content')
<div class="container">
    <div style="text-align: right">
     <a href="{{route('addCategory')}}"><button type="button" name="add" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add Category</button></a>
    </div>

<br>
<table id="category_table" class="table table-striped table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>ACTION</th>
        {{-- <th>
            <button type="button" name="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
        </th> --}}
    </tr>
</thead>
</table>
</div>
<script type="text/javascript">
$(document).ready(function() {
     $('#category_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('getdata') }}",
        "columns":[
            { "data": "id" },
            { "data": "name" },
            { "data": "action", orderable:false, searchable: false},
            // { "data":"checkbox", orderable:false, searchable:false}
        ]
     });
});
</script>

@endsection