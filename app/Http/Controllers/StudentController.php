<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();

        return response()->json([
            'message' => 'Success Get Data',
            'status' => true,
            'data' => $data
        ]);
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
        $validator = Validator::make($request->all(), [
            'id_parent' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $data = Student::create($request->all());
        return response()->json([
            'message' => 'Success Store Data',
            'status' => true,
            'data' => $data
        ]);
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
        $data = Student::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_parent' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $data->update($request->all());
        return response()->json([
            'message' => 'Success Update Data',
            'status' => true,
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Success Delete'
        ]);
    }
}
