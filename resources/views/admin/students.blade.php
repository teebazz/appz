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
			                <th>Rendering engine</th>
			                <th>Browser</th>
			                <th>Platform(s)</th>
			                <th>Engine version</th>
			                <th>CSS grade</th>
			            </tr>
			        </thead>

			        <tfoot>
			            <tr>
			                <th rowspan="1" colspan="1"><input type="text" name="search_engine" placeholder="Search engines" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_browser" placeholder="Search browsers" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_platform" placeholder="Search platforms" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_version" placeholder="Search versions" class="form-control input-sm"></th>
			                <th rowspan="1" colspan="1"><input type="text" name="search_grade" placeholder="Search grades" class="form-control input-sm"></th>
			            </tr>
			        </tfoot>
			        <tbody>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Firefox 1.0</td>
			                <td class=" ">Win 98+ / OSX.2+</td>
			                <td class="center ">1.7</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Firefox 1.5</td>
			                <td class=" ">Win 98+ / OSX.2+</td>
			                <td class="center ">1.8</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Firefox 2.0</td>
			                <td class=" ">Win 98+ / OSX.2+</td>
			                <td class="center ">1.8</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Firefox 3.0</td>
			                <td class=" ">Win 2k+ / OSX.3+</td>
			                <td class="center ">1.9</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Camino 1.0</td>
			                <td class=" ">OSX.2+</td>
			                <td class="center ">1.8</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Camino 1.5</td>
			                <td class=" ">OSX.3+</td>
			                <td class="center ">1.8</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Netscape 7.2</td>
			                <td class=" ">Win 95+ / Mac OS 8.6-9.2</td>
			                <td class="center ">1.7</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Netscape Browser 8</td>
			                <td class=" ">Win 98SE+</td>
			                <td class="center ">1.7</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Netscape Navigator 9</td>
			                <td class=" ">Win 98+ / OSX.2+</td>
			                <td class="center ">1.8</td>
			                <td class="center ">A</td>
			            </tr>
			            <tr>
			                <td class=" sorting_1">Gecko</td>
			                <td class=" ">Mozilla 1.0</td>
			                <td class=" ">Win 95+ / OSX.1+</td>
			                <td class="center ">1</td>
			                <td class="center ">A</td>
			            </tr>
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