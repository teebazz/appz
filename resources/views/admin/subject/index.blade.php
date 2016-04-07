@extends('admin.master')

@section('title',$title)

@section('pagescss')
<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
        <a class="btn btn-success pull-left" href="{{ url('admin/new-subject') }}"><i class="fa fa-plus"></i> Add New Subject</a>
        <hr>
    </div>
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-body no-padding">
                <table class="table table-bordered table-hover table-striped" id="searchable">
                    <thead class="bordered-darkorange">
                        <tr role="row">
                            <th>Name</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            <td class=" sorting_1">{{$subject->name}}</td>
                            <td class=" ">{{$subject->division->name}}</td>
                            <td class=" ">{{$subject->status}}</td>
                            <td class="center "><a href="{{ url('admin/edit-subject',$subject->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection




@section('extrajs')
<script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
    <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/datatable/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
        InitiateEditableDataTable.init();
        InitiateExpandableDataTable.init();
        InitiateSearchableDataTable.init();
    </script>
@endsection