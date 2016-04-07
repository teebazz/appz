@extends('admin.master')

@section('title',$title)

@section('pagescss')
<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
@endsection

@section('content')
<?php
// var_dump($classes);

?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<a class="btn btn-success pull-left" href="{{ url('admin/new-class') }}"><i class="fa fa-plus"></i> Add New Class</a>
		<a class="btn btn-success pull-right" href="{{ url('admin/new-section') }}"><i class="fa fa-plus"></i> Add New Section</a>
		<hr>
	</div>
	<div class="col-xs-12 col-md-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-justified" id="myTab5">
                <li class="active">
                    <a data-toggle="tab" href="#home5">
                        Classes
                    </a>
                </li>

                <li class="tab-red">
                    <a data-toggle="tab" href="#profile5">
                       Sections
                    </a>
                </li>

            </ul>

            <div class="tab-content">
                <div id="home5" class="tab-pane in active">
                   <table class="table table-bordered table-hover table-striped" id="searchable">
			        <thead class="bordered-darkorange">
			            <tr role="row">
			                <th>Class Name</th>
			                <th>Order</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>

			        <tfoot>
			            <tr>
			                <th rowspan="1" colspan="1"><input type="text" name="search_name" placeholder="Search name" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_order" placeholder="Search order" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_status" placeholder="Search status" class="form-control input-sm"></th>
			            </tr>
			        </tfoot>
			        <tbody>
			        	@foreach($classes as $class)
			            <tr>
			                <td class=" sorting_1">{{ $class->name }}</td>
			                <td class="center ">{{ $class->order }}</td>
			                <td class="center ">{{ $class->status }}</td>
			                <td class="center "><a href="{{ url('admin/class-subject',$class->id)}}" class="btn btn-warning btn-xs edit"><i class="fa fa-server"></i> Manage Subjects</a> <a href="{{ url('admin/edit-class',$class->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a></td>
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
                </div>

                <div id="profile5" class="tab-pane">
                   <table class="table table-striped table-bordered table-hover" id="simpledatatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="text"></span>
                                                    </label>
                                                </th>
                                                <th>
                                                    Section Name
                                                </th>
                                                <th>
                                                    Class
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sections as $section)
                                            <tr>
                                                <td>
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="text"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $section->name }}</td>
                                                <td>{{ $section->classs->name}}</td>
                                                <td>{{ $section->status }}</td>
                                                <td class="center ">
                                                    <a href="{{ url('admin/edit-section',$section->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr>
                                           @endforeach
                                            
                                        </tbody>
                                    </table>
                </div>

            </div>
        </div>
    </div>

	<div class="col-xs-12 col-md-12">
	    <div class="widget">
			<div class="widget-body no-padding">
			    
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