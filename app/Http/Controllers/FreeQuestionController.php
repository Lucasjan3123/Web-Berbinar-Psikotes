<?php

namespace App\Http\Controllers;

use App\Http\Requests\FreeQuestionRequest;
use App\Http\Resources\FreeQuestionResource;
use App\Models\FreeQuestion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FreeQuestionController extends Controller
{
    /**
     * Private properties. 
     */
    private $questions;
    private $question;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->questions = FreeQuestion::all();
        $freeQuestionResource = FreeQuestionResource::collection($this->questions);
        return $this->sendResponse($freeQuestionResource, 'Successfully get questions!');
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
    public function store(FreeQuestionRequest $request)
    {
        try {
            $newFreeQuestion = FreeQuestion::create([
                'question' => $request->question,
            ]);
            
            $this->question = new FreeQuestionResource($newFreeQuestion);
        } catch (Exception $e) {
            return $this->sendError('Internal Server Error', $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->sendResponse($this->question, 'Successfully Post New Free Question!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
