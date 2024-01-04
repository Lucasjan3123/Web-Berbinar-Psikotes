<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoalTestRequest;
use App\Http\Resources\SoalTestResource;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function getAllSoal(){

        try{

            $Soal = Soal::all();
           
            $SoalTestResource= SoalTestResource::collection($Soal);
                return $this->sendResponse($SoalTestResource, 'Successfully getAll data!');
        }catch(\Exception $e){
            return  $this->sendError('getAll data failed', $e->getMessage());
        }

    }

    public function getSoalById(string $id){

        try{

            $Soal = Soal::find($id);
           
            $SoalTestResource= new SoalTestResource($Soal);
                return $this->sendResponse($SoalTestResource, 'Successfully get data!');
        }catch(\Exception $e){
            return  $this->sendError('get data failed', $e->getMessage());
        }

    }

    public function createTest(SoalTestRequest $request)
    {

        try{

            // Validate input using the request file
            $validatedData = $request->validated();

            $test_id = $validatedData['test_id'] ?? null;
            $modul_id = $validatedData['modul_id'] ?? null;
            $section_id = $validatedData['section_id'] ?? null;
    
            // Create Soal
            $soal =Soal::create([
                'test_id' => $test_id,
                'modul_id' => $modul_id,
                'section_id' => $section_id,
                'pertanyaan' => $validatedData['pertanyaan'],
                'jawaban_benar' => $validatedData['jawaban_benar'],
            ]);
    
            $SoalTestResource = new SoalTestResource($soal);
            return $this->sendResponse($SoalTestResource, 'Successfully insert!');
        }catch(\Exception $e){
            return  $this->sendError('insert failed', $e->getMessage());
        }


    }

    public function updateTest(SoalTestRequest $request, $id)
    {
        try {
            
            $soal = Soal::find($id);
            $soal->test_id = $request->has('test_id') ? $request->test_id : null;
            $soal->modul_id = $request->has('modul_id') ? $request->modul_id : null;
            $soal->section_id = $request->has('section_id') ? $request->section_id : null;
            $soal ->pertanyaan = $request->pertanyaan;
            $soal ->jawaban_benar = $request->jawaban_benar;
            $soal ->save();
            // Return a response using the resource file
            $SoalTestResource = new SoalTestResource($soal);
            return $this->sendResponse($SoalTestResource, 'Successfully Update!');
        } catch (\Exception $e) {
            return  $this->sendError('Updated failed', $e->getMessage());
        }
    }
    
    


    public function deleteTest($id)
    {
        try {
            // Temukan record soal
            $soal = Soal::findOrFail($id);
            $soal->delete();
    
            // Return a response (customize the response based on your needs)
            return $this->sendResponse('', 'Successfully delete!');
        } catch (\Exception $e) {
            return $this->sendError('Delete failed', $e->getMessage());
        }
    }
    

    

}
