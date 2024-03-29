<?php
require_once "../php/connect_db.php";
//session_id("userSession");
session_start();
if (!isset($_SESSION["username"])) {
    header('Location: ' . "./login.php");
}
$login_username = $_SESSION["username"];
session_write_close();
//session_id("groupSession");
//session_start();
// Get passed product genre and assign it to a variable.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION["groupid"] = $id;
}
$groupid = $_SESSION["groupid"];
$get_groupnameSTMT = pg_prepare($conn, "get_groupname", "SELECT groupname FROM groups where groupid=$1");
$get_groupnameRESULT = pg_execute($conn, "get_groupname", array($groupid));
$row = pg_fetch_assoc($get_groupnameRESULT);
$_SESSION["groupname"] = $row["groupname"];
$groupname = $_SESSION["groupname"];
session_write_close();

$user = $_GET['user'];
$query2= pg_prepare($conn, "delete", "DELETE FROM accounttogroup WHERE groupid = $1 AND username = $2");
$stmt2 = pg_execute($conn, "delete", array($groupid,$user ));

if ( $stmt2) {
        
    // Group deleted successfully
    header('Location: ../html/group-page.php');

} else {
// Error occurred, display an error message
echo "Error executing deletion.";
}

// Close statement
$stmt2 = null;
pg_close($conn);
?>