@extends('admin.master')

@section('title',$title)

@section('content')
 
            @if($errors->any())
            <ul class="alert alert-danger fade in">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
@if(isset($success))
    <div class="alert alert-dismissible alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span><span class="sr-only">Close</span></button>
        {{$success}}
    </div>
@endif
 <div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">Class Form</span>
                    </div>
                    <div class="widget-body">
                        <div>
                           {!! Form::open(['url' => 'admin/new-class','action'=>'post','role'=>'form']) !!}
                                <div class="form-group">
                                 	{!! Form::label('name','Class Name') !!}
            						{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'e.g BASIC ONE']) !!}
                                </div>
                                 <div class="form-group">
                                    <select class="form-control" name="division_id" id="e1">
                                                    <option selected="selected" value="">Select Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                 	{!! Form::label('order','Order') !!}
            						{!! Form::text('order',null,['class'=>'form-control','placeholder' => 'e.g 1,2']) !!}
                                </div>
                                {!! Form::submit('Add Class',['class' => 'btn btn-blue']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

