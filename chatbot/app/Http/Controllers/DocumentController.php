<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Services\TextExtractionService;

class DocumentController extends Controller
{
    protected $textExtractionService;
    
    public function __construct(TextExtractionService $textExtractionService)
    {
        $this->textExtractionService = $textExtractionService;
    }
    
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,txt',
        ]);

        $path = $request->file('document')->store('documents');

        // Extract text from the document
        $text = $this->textExtractionService->extractText(storage_path('app/' . $path));

        // Save document and extracted text
        $document = new Document();
        $document->path = $path;
        $document->content = $text;
        $document->save();

        return redirect()->route('upload.form')->with('success', 'Document uploaded successfully.');
    }

       




}
