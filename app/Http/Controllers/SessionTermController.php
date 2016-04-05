<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Term;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\SessionManager;
use Input;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SessionTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Terms";
        $data['terms'] = Term::all();
        $data['sessions'] = Session::all();
        return view('admin.termsess.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSession()
    {
        $data['title'] = "New Session";
        return view('admin.termsess.newsession',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSession(Request $request)
    {
        $validator = Validator::make($request->all(),['name' =>'required|unique:sessions']) ;
        if ($validator->fails()) {
            return redirect('admin/new-session')
            ->withErrors($validator)
                ->withInput($request->all());
        }
        $request['status'] = 'active';
        $saveClass = Session::create($request->all());
        \Session::flash('flash_message','Session Successfully Added');
        return redirect('admin/new-session');

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
