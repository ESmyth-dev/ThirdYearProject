<?php
#opening session
session_start();
#connect to database
require_once "connect_db.php";
#if user not log in - display registe.php page
if (! isset($_SESSION["user_id"])){
  header('Location: '."./register.php");
}
#display groups which contanin user's id 
$q = "SELECT * FROM groups WHERE userID={$_SESSION[user_id]};
$r = pg_query($conn, $q);

if (pg_num_rows($r) > 0) {
    while ($row = pg_fetch_assoc($r)) 
    {
        $group = $row["group_name"];
        echo "<div>";
        echo "<h2>{$group}</h2>";
        echo "</div>";
      
    }
}
else
echo "no groups yet..."


pg_close($conn);

?>
