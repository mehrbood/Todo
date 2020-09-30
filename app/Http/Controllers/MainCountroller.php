<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use PHPUnit\Framework\Constraint\Operator;

class MainCountroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function project()
    {
        
    }

    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = $request->input('operator');

        $valid = $request->validate([
            'pg_name' => 'required',
            'pg_time' => 'required',
            'pg_content' => 'required',
            'pg_point' => 'nullable',
            'operator' => 'nullable',
        ],[
            'pg_name.required' => 'نام پروژه',
            'pg_time.required' => 'زمان پروژه',
            'pg_content.required' => 'محتوای پروژه'
        ]);
        Project::create([
            'operation' => $valid['operator'],
            'name' => $valid['pg_name'],
            'time' => $valid['pg_time'],
           'content' => $valid['pg_content'],
           'point' => $valid['pg_point'],
        ]);
        
        return back();
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $project = Project::all();
        return view('data_table',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $valid = Project::findOrFail($id);
        return view('edit_table',['item' => $valid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $variable)
    {
        $valid = $request->validate([
            'pg_name' => 'required',
            'pg_content' => 'required',
            'pg_time' => 'required',
            'pg_point' => 'nullable',
        ],[
            'pg_name.required' => 'نام پروژه ',
            'pg_content.required' => 'محتوای پروژه ',
            'pg_time.required' => 'زمان پروژه '
        ]);
        $variable->update([
            'name' => $valid['pg_name'],
            'time' => $valid['pg_time'],
            'point' => $valid['pg_point'],
           'content' => $valid['pg_content'],
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $test)
    {
        //$vali = Project::findOrFail($id);
        $test->delete();
        return redirect('data_table');
    }

}
