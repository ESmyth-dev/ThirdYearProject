<?php
  include "connect_db.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
      width : 100%;
    }
  .box1
{
	height: 500px;
	width: 450px;
	background-color: black;
	margin: 70px auto;
	opacity: .8;
	color: white;
	padding: 20px;
}

label {

  font-size: 18px;
  font-weight :600 ;
}
  </style>
</head>
<body>

<section>
  <div class="log_img"style="height: 190%;background-image: url(images/imagelogin.jpg);">
    <br>
    <div class="box1"style =" background-color: maroon;">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">ShareSync</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="" method="post">
        <b><p style ="padding-left: 50px ; font-size :15px; font-weight :700;"> Login as </p></b>

        <input style ="margin-left:50px; width :18px;" type ="radio" name = "user" id="admin" value ="admin"> 
        <label for= "admin"> Admin </label>
        <input style ="margin-left:50px; width :18px;" type ="radio" name = "user" id="user" value ="user" checked=""> 
        <label  for= "user">User </label>

        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:yellow; text-decoration: none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp 
        New to this website?<a style="color: yellow; text-decoration: none;" href="registration.php">&nbspSign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>
<?php

    if(isset($_POST['submit']))
  {
      if ($_POST['user']=='admin')
      {
        $count=0;
      $res=pg_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row= pg_fetch_assoc($res);

      $count=pg_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script>
              -->
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>
        <?php
      }
      else
      {
        /*-------------if username & password matches---*/

        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="Admin/profile.php"
          </script>
        <?php
      }
      }


      else
      {
        $count=0;
         $res=pg_query($db,"SELECT * FROM `user` WHERE username='$_POST[username]' && password='$_POST[password]';");

          $row= pg_fetch_assoc($res);
          $count=pg_num_rows($res);

          if($count==0)
            {
              ?>

          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>
          <?php
            }
          else
            {
            $_SESSION['login_user'] = $_POST['username'];
            $_SESSION['pic']= $row['pic'];

            ?>
          <script type="text/javascript">
            window.location="User/profile.php"
          </script>
          <?php
            }

      }
  }


  ?>

</body>
</html>
