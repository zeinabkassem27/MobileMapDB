<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();

        if(!$image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No images was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $image 
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
        $image = new Image();
        $image->fill($inputs);
        $image->save();

        if(!$image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No image was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'image was added',
            'data' => Image::all()
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
        $image = Image::where('id', $id)->first();

        if(!$image){
            return response()->json([
                'status' => 'failed',
                'message' => 'No image was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $image
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
        $image = Image::where('id', $id)->first();
        if(!$image){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update image of id=".$id 
            ], 500);
        }

        $image->update($inputs);
        $image->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Image::all()
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
        $image = Image::where('id', $id)->delete();

        if(!$image){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete image with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'image with id: $id is deleted',
            'data' => Image::all(),
        ], 200);
    }
}


