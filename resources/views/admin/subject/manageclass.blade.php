@extends('admin.master')

@section('title',$title)

@section('pagescss')
<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
@endsection

@section('content')
@if($errors->any())
            <ul class="alert alert-danger fade in">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
<div class="row">
    <div class="col-xs-12 col-md-12">
        <a class="btn btn-success pull-left"  data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-plus"></i> Add New Subject to {{ $title }}</a>
        <hr>
    </div>
    <div class="col-xs-12 col-md-12">
        <div class="widget">
            <div class="widget-body no-padding">
                <table class="table table-bordered table-hover table-striped" id="searchable">
                    <thead class="bordered-darkorange">
                        <tr role="row">
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    
                    <tbody>
                        @foreach($class_subjects as $class_subject)
                        <tr>
                            <td class=" sorting_1">{{$class_subject->subject->name}}</td>
                            <td class="center "><a href="{{ url('admin/edit-subject',$class_subject->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--LArge Modal Templates-->
    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">New Subject</h4>
                </div>
                 {!! Form::open(['url' => 'admin/new-class-subject','action'=>'post','role'=>'form']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <input type='hidden' name='class_id' value="{{$class_id}}">
                        <select class="form-control" name="subject_id" required>
                            <option selected="selected" value="">Select Subject</option>
                             @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <select class="form-control" name="teacher_id">
                            <option selected="selected" value="">Select Teacher</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{ucfirst($teacher->user->lastname)}} {{ucfirst($teacher->user->firstname)}}</option>
                            @endforeach
                        </select>
                     </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--End Large Modal Templates-->
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

    <script src="assets/js/bootbox/bootbox.js"></script>

@endsection