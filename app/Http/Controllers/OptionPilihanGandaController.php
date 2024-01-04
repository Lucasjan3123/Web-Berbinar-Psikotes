<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpsiPilihanGandaRequest;
use App\Http\Resources\OpsiPilihanGandaResource;
use App\Models\OpsiPilihanGanda;
use Illuminate\Http\Request;

class OptionPilihanGandaController extends Controller
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

            $OpsiPilihanGanda = OpsiPilihanGanda::all();
           
            $OpsiPilihanGandaResource= OpsiPilihanGandaResource::collection($OpsiPilihanGanda);
                return $this->sendResponse($OpsiPilihanGandaResource, 'Successfully getAll data!');
        }catch(\Exception $e){
            return  $this->sendError('getAll data failed', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpsiPilihanGandaRequest $request)
    {
        //
        try{

            $validated = $request->validated();
    
            $OpsiPilihanGanda = OpsiPilihanGanda::create([
                "option_text"=>$validated["option_text"],
                "soal_id"=>$validated["soal_id"],
                "point"=>$validated["point"]

            ]);
    
            $OptionPilihanGandaResource = new OpsiPilihanGandaResource($OpsiPilihanGanda);
            return $this->sendResponse($OptionPilihanGandaResource, 'Succesfully Insert Option ');
        }catch(\Exception $e){
            return  $this->sendError('insert failed', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(OpsiPilihanGandaRequest $request, string $id)
    {
        //
        try{

            $OptionPilihanGanda = OpsiPilihanGanda::find($id);
            $OptionPilihanGanda ->option_text = $request->option_text;
            $OptionPilihanGanda ->soal_id = $request->soal_id;
            $OptionPilihanGanda ->point = $request->point;
            $OptionPilihanGanda ->save();
            $OptionPilihanGandaResource= new OpsiPilihanGandaResource($OptionPilihanGanda);
                return $this->sendResponse($OptionPilihanGandaResource, 'Successfully Updated!');
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

            $OptionPilihanGanda = OpsiPilihanGanda::find($id);
            $OptionPilihanGanda->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    
    }
}
