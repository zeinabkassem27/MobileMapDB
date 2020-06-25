<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expert;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expert = Expert::all();

        if(!$expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No experts was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $expert 
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
        $expert = new Expert();
        $expert->fill($inputs);
        $expert->save();

        if(!$expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No expert was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'expert was added',
            'data' => Expert::all()
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
        $expert = Expert::where('id', $id)->first();

        if(!$expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'No experts was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $expert
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
        $expert = Expert::where('id', $id)->first();
        if(!$expert){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update expert of id=".$id 
            ], 500);
        }

        $expert->update($inputs);
        $expert->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Expert::all()
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
        $expert = Expert::where('id', $id)->delete();

        if(!$expert){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete expert with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'expert with id: $id is deleted',
            'data' => Expert::all(),
        ], 200);
    }
}

