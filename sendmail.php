<?php
// MySQL connection
$host = "localhost";
$user = "root";
$password = "";
$database = "contact_form_db";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = $conn->real_escape_string($_POST['form_name']);
$email = $conn->real_escape_string($_POST['form_email']);
$subject = $conn->real_escape_string($_POST['form_subject']);
$message = $conn->real_escape_string($_POST['form_message']);

// Insert into database
$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message Sent Successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
