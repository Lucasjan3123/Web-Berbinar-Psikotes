<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipeTestRequest;
use App\Models\TipeTest;
use App\Http\Resources\TipeTestResource;

class TipeTestController extends Controller
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

            $tipeTest = TipeTest::all();
           
            $TipeTestResource= TipeTestResource::collection($tipeTest);
                return $this->sendResponse($TipeTestResource, 'Successfully getAll data!');
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

            $tipeTest = TipeTest::find($id);
           
            $TipeTestResource= new TipeTestResource($tipeTest);
                return $this->sendResponse($TipeTestResource, 'Successfully get data By id!');
        }catch(\Exception $e){
            return  $this->sendError('get data failed By id', $e->getMessage());
        }

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(TipeTestRequest $request)
    {
        //
        try{

            $validated = $request->validated();
    
            $tipeTest = TipeTest::create([
                'nama_tipeTest' => $validated['nama_tipeTest'],
                // Add other fields as needed
            ]);
    
            $TipeTestResource= new TipeTestResource($tipeTest);
                return $this->sendResponse($TipeTestResource, 'Successfully insert!');
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
    public function update(TipeTestRequest $request, string $id)
    {
        //
        try{

            $tipeTest = TipeTest::find($id);
            $tipeTest ->nama_tipeTest  = $request->nama_tipeTest;
            $tipeTest ->save();
            $TipeTestResource= new TipeTestResource($tipeTest);
                return $this->sendResponse($TipeTestResource, 'Successfully Updated!');
        }catch(\Exception $e){
            return  $this->sendError('Update failed', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try{

            $tipeTest = TipeTest::find($id);
            $tipeTest->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    }
}
