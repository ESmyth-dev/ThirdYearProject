<?php
// Connect to the database
require_once "connect_db.php";

// Start the session
//session_start();

// Get username and password from POST data
$username = $_POST['username'];
$user_entered_password = $_POST['password'];

// Prepare the SQL statement with a placeholder for the username
$stmt = pg_prepare($conn, "find_user", "SELECT * FROM accounts WHERE username = $1");

// Execute the prepared statement with the provided username
$result = pg_execute($conn, "find_user", array($username));

// Check if a user with the given username exists
if (pg_num_rows($result) == 0) {
    echo "Invalid username";
    die();
}

// Fetch the stored hashed password
$stored_password_hash = pg_fetch_result($result, 0, 'password');

// Verify the entered password against the stored hashed password
if (!password_verify($user_entered_password, $stored_password_hash)) {
    echo "Incorrect password";
} else {
    // Regenerate session ID to prevent session fixation
    session_regenerate_id(true);

    // Store the username in the session
    $_SESSION['username'] = $username;

    // Redirect to home.php
    header("Location: ../html/home.php");
    exit(); // Make sure to stop further execution after redirecting
}
