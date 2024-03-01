<?php
    session_id("userSession");
    session_start();
    if (! isset($_SESSION["username"])){
        header('Location: '."../html/login.html"); // redirect the user to the register page if they have not already logged in
    }
        // Connect to the database
        require_once "connect_db.php";
    
        $stmt = pg_prepare($conn, "insert_post", "INSERT INTO post (username, text) VALUES ($1, $2) RETURNING postid");
        
        $username = $_SESSION['username'];
        $text = $_POST['text'];

        $result = pg_execute($conn, "insert_post", array($username, $text));
         if ($result) {
            echo "Post created successfully!";
            $postid = pg_fetch_result($result, 0, 'postid');

        } else {
            echo "Error: " . pg_last_error($conn);
            die();
        }
    
        $uploaddir = '../post_images/';
        $uploadfile = $uploaddir . "post_image". $postid . ".png";
        //Add the image associated with the post to the post_images directory with the the number of the post_id linked to the image so it can be found easily
        if(move_uploaded_file($_FILES['post_image']['tmp_name'], $uploadfile)){
        echo "File was successfully uploaded.\n";
        }else{
        echo "Possible file upload attack!\n";
        }
        
        // Close the connection
        pg_close($conn);
        header('Location: '."../html/Home.php");