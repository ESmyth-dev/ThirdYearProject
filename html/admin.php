<?php
require_once "../php/connect_db.php";
$usersRESULT = pg_query($conn, "SELECT * FROM accounts ORDER BY username ASC");
$groupsRESULT = pg_query($conn, "SELECT * FROM groups ORDER BY groupid ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Username</th>
            <th>Delete user?</th>
        </tr>
        <tr>
            <?php while ($row = pg_fetch_assoc($usersRESULT)){
                $username = $row['username'];
                echo "<tr><td>$username</td> <td><form action='../php/delete_user.php', method='post'><input type='hidden' id='username' name='username' value=$username><input type='submit' value='delete'></form></td></tr>";
            }
            ?>
        </tr>

    </table>

    
    
</body>
</html>