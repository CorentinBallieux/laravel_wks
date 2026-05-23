<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('applications.index');
    }

    public function create()
    {
        return view('applications.create');
    }

    public function show($id)
    {
        return view('applications.show');
    }

    public function edit($id)
    {
        return view('applications.edit');
    }
}
