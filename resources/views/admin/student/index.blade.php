@extends('admin.master')

@section('title',$title)

@section('pagescss')
<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12">
	    <div class="widget">
			<div class="widget-body no-padding">
			    <table class="table table-bordered table-hover table-striped" id="searchable">
			        <thead class="bordered-darkorange">
			            <tr role="row">
			                <th>Name</th>
			                <th>Class</th>
			                <th>Application Number</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>

			        <tfoot>
			            <tr>
			                <th rowspan="1" colspan="1"><input type="text" name="search_name" placeholder="Search Name" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_class" placeholder="Search Class" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_app_number" placeholder="Search Application Number" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_status" placeholder="Search statu" class="form-control input-sm"></th>
			        </tfoot>
			        <tbody>
			        	@foreach($students as $student)
			            <tr>
			                <td class=" sorting_1">{{ ucfirst($student->lastname) }} {{ ucfirst($student->firstname) }}</td>
			                <td class=" ">{{ $student->classy->name }}</td>
			                <td class=" ">{{ $student->app_number }}</td>
			                <td class="center ">{{$student->status}}</td>
			                <td class="center "> <a href="{{ url('admin/edit-student',$student->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a></td>
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