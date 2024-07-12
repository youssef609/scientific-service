<?php

// app/Services/OpenAIService.php
namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;
    protected $model;


    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
        $this->model = env('OPENAI_MODEL');
        

        if (empty($this->apiKey)) {
            throw new \Exception('OpenAI API key not set.');
        }
    }

    public function getAnswer($question, $context)
    {
        try {
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => $this->model,
                    'prompt' => $context . "\nQ: " . $question . "\nA:",
                    'max_tokens' => 150,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['choices'][0]['text'];
        } catch (\Exception $e) {
            throw new \Exception('Failed to fetch answer: ' . $e->getMessage());
        }
    }
}
