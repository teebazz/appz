<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Classes;
use App\Division;
use App\Section;
use Input;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Classes';       
        $data['classes'] = Classes::all();
        $data['sections'] = Section::with('classs')->get();
        return view('admin.class.index',$data);
        // $d = DB::table('classes')->where(['status'=>'active'])->get();
        // dd($d);
    }


    public function create()
    {
        $data['title'] = 'New Class';
        $data['divisions'] = Division::all();
        return view('admin.class.newclass',$data);
    }

    
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),['name' =>'required|unique:classes','order'=>'required']) ;
        if ($validator->fails()) {
            return redirect('admin/new-class')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = Classes::create($request->all());
        \Session::flash('flash_message','Class Successfully Added');
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
        $data['class'] = Classes::findOrfail($id);
        $data['title'] = $data['class']->name;
        return view('admin.class.editclass',$data);
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

    public function sectionClass()
    {
        $class_id   = Input::get('class_id');
        $classes    = Section::where('class_id', '=', $class_id)
                          ->get();
        return Response::json($classes);
    }

    public function divisionClass()
    {
        $division_id = '1';
        $divisions = Classes::where('division_id','=', $division_id)
                          ->get();
        return Response::json($divisions);
    }
}
