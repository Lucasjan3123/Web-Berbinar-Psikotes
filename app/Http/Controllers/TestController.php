<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Http\Resources\TestResource;
use Illuminate\Http\Request;
use App\Models\Test;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth:api');
     }
 
    public function index()
    {
        //
        try{

            $Test = Test::all();
           
            $TestResource= TestResource::collection($Test);
                return $this->sendResponse($TestResource, 'Successfully getAll data!');
        }catch(\Exception $e){
            return  $this->sendError('getAll data failed', $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{

            $Test = Test::find($id);
           
            $TestResource= new TestResource($Test);
                return $this->sendResponse($TestResource, 'Successfully get data By ID!');
        }catch(\Exception $e){
            return  $this->sendError('get data By Id failed', $e->getMessage());
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestRequest $request)
    {
        //
        try{

            $validatedData = $request->validated();
    
            // Create Test
            $test = Test::create([
                'nama_test' => $validatedData['nama_test'],
                'tanggal' => $validatedData['tanggal'],
                'waktu_tes' => $validatedData['waktu_tes'],
                'total_soal_perTes' => $validatedData['total_soal_perTes'],
                'tipe_test_id' => $validatedData['tipe_test_id'],
            ]);
    
            $TestResource = new TestResource($test);
            return $this->sendResponse($TestResource, 'Succesfully Insert  ');
        }catch(\Exception $e){
            return  $this->sendError('insert failed', $e->getMessage());
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestRequest $request, string $id)
    {
        //
        try{

            $Test = Test::find($id);
            $Test ->nama_test = $request->nama_test;
            $Test ->tanggal = $request->tanggal;
            $Test ->waktu_tes = $request->waktu_tes;
            $Test ->total_soal_perTes = $request->total_soal_perTes;
            $Test ->tipe_test_id = $request->tipe_test_id;
            $Test ->save();
            $TestResource= new TestResource($Test);
                return $this->sendResponse($TestResource, 'Successfully Updated!');
        }catch(\Exception $e){
            return  $this->sendError('Updated failed', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{

            $Test = Test::find($id);
            $Test->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    }
}
