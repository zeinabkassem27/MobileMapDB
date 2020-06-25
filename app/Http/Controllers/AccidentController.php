<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accident;

class AccidentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accident = Accident::all();

        if(!$accident){
            return response()->json([
                'status' => 'failed',
                'message' => 'No accident was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident 
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
        $accident = new Accident();
        $accident->fill($inputs);
        $accident->save();

        if(!$accident){
            return response()->json([
                'status' => 'failed',
                'message' => 'No accident was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'accident was added',
            'data' => Accident::all()
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
        $accident = Accident::where('id', $id)->first();

        if(!$accident){
            return response()->json([
                'status' => 'failed',
                'message' => 'No accidents was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident
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
        $accident = Accident::where('id', $id)->first();
        if(!$accident){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update accident of id=".$id 
            ], 500);
        }

        $accident->update($inputs);
        $accident->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Accident::all()
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
        $accident = Accident::where('id', $id)->delete();

        if(!$accident){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete accident with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'accident with id: $id is deleted',
            'data' => Accident::all(),
        ], 200);
    }
}


