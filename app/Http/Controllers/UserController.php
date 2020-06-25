<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::all();

        if(!$admin){
            return response()->json([
                'status' => 'failed',
                'message' => 'No admin was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $admin 
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
        $admin = new User();
        $admin->fill($inputs);
        $admin->save();

        if(!$admin){
            return response()->json([
                'status' => 'failed',
                'message' => 'No admin was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin was added',
            'data' => User::all()
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
        $admin = User::where('id', $id)->first();

        if(!$admin){
            return response()->json([
                'status' => 'failed',
                'message' => '  No admin was founded with id='.$id
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $admin
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
        $admin = User::where('id', $id)->first();
        if(!$admin){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update admin of id=".$id 
            ], 500);
        }

        $admin->update($inputs);
        $admin->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => User::all()
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
        $admin = User::where('id', $id)->delete();

        if(!$admin){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete admin with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin is id: $id is deleted',
            'data' => User::all(),
        ], 200);
    }
}
