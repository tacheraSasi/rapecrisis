<?php

require 'vendor/autoload.php';
require 'parseEnv.php';

parseEnv(__DIR__ . '/.env');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Retrieving environment variables
$databaseUrl = getenv('TEST');
print_r($databaseUrl);

$prompt = "HI i need to know why would i ever need reactjs over vanilla";
$userUniqueId = $_POST['userUniqueId'] ?? 'default_user_id'; // Fallback to a default value if not set


function openAi($prompt) {
    $client = new Client(); // Instantiate GuzzleHttp Client inside the function

    try {
        // Sending a POST request to the OpenAI API
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messages' => [['role' => 'system', 'content' => $prompt]],
                'model' => 'gpt-3.5-turbo',
                'temperature' => 0,
                'max_tokens' => 1000,
                'top_p' => 1,
                'frequency_penalty' => 0.5,
                'presence_penalty' => 0,
            ],
        ]);

        // Get the response body
        $body = $response->getBody();
        $data = json_decode($body, true);

        // Output the response (for debugging)
        $content = $data['choices'][0]['message']['content'];
        echo '<pre>';
        var_dump($content);
        echo '</pre>';

    } catch (RequestException $e) {
        // Handling errors
        if ($e->hasResponse()) {
            echo $e->getResponse()->getBody()->getContents();
        } else {
            echo $e->getMessage();
        }
    }
}
  
// Call the function with the provided prompt
openAi($prompt);
