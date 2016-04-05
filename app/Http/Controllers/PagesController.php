<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master');
    }

    public function students()
    {
        $data['title'] = 'Students';
        return view('admin.students',$data);
    }
    public function newClass()
    {
        $data['title'] = 'New Class';
        return view('admin.newclass',$data);
    }
}
