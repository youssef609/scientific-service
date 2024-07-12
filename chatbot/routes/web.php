<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [DocumentController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [DocumentController::class, 'uploadDocument'])->name('upload.document');
Route::get('/ask-question', [QuestionController::class, 'showAskForm'])->name('ask.form');
Route::post('/ask-question', [QuestionController::class, 'askQuestion'])->name('ask.question');

Route::get('/test-env', function () {
    $openaiApiKey = env('OPENAI_API_KEY');
    $openaiModel = env('OPENAI_MODEL');
    
    return response()->json([
        'OPENAI_API_KEY' => $openaiApiKey,
        'OPENAI_MODEL' => $openaiModel,
    ]);
});
