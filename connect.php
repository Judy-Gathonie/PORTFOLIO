<?php
// config.php (database connection script)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// contact.php (form handler)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
   
    $message = $_POST["message"];

    // Validate input data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    // Insert data into database
    $sql = "INSERT INTO contact_form_info (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Form submission successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>