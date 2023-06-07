<?php
 require('connection/config.php');



// Retrieve the form data from $_POST
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


// Prepare and execute the SQL query to insert the data into the database
$query = "INSERT INTO contacts (name, email, phone, message ) VALUES (?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->execute([$name, $email, $phone, $message, $checkbox]);

// Check if the insertion was successful
if ($stmt->rowCount() > 0) {
    // Insertion successful, redirect to a success page
    header('Location: success.html');
} else {
    // Insertion failed, redirect to an error page
    header('Location: error.html');
}
?>
