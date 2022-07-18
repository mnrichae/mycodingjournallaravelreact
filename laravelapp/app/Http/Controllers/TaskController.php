<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tasks = task::all();
        return response()->json(['status' => 200, 'tasks' =>  $tasks]);
        
    }

    public function delete($id){
        $task = Task::find($id);
        if ($task){
            $task->delete();
            return response()->json(['status' => 200, 'message' => 'Task deleted successfully']);
        } else {
            return response()->json(['status' => 404, 'message' => `Task not found! $id`]);
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
            $task = new Task();
            $task->entry = $request->input('entry');
            $task->save();
            return response()->json(['status'=>200, 'message'=>'Task Added Successfully']);
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
        $task = Task::find($id);
        if($task){
            return response()->json(['status' => 200, 'task' => $task]);
        } else {
            return response()->json(['status' => 404, 'message' => `Product not found! $id`]);
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
            $task = Task::find($id);
            $task->entry = $request->input('entry');
            $task->update();
            return response()->json(['status'=>200, 'message'=>'Task Updated Successfully']);
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
