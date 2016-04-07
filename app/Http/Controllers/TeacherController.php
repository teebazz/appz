<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use Illuminate\Session\SessionManager;
use DB;
use Hash;
use App\Http\Requests\createUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Teachers';       
        $data['teachers'] = Teacher::all();
        return view('admin.teacher.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'New Teacher';
        $data['states'] = DB::table('states')->get();
        return view('admin.teacher.new',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'email' =>'required|unique:users',
            'phone' =>'required|unique:users',
        ]);
        if ($validator->fails()) {
           return redirect('admin/new-teacher')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $randpass          = '99999';
        $request['status'] = 'active';
        $request['password'] = Hash::make($randpass);
        $saveUser   = User::create($request->all());
        $userr['user_id'] = $saveUser->id;
        $saveUser->group()->attach('2');
        $userr['status'] = 'active';
        $saveClass  = Teacher::create($userr);
        \Session::flash('flash_message','Teacher Successfully Created');
        return redirect('admin/teachers');
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
        $data['teachersu'] =  DB::table('teachers')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->select('users.*', 'teachers.*')->where('teachers.id',$id)
            ->get();
        $data['teacher'] = $data['teachersu'][0];
        $data['title']   = $data['teacher']->lastname.' '.$data['teacher']->firstname;
        $data['states']  = DB::table('states')->lists('name', 'id');
        return view('admin.teacher.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createUserRequest $request, $id)
    {
        $data['teacher'] = Teacher::findOrfail($id);
        $request['user_id'] = $data['teacher']->user_id;
        $input = $request->only('user_id');
        $validator = Validator::make($request->all(),[
            'email' =>'required|unique:users,email,'.$data['teacher']->user_id,
            ]);
        if ($validator->fails()) {
           return redirect('admin/edit-teacher/'.$id)
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveUser = User::where('id', $data['teacher']->user_id)->update($request->except('_token','photo','user_id'));
        $saveClass = Teacher::where('id', $id)->update($input);
        \Session::flash('flash_message','Teacher\'s Details Successfully Updated');
        return redirect('admin/edit-teacher/'.$id)->withInput($request->all());
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
