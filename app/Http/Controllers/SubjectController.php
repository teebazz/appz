<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Division;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\SessionManager;
use Input;
use DB;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Subject';
        $data['subjects'] = Subject::all();
        return view('admin.subject.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'New Subject';
        $data['divisions'] = Division::all();
        return view('admin.subject.new',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = DB::table('subjects')->where(['name'=>$request['name'],'division_id' => $request['division_id']])->count();
        if($check > 0){
             return redirect('admin/new-subject')
            ->withErrors('Subject Already Exist For Selected Division')
                ->withInput($request->all());
        }
        $validator = Validator::make($request->all(),
            [   'name' =>'required',
                'division_id'=>'required']
        );
        if($validator->fails()) {
            return redirect('admin/new-subject')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = Subject::create($request->all());
        \Session::flash('flash_message','Subject Successfully Added');
        return redirect('admin/subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['subject'] = Subject::findOrFail($id);
        $data['title']   = $data['subject']->name;
        $data['division'] = Division::all()->lists('name','id');
        return view('admin.subject.edit',$data);
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
        $validator = Validator::make($input,['name' =>'required|min:3','division_id'=>'required']);
        if($validator->fails()) {
           return redirect('admin/edit-subject/'.$id)
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $check = DB::table('subjects')->where(['name'=>$request['name'],'division_id' => $request['division_id']])->where('id','!=',$id)->count();
        if($check > 0) {
           return redirect('admin/edit-subject/'.$id)
            ->withErrors("Subject Already Exist For Another Division")
                ->withInput($request->all());
        }
        

        $request['status'] = 'active';
        $saveClass = Subject::where('id', $id)->update($input);
        \Session::flash('flash_message','Subject Details Successfully Updated');
        return redirect('admin/edit-subject/'.$id)->withInput($request->all());
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
