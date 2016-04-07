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
                        <span class="widget-caption">Subject Form</span>
                    </div>
                    <div class="widget-body">
                        <div>
                            {!! Form::model($subject,['action' => 'post','url' =>['admin/edit-subject',$subject->id]])!!}
                                <div class="form-group">
                                 	{!! Form::label('name','Subject Name') !!}
            						{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'e.g Flora']) !!}
                                </div>
                                 <div class="form-group">
                                    {!! Form::select('division_id',$division,$subject->division_id,['class' =>'form-control'])!!}
                                 </div>
                                {!! Form::submit('Update Subject',['class' => 'btn btn-blue']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

