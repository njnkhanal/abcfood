@extends('admin.layouts.master')

@section('main-content')
    <div class="container">
        <div style="text-align: right">
            <a href="{{ route('food.create') }}">
                <button type="button" name="add" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add Food</button>
            </a>
        </div>

        <br>
        <table id="food_table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>FOOD NAME</th>
                    <th>FOOD PRICE</th>
                    <th>FOOD DESCRIPTION</th>
                    <th>IMAGE</th>
                    <th>STATUS</th>
                    <th>CATEGORY_ID</th>
                    <th>ACTION</th>
                    {{-- <th>
                        <button type="button" name="bulk_delete" class="btn btn-danger btn-xs"><i class="bi bi-backspace-reverse-fill"></i></button>
                    </th> --}}
                </tr>
            </thead>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#food_table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax":"{{route('admin.getFoodData')}}",
              "columns":[
                // {"data":"id"},
                {"data":"food_name"},
                {"data":"food_price"},
                {"data":"description",orderable:false,searchable:false},
                {"data":"image",orderable:false,searchable:false},
                {"data":"availability_status"},
                {"data":"category_id"},
                {"data":"action",orderable:false, searchable:false},
              ]
            });
    
        });
    </script>
@endsection
