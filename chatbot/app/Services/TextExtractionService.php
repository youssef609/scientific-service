<?php
// app/Services/TextExtractionService.php
namespace App\Services;

use Smalot\PdfParser\Parser as PdfParser;

class TextExtractionService
{
    public function extractText($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($extension == 'pdf') {
            return $this->extractTextFromPdf($filePath);
        } elseif (in_array($extension, ['doc', 'docx'])) {
            return $this->extractTextFromWord($filePath);
        } elseif ($extension == 'txt') {
            return file_get_contents($filePath);
        }

        return null;
    }

    protected function extractTextFromPdf($filePath)
    {
        $parser = new PdfParser();
        $pdf = $parser->parseFile($filePath);
        return $pdf->getText();
    }

    protected function extractTextFromWord($filePath)
    {
        // Implement extraction logic for Word documents
    }
}
