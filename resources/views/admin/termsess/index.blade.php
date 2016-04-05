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
		<a class="btn btn-success pull-left"><i class="fa fa-plus"></i> Add New Term</a>
		<a class="btn btn-success pull-right" href="{{ url('admin/new-session') }}"><i class="fa fa-plus"></i> Add New Session</a>
		<hr>
	</div>
	<div class="col-xs-12 col-md-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-justified" id="myTab5">
                <li class="active">
                    <a data-toggle="tab" href="#home5">
                        Terms
                    </a>
                </li>

                <li class="tab-red">
                    <a data-toggle="tab" href="#profile5">
                       Session
                    </a>
                </li>

            </ul>

            <div class="tab-content">
                <div id="home5" class="tab-pane in active">
                   <table class="table table-bordered table-hover table-striped" >
			        <thead class="bordered-darkorange">
			            <tr role="row">
			                <th>Name</th>
			                <th>Status</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($terms as $term)
			            <tr>
			                <td class=" sorting_1">{{ $term->name }}</td>
			                <td class="center ">{{ $term->status }}</td>
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
                </div>

                <div id="profile5" class="tab-pane">
                   <table class="table table-bordered table-hover table-striped">
                                        <thead class="bordered-darkorange">
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sessions as $session)
                                            <tr>
                                                <td>{{ $session->name }}</td>
                                                <td>{{ $session->status }}</td>
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