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
            <div class="col-lg-9 col-sm-8 col-xs-12">
                <div class="widget flat radius-bordered">
                    <div class="widget-header bg-blue">
                        <span class="widget-caption">Registration Form</span>
                    </div>
                    <div class="widget-body">
                        <div id="registration-form">
                            <!-- <form role="form" action="{{url('/admin/new_teacher')}}" method="POST"> -->
                            {!! Form::open(['url' => 'admin/new-student','action'=>'post','role'=>'form','files' => true]) !!}
                                <div class="form-title">
                                    Personal Information
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('lastname',null,['class'=>'form-control','placeholder' => 'lastname']) !!}
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('firstname',null,['class'=>'form-control','placeholder' => 'Firstname']) !!}
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('othername',null,['class'=>'form-control','placeholder' => 'Othername']) !!}
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                 {!! Form::select('gender',[''=>'Select Gender','male'=>'male','female'=>'female'],'',['class' =>'form-control'])!!}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('birthdate',null,['class'=>'form-control date-picker','placeholder' => 'Birth Date', 'data-date-format' => 'dd-mm-yyyy', 'type' =>'text', 'id'=>'id-date-picker-1']) !!}
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('blood_group',null,['class'=>'form-control','placeholder' => 'Blood Group']) !!}
                                                <i class="fa fa-medkit"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <select class="form-control" name="parent_id" id="e1">
                                                    <option selected="selected" value="">Select Parent</option>
                                                    @foreach($parents as $parent)
                                                        <option value="{{$parent->id}}">{{$parent->user->lastname}} {{$parent->user->firstname}}</option>
                                                    @endforeach
                                                </select>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <select class="form-control" name="division_id" id="division">
                                                    <option selected="selected">Select Division</option>
                                                    @foreach($divisions as $divison)
                                                        <option value="{{$divison->id}}">{{$divison->name}}</option>
                                                    @endforeach
                                                </select>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <select class="form-control" name="class_id" id="class">
                                                    <option value="">Select Class</option>
                                                </select>

                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <select class="form-control" name="section_id" id="section">
                                                    <option value="">Select Section</option>
                                                </select>

                                            </span>
                                        </div>
                                    </div>
                                 </div>                            
                                <div class="form-title">
                                    User Information
                                </div>
                                <div class="form-group">
                                    <span class="input-icon icon-right">
                                        {!! Form::text('address',null,['class'=>'form-control','placeholder' => 'Address']) !!}
                                        <i class="glyphicon glyphicon-user circular"></i>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                 {!! Form::text('city',null,['class'=>'form-control','placeholder' => 'City']) !!}
                                                <i class="glyphicon glyphicon-globe"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <select class="form-control" name="state_id">
                                                    <option selected="selected" value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                 {!! Form::text('phone',null,['class'=>'form-control','placeholder' => 'Phone']) !!}
                                                <i class="glyphicon glyphicon-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                {!! Form::text('email',null,['class'=>'form-control','placeholder' => 'Email']) !!}
                                                <i class="fa fa-envelope-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="input-icon icon-right">
                                                <input type="file" name="photo" class="form-control">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                                <button type="submit" class="btn btn-blue">Register</button>
                             {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('extrajs')
<script type="text/javascript">
    $('#division').on('change', function(e){
        var id = $("select#division option:selected").attr('value');
        $('#class').html('<option value="">Select Class</option>');
          $.ajax({
            type: "GET",
            url: "admin/divisionclass/",
            data: "division_id="+id,
            dataType: 'json',
            cache: false,
            beforeSend: function () { 
                $('#class').html('');
            },
            success: function(data, textStatus, jQxhr) {    
                console.log(data);
                $('#class').append('<option value="">Select Class</option>');
                $.each(data,function (index,sectionObj) {
                     $('#class').append('<option value='+sectionObj.id+'>'+sectionObj.name+'</option>');
                })

            }

          });
  });
 $('#class').on('change', function(e){
          $('#section').html('<option value="">Select Section</option>');
          var id2 = $("select#class option:selected").attr('value');
          $.ajax({
            type: "GET",
            url: "admin/classsection/",
            data: "class_id="+id2,
            dataType: 'json',
            cache: false,
            beforeSend: function () { 
                $('#section').html('');
            },
            success: function(data, textStatus, jQxhr) {    
                console.log(data);
                $('#section').append('<option value="">Select Section</option>');
                $.each(data,function (index,sectionObj) {
                     $('#section').append('<option value='+sectionObj.id+'>'+sectionObj.name+'</option>');
                })

            }

    });
});
</script>
<script src="assets/js/select2/select2.js"></script>
<script src="assets/js/datetime/bootstrap-datepicker.js"></script>
<script>    
//--Jquery Select2--
        $("#e1").select2();
        $("#e2").select2({
            placeholder: "Select a State",
            allowClear: true
        });

        //--Bootstrap Date Picker--
        $('.date-picker').datepicker();
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
        $("#dateRulersExample").dateRangeSlider({
            bounds: { min: new Date(2012, 0, 1), max: new Date(2012, 11, 31, 12, 59, 59) },
            defaultValues: { min: new Date(2012, 1, 10), max: new Date(2012, 4, 22) },
            scales: [{
                first: function (value) { return value; },
                end: function (value) { return value; },
                next: function (value) {
                    var next = new Date(value);
                    return new Date(next.setMonth(value.getMonth() + 1));
                },
                label: function (value) {
                    return months[value.getMonth()];
                },
                format: function (tickContainer, tickStart, tickEnd) {
                    tickContainer.addClass("myCustomClass");
                }
            }]
        });
    </script>

@endsection
