<?php
include_once "../config.php";
// echo "connect";
require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Get the form data
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $jina = $_POST['jina'];
    $namba = $_POST['namba'];
    $email = $_POST['email'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    #reference id
    $ref = "ref-".Uuid::uuid4()->toString();


    # Insert data into the reports table
    $sql = "INSERT INTO reports (ref,question1, question2, question3, question4, question5, jina, namba, email, latitude, longitude)
            VALUES ('$ref','$question1', '$question2', '$question3', '$question4', '$question5', '$jina', '$namba', '$email', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
