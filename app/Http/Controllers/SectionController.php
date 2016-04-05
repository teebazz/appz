<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Teacher;
use App\Section;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'New Section';
        $data['classes'] = Classes::all();
        $data['teachers'] = Teacher::all();
        return view('admin.class.newsection',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request['teacher_id'])){
            $request['teacher_id'] = null;
        }
        $validator = Validator::make($request->all(),['name' =>'required|unique:sections|min:3','class_id'=>'required']) ;
        if ($validator->fails()) {
            return redirect('admin/new-section')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = Section::create($request->all());
        \Session::flash('flash_message','Section Successfully Added');
        return redirect('admin/new-class');
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
        $data['classes']    = DB::table('classes')->lists('name', 'id');
        $data['teachers']   = Teacher::select(DB::raw("CONCAT(firstname,' ', lastname) AS full_name, id"))->lists('full_name', 'id');
        $data['section'] = Section::findOrfail($id);
        $data['title'] = $data['section']->name;
        return view('admin.class.editsection',$data);
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
        $validator = Validator::make($input,['name' =>'required|min:3','class_id'=>'required']);
        if ($validator->fails()) {
           return redirect('admin/edit-section/'.$id)
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = Section::where('id', $id)->update($input);
        \Session::flash('flash_message','Section Details Successfully Updated');
        return redirect('admin/edit-section/'.$id)->withInput($request->all());
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
