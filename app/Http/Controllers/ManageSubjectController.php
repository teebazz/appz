<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Teacher;
use App\ClassSubject;
use App\Division;
use App\Classes;
use Illuminate\Session\SessionManager;
use Input;
use DB;
use Illuminate\Support\Facades\Validator;

class ManageSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['class_subjects'] = ClassSubject::where('class_id', $id)->get();
        $data['title']          = Classes::find($id)->name;
        $data['division']       = Classes::find($id)->division_id;
        $data['class_id']      = $id;
        $data['subjects']      = Subject::where('division_id',$data['division'])->get();
        $data['teachers']      = Teacher::all();
        return view('admin.subject.manageclass',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if(empty($request['teacher_id'])){
            $request['teacher_id'] = null;
        }
        $check = DB::table('class_subject')->where(['class_id'=>$request['class_id'],'subject_id' => $request['subject_id']])->count();
        $validator = Validator::make($request->all(),['subject_id' =>'required']) ;
        if ($validator->fails()) {
            return redirect('admin/class-subject/'.$request['class_id'])
            ->withErrors($validator)
                ->withInput($request->all());
        }
        if ($check > 0) {
            return redirect('admin/class-subject/'.$request['class_id'])
            ->withErrors('Subject Already Added To this Class')
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = ClassSubject::create($request->all());
        \Session::flash('flash_message','Subject Successfully Added to Class');
        return redirect('admin/class-subject/'.$request['class_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
