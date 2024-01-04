<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulRequest;
use App\Http\Resources\ModulResource;
use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
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

            $Modul = Modul::all();
           
            $ModulResource= ModulResource::collection($Modul);
                return $this->sendResponse($ModulResource, 'Successfully getAll data !');
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

            $Modul = Modul::find($id);
           
            $ModulResource= new ModulResource($Modul);
                return $this->sendResponse($ModulResource, 'Successfully get data By Id!');
        }catch(\Exception $e){
            return  $this->sendError('get data By Id failed', $e->getMessage());
        }
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModulRequest $request)
    {
        //
        try{

            $validatedData = $request->validated();
    
            // Create Modul
            $modul = Modul::create([
                'nama_modul' => $validatedData['nama_modul'],
                'test_id' =>  $validatedData['test_id'],
                'jumlah_soal_perModul' => $validatedData['jumlah_soal_perModul'],
            ]);
    
            $ModulResource = new ModulResource($modul);
            return $this->sendResponse($ModulResource, 'Succesfully Insert  ');
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
    public function update(ModulRequest $request, string $id)
    {
        //
        try{

            $Modul = Modul::find($id);
            $Modul ->nama_modul = $request->nama_modul;
            $Modul ->test_id = $request->test_id;
            $Modul ->jumlah_soal_perModul = $request->jumlah_soal_perModul;
            $Modul ->save();
            $ModulResource= new ModulResource($Modul);
                return $this->sendResponse($ModulResource, 'Successfully Updated!');
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

            $Modul = Modul::find($id);
            $Modul->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    }
}
