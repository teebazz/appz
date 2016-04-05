<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Session\SessionManager;
use DB;
use Hash;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' =>'required|unique:teachers',
            'phone' =>'required|unique:teachers',
            'firstname' =>'required|min:3',
            'lastname' =>'required|min:3',
            'birthdate' =>'required',
            'address' =>'required',
            'gender' =>'required',
            'state_id' =>'required'
            ]);
        if ($validator->fails()) {
           return redirect('admin/new-teacher')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $randpass          = '99999';
        $request['status'] = 'active';
        $request['password'] = Hash::make($randpass);
        $saveClass = Teacher::create($request->all());
        \Session::flash('flash_message','Teacher Successfully Created');
        return redirect('admin/new-teacher');
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
        $data['teacher'] = Teacher::findOrfail($id);
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
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input,[
            'firstname' =>'required|min:3',
            'lastname' =>'required|min:3',
            'email' =>'required|unique:teachers,email,'.$id,
            'birthdate' =>'required',
            'address' =>'required',
            'gender' =>'required',
            'state_id' =>'required'
            ]);
        if ($validator->fails()) {
           return redirect('admin/edit-teacher/'.$id)
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
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
