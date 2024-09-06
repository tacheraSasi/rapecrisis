<?php
// Allow from any origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

require 'vendor/autoload.php';
require 'parseEnv.php';

parseEnv(__DIR__ . '/.env');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Capture user input (from the JavaScript request)
$userInput = file_get_contents('php://input');
$userInput = json_decode($userInput, true)['prompt'] ?? "Default prompt here";

// Initialize session to store the conversation history
session_start();

if (!isset($_SESSION['conversation'])) {
    $_SESSION['conversation'] = [];
}

$_SESSION['conversation'][] = ['role' => 'user', 'content' => $userInput];

/**
 * Function to send a therapeutic prompt to OpenAI and engage in a chat
 *
 * @param array $conversation
 * @return array
 */
function openAi($conversation) {
    $client = new Client();

    try {
        // Sending a POST request to the OpenAI API
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messages' => array_merge(
                    [
                        ['role' => 'system', 'content' => 'Wewe ni mtaalamu wa ushauri nasaha...'] // Your system instructions here
                    ], 
                    $conversation // Merge previous conversation with the new user input
                ),
                'model' => 'gpt-3.5-turbo',
                'temperature' => 0.7,
                'top_p' => 1,
                'frequency_penalty' => 0.2,
                'presence_penalty' => 0.5,
            ],
        ]);

        // Get the response body
        $body = $response->getBody();
        $data = json_decode($body, true);

        // Append assistant's response to the conversation
        $assistantResponse = $data['choices'][0]['message']['content'];
        $_SESSION['conversation'][] = ['role' => 'assistant', 'content' => $assistantResponse];

        return ['status' => 'success', 'text' => $assistantResponse];

    } catch (RequestException $e) {
        return ['status' => 'error', 'message' => $e->getMessage()];
    }
}

// Call the function with the conversation history and return the assistant's response as JSON
header('Content-Type: application/json');
echo json_encode(openAi($_SESSION['conversation']));
