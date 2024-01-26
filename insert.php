<?php

session_start();
session_start();

# Check if the user is logged in
if (!isset($_SESSION["user_id"])) {

    if (isset($_POST['message']) && isset($_POST['to_id'])) {

        # Database connection file
        include '../db.conn.php';

        # Get data from XHR request and store them in variables
        $message = $_POST['message'];
        $to_id = $_POST['to_id'];

        # Get the logged-in user's user_id from the SESSION
        $from_id = $_SESSION['user_id'];

        $sql = "INSERT INTO chats (from_id, to_id, message) VALUES ($1, $2, $3)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$from_id, $to_id, $message]);

        # If the message is inserted
        if ($res) {

            # Check if this is the first conversation between them
            $sql2 = "SELECT * FROM conversations
                    WHERE (user_1 = $1 AND user_2 = $2)
                    OR    (user_2 = $1 AND user_1 = $2)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$from_id, $to_id]);

            // Setting up the time Zone
            // It Depends on your location or your P.C. settings
            define('TIMEZONE', 'Africa/Addis_Ababa');
            date_default_timezone_set(TIMEZONE);

            $time = date("h:i:s a");

            if ($stmt2->rowCount() == 0) {
                # Insert them into conversations table
                $sql3 = "INSERT INTO conversations(user_1, user_2) VALUES ($1, $2)";
                $stmt3 = $conn->prepare($sql3);
                $stmt3->execute([$from_id, $to_id]);
            }
            ?>

            <p class="rtext align-self-end border rounded p-2 mb-1">
                <?= $message ?>
                <small class="d-block"><?= $time ?></small>
            </p>

            <?php
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
