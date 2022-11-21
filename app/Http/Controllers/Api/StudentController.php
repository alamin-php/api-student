<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('students')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'section_id'=>'required',
            'name'=>'required|string|max:255',
            'roll'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'password'=>'required|string|max:255',
            'photo'=>'required|string|max:255',
            'gender'=>'required|string|max:255',
        ]);
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['roll'] = $request->roll;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['gender'] = $request->gender;
        DB::table('students')->insert($data);
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
        $showStudent = DB::table('students')->where('id', $id)->first();
        return response()->json($showStudent);
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
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['roll'] = $request->roll;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $request->photo;
        $data['gender'] = $request->gender;
        DB::table('students')->where('id', $id)->update($data);
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
        $stdImage = DB::table('students')->where('id', $id)->first();
        $imagePath=$stdImage->photo;
        unlink($imagePath);
        DB::table('students')->where('id', $id)->delete();
        return response()->json('deleted');
    }
}
