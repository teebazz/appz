<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use DB;
use Hash;
use App\User;
use App\Division;
use App\Student;
use App\Parents;
use App\Http\Requests;
use App\Http\Requests\createUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Students';
        $data['students'] = Student::all();
        return view('admin.student.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'New Student';
        $data['parents']    = Parents::all();
        $data['states']     = DB::table('states')->get();
        $data['classes']    = DB::table('classes')->orderBy('order')->get();
        $data['divisions']  = Division::all();
        return view('admin.student.new',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserRequest $request)
    {
        $file = $request->file('photo');
        $validator = Validator::make($request->all(),[
            'class_id' =>'required',
            'photo'    => 'required'
            ]);
        if(empty($request['section_id'])){
            $request['section_id'] = null;
        }
        if ($validator->fails()) {
           return redirect('admin/new-student')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $randpass          = '99999';
        $request['status'] = 'active';
        $request['password'] = Hash::make($randpass);
        $studentNumber = Student::count();
        $stdIncre      = $studentNumber + 1;
        $request['app_number'] = 'SAS'.str_pad($stdIncre, 5, '0', STR_PAD_LEFT);
        if ($request->file('photo')->isValid()) {
            $imageName = $request['app_number']. '.' .$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(base_path() . '/public/sitefiles/student_image/',$imageName);
            $request['image'] = $imageName;
        }
        $user = User::create($request->all());
        $input = $request->except('image','photo');
        $input['user_id'] = $user->id;
        $input['status'] = 'active';
        $saveClass = Student::create($input);
        $user->group()->attach('3');
        \Session::flash('flash_message','Student Successfully Created');
        return redirect('admin/students');
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
        // $data['student'] = Student::findOrfail($id);
        $data['studentsu'] =  DB::table('students')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->select('users.*', 'students.*')->where('students.id',$id)
            ->get();
        $data['student'] =  $data['studentsu'][0];
        $data['parents']    = DB::table('parents')->select(DB::raw("CONCAT(users.firstname,' ', users.lastname) AS full_name, parents.id"))->join('users', 'parents.user_id', '=', 'users.id')->lists('full_name', 'id');
        $data['title']      = $data['student']->lastname.' '.$data['student']->firstname;
        $class_id           = $data['student']->class_id;
        $data['sections']   = DB::table('sections')->where(['class_id'=>$class_id])->lists('name', 'id');
        $data['classes']   = DB::table('classes')->where(['division_id'=>$data['student']->division_id])->lists('name', 'id');
        $data['states']     = DB::table('states')->lists('name', 'id');
        $data['divisions']   = DB::table('divisions')->lists('name', 'id');
        return view('admin.student.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,createUserRequest $request)
    {
        $file = $request->file('photo');
        $data['student'] = Student::findOrfail($id);
        $validator = Validator::make($request->all(),[
            'class_id' =>'required'
            ]);
        if(empty($request['section_id'])){
            $request['section_id'] = null;
        }
        if ($validator->fails()) {
           return redirect('admin/edit-student/'.$id)
            ->withErrors($validator)
                ->withInput($request->all());
        }
        // $randpass          = '99999';
        $request['status'] = 'active';
        // $request['password'] = Hash::make($randpass);
        if ($request->hasFile('photo')) {
            $imageName = $data['student']->app_number. '.' .$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(base_path() . '/public/sitefiles/student_image/',$imageName);
            $request['image'] = $imageName;
        }
        $saveUser = User::where('id', $data['student']->user_id)->update($request->except('_token','parent_id','division_id','class_id','section_id'));

        $input = $request->only('parent_id','division_id','class_id','section_id');
        $input['status'] = 'active';
        $saveClass = Student::where('id', $id)->update($input);
        \Session::flash('flash_message','Student Successfully Updated');
        return redirect('admin/edit-student/'.$id);
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
