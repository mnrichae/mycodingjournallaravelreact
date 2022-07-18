<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thought;
use Illuminate\Support\Facades\Validator;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $thoughts = thought::all();
        return response()->json(['status' => 200, 'thoughts' =>  $thoughts]);
        
    }

    public function delete($id){
        $thought = Thought::find($id);
        if ($thought){
            $thought->delete();
            return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
        } else {
            return response()->json(['status' => 404, 'message' => `Data not found! $id`]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Request $request){
        $validator = Validator::make($request->all(),
        ['entry'=>'required | max:200']);

        if($validator->fails()){
            return response()->json(['status'=>422, 'validate_err'=>$validator->errors()]);
        } else {
            $thought = new Thought();
            $thought->entry = $request->input('entry');
            $thought->save();
            return response()->json(['status'=>200, 'message'=>'Data Added Successfully']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id){
        $thought = Thought::find($id);
        if($thought){
            return response()->json(['status' => 200, 'thought' => $thought]);
        } else {
            return response()->json(['status' => 404, 'message' => `Data not found! $id`]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),
        ['entry'=>'required | max:200']);

        if($validator->fails()){
            return response()->json(['status'=> 422, 'validationErrors' => $validator->errors()]);
        } else {
            $thought = Thought::find($id);
            $thought->entry = $request->input('entry');
            $thought->update();
            return response()->json(['status'=>200, 'message'=>'Data Updated Successfully']);
        }
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
