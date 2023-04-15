<?php
$host="localhost";
$db_username ="root";
$db_password ="";
$db = "login_datastore";
$conn = mysqli_connect($host,$db_username,$db_password,$db);
if(!$conn){
    'Connection failed';
}
else {
    require 'Config.php';
    if (isset($_POST["Submit"])) {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        $duplicate = mysqli_query($conn, " SELECT * FROM tb_users WHERE  Username = '$username' OR 	'E-Mail' = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo
            "<script> alert('Username or Email Has Already Taken'); </script>";
        } else {
            if ($password == $confirm_password) {
                $query = "INSERT INTO tb_users(Name, Username, email,Password) VALUES('$name','$username','$email','$password') ";
                mysqli_query($conn, $query);
                echo
                "<script> alert('Registration Successful'); </script>";
            } else {
                echo
                "<script> alert('Password Does Not Match'); </script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./registration.css">
    <title>Registration</title>
</head>

<header>
    <div class="class">
        <h2 id="COFFEE_SHOP_Registration">KARMA COFFEE   </h2>   
    </div>

    <nav>
    <ul>
      <li class="right" ><a href="regristration.php"><button>Regristration</button></a></li>
      <li  class="right"><a href="Login.php"><button>Login</button></a></li>
      <li class="right"><a href="home.php"><button>Home</button></a></li>
    </ul>
  </nav>
</header>

<body>

    <form class="" action="regristration.php" method="POST" autocomplete="off">

        <label for="name">Name :</label>
        <input type="text" name="name" id="name" required value=""><br>

        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required value=""><br>

        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email" required value=""><br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""><br>

        <label for="confirm password">confirm password :</label>
        <input type="password" name="confirm password" id="confirm password" required value=""><br>

        <button type="Submit" name="Submit">Submit </button><br>

    </form>
<br>


</body>
</html>
