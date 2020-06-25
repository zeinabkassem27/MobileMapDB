<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();

        if(!$company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No companies was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $company 
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
        $company = new Company();
        $company->fill($inputs);
        $company->save();

        if(!$company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No company was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'admin was added',
            'data' => Company::all()
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
        $company = Company::where('id', $id)->first();

        if(!$company){
            return response()->json([
                'status' => 'failed',
                'message' => 'No companies was founded with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'data' => $company
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
        $company = Company::where('id', $id)->first();
        if(!$company){
            return response()->json([
                'status' => 'failed',
                'message' => "could not update company of id=".$id 
            ], 500);
        }

        $company->update($inputs);
        $company->save();
        
       
        return response()->json([
            'status' => 'success',
            'data' => Company::all()
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
        $company = Company::where('id', $id)->delete();

        if(!$company){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete company with id='.$id  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'company is id: $id is deleted',
            'data' => Company::all(),
        ], 200);
    }
}

