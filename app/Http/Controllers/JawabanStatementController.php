<?php

namespace App\Http\Controllers;

use App\Http\Requests\JawabanStatemetRequest;
use App\Http\Resources\Jawaban_StatementResource;
use App\Models\Jawaban_Statement;
use Illuminate\Http\Request;

class JawabanStatementController extends Controller
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

            $Jawaban_Statement = Jawaban_Statement::all();
           
            $Jawaban_StatementResource= Jawaban_StatementResource::collection($Jawaban_Statement);
                return $this->sendResponse($Jawaban_StatementResource, 'Successfully getAll data!');
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
    public function store(JawabanStatemetRequest $request)
    {
        //
        try{

            $validated = $request->validated();
    
            $Jawaban_Statement = Jawaban_Statement::create([
                "statement_text"=>$validated["statement_text"],
                "soal_id"=>$validated["soal_id"],
                "point"=>$validated["point"]

            ]);
    
            $Jawaban_StatementResource = new Jawaban_StatementResource($Jawaban_Statement);
            return $this->sendResponse($Jawaban_StatementResource, 'Succesfully Insert Option ');
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
    public function update(JawabanStatemetRequest $request, string $id)
    {
        //
        try{

            $Jawaban_Statement = Jawaban_Statement::find($id);
            $Jawaban_Statement ->statement_text = $request->statement_text;
            $Jawaban_Statement ->soal_id = $request->soal_id;
            $Jawaban_Statement ->point = $request->point;

            $Jawaban_Statement ->save();
            $Jawaban_StatementResource= new Jawaban_StatementResource($Jawaban_Statement);
                return $this->sendResponse($Jawaban_StatementResource, 'Successfully Updated!');
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

            $Jawaban_Statement = Jawaban_Statement::find($id);
            $Jawaban_Statement->delete();
            return $this->sendResponse('', 'Successfully delete!');
        }catch(\Exception $e){
         return  $this->sendError('delete failed', $e->getMessage());
         
        }
    }
}
