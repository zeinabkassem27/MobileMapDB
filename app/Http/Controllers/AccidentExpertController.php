<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accident_Expert;

class AccidentExpertController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accident_expert = Accident_Expert::all();

        if(!$accident_expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident_expert 
        ], 200);
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
        $inputs = $request->all();
        $accident_expert = new Accident_Expert();
        $accident_expert->fill($inputs);
        $accident_expert->save();

        if(!$accident_expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin was added',
            'data' => Accident_Expert::all()
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accident_expert = Accident_Expert::where('id', $id)->first();

        if(!$accident_expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident_expert
        ], 200);
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
        $inputs = $request->all();
        $accident_expert = Accident_Expert::where('id', $id)->first();
        if(!$accident_expert){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update data of id=".$id 
            ], 500);
        }

        $accident_expert->update($inputs);
        $accident_expert->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Accident_Expert::all()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accident_expert = Accident_Expert::where('id', $id)->delete();

        if(!$accident_expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete data with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'data is id: $id is deleted',
            'data' => Accident_Expert::all(),
        ], 200);
    }
}

