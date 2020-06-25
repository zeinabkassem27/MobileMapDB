<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expert_Company;

class ExpertCompanyController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expert_company = Expert_Company::all();

        if(!$expert_company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $expert_company 
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
        $expert_company = new Expert_Company();
        $expert_company->fill($inputs);
        $expert_company->save();

        if(!$expert_company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin was added',
            'data' => Expert_Company::all()
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
        $expert_company = Expert_Company::where('id', $id)->first();

        if(!$expert_company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No data was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $expert_company
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
        $expert_company = Expert_Company::where('id', $id)->first();
        if(!$expert_company){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update data of id=".$id 
            ], 500);
        }

        $expert_company->update($inputs);
        $expert_company->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Expert_Company::all()
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
        $expert_company = Expert_Company::where('id', $id)->delete();

        if(!$expert_company){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete data with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'data is id: $id is deleted',
            'data' => Expert_Company::all(),
        ], 200);
    }
}


