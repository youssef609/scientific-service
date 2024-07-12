<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Services\OpenAIService;

class QuestionController extends Controller
{
    protected $openAIService;
   
    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    
    public function askQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'document_id' => 'required|integer',
        ]);

        $document = Document::findOrFail($request->document_id);
        $context = $document->content;
     
        $answer = $this->openAIService->getAnswer($request->question, $context);
        return response()->json(['answer' => $answer]);
    }
    
    public function showAskForm()
    {
        $documents = Document::all();
        return view('ask', compact('documents'));
    }








}
