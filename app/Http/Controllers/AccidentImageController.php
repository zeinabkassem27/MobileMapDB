<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accident_Image;

class AccidentImageController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accident_image = Accident_Image::all();

        if(!$accident_image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident_image 
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
        $accident_image = new Accident_Image();
        $accident_image->fill($inputs);
        $accident_image->save();

        if(!$accident_image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin was added',
            'data' => Accident_Image::all()
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
        $accident_image = Accident_Image::where('id', $id)->first();

        if(!$accident_image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $accident_image
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
        $accident_image = Accident_Image::where('id', $id)->first();
        if(!$accident_image){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update data of id=".$id 
            ], 500);
        }

        $accident_image->update($inputs);
        $accident_image->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Accident_Image::all()
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
        $accident_image = Accident_Image::where('id', $id)->delete();

        if(!$accident_image){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete data with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'data is id: $id is deleted',
            'data' => Accident_Image::all(),
        ], 200);
    }
}
