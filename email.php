<?php
// Allow from any origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

// Handle OPTIONS request method for preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Decode the JSON data from the request
$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true); // decode as associative array

if (isset($data['question1']) && isset($data['question2']) && isset($data['question3']) && isset($data['question4']) && isset($data['question5']) && isset($data['location'])) {
    $question1 = $data['question1'];
    $question2 = $data['question2'];
    $question3 = $data['question3'];
    $question4 = $data['question4'];
    $question5 = $data['question5'];
    $location = $data['location'];
    $latitude = $location['latitude'];
    $longitude = $location['longitude'];
    #$user = $data['user'];
    #$jina = $user['jina'];
    #$namba = $user['namba'];
    #$email = $user['email'];

    $emailSubject = "Taarifa toka TUWK";
    $to = 'kusagaissa@gmail.com';

    // Create HTML message
    $message = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>' . $emailSubject . '</title>
    </head>
    <body style="background-color: color-mix(in srgb,#671B61, transparent 80%); color: #fff; padding: 20px; border-radius: 1rem;">
        <h2>Taarifa toka TUWK </h2>
        <p><strong>1. Je, tukio lilitokea kwako au kwa mtu unayemjua?</strong> ' . htmlspecialchars($question1) . '</p>
        <p><strong>2. Tukio lilitokea lini?</strong> ' . htmlspecialchars($question2) . '</p>
        <p><strong>3. Je, unahitaji ushauri wa kisaikolojia?</strong> ' . htmlspecialchars($question3) . '</p>
        <p><strong>4. Je, tukio liliripotiwa kwa mamlaka?</strong> ' . htmlspecialchars($question4) . '</p>
        <p><strong>5. Je, unajua mshukiwa?</strong> ' . htmlspecialchars($question5) . '</p>
        <p><strong>Location:</strong> Latitude ' . htmlspecialchars($latitude) . ', Longitude ' . htmlspecialchars($longitude) . '</p>
        
       </body>
    </html>';

    // Set additional headers for HTML content and customize "From" name
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: TUWK <support.ekilie.com>";

    // Sending email
    if (mail($to, $emailSubject, $message, $headers)) {
        echo json_encode(["message" => "Email sent successfully!"]);
    } else {
        echo json_encode(["message" => "Failed to send email."]);
    }
} else {
    echo json_encode(["message" => "Invalid request. Missing parameters."]);
}
?>
