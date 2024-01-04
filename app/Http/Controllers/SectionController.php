<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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

            $Section = Section::all();
           
            $SectionResource= SectionResource::collection($Section);
                return $this->sendResponse($SectionResource, 'Successfully getAll data!');
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

            $Section = Section::find($id);
           
            $SectionResource= new SectionResource($Section);
                return $this->sendResponse($SectionResource, 'Successfully get data By Id!');
        }catch(\Exception $e){
            return  $this->sendError('get data By Id failed', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        //
        try{

            $validatedData = $request->validated();
    
            // Create Modul
            $Section = Section::create([
                'nama_section' => $validatedData['nama_section'],
                'jumlah_soal_perSection' => $validatedData['jumlah_soal_perSection'],
                'modul_id' => $validatedData['modul_id'],
            ]);
    
            $SectionResource = new SectionResource($Section);
            return $this->sendResponse($SectionResource, 'Succesfully Insert  ');
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
    public function update(SectionRequest $request, string $id)
    {
        //
        try{

            $Section = Section::find($id);
            $Section ->nama_section = $request->nama_section;
            $Section ->modul_id = $request->modul_id;
            $Section ->jumlah_soal_perSection = $request->jumlah_soal_perSection;
            $Section ->save();
            $SectionResource= new SectionResource($Section);
                return $this->sendResponse($SectionResource, 'Successfully Updated!');
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

            $Section = Section::find($id);
            $Section->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    }
}
