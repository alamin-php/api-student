<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = DB::table('sections')->get();
        return response()->json($section);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'class_id'=>'required',
            'section_name'=>'required|string|max:255',
        ]);
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_name'] = $request->section_name;
        DB::table('sections')->insert($data);
        return response()->json('Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showdata = DB::table('sections')->where('id', $id)->first();
        return response()->json($showdata);
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
        $validation = $request->validate([
            'class_id'=>'required',
            'section_name'=>'required|string|max:255',
        ]);
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_name'] = $request->section_name;
        DB::table('sections')->where('id', $id)->update($data);
        return response()->json('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sections')->where('id', $id)->delete();
        return response()->json('Deleted');
    }
}
