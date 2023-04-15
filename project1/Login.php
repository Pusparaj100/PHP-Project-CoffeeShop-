<?php
require 'Config.php';
if (isset($_POST["submit"])){  
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, " SELECT * FROM tb_users WHERE  Username = '$usernameemail' OR 'ail' = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["Password"]){
            $_SESSION["Login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: order.php");
        } 
        else
        echo
            "<script>c: alert('Wrong Password'); </script>";

    }
    else{
        echo
            "<script> alert('User Not Regristered'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./Login.css">
 </head>


 <header>
    <div class="class">
        <h2 id="COFFEE_SHOP_text">KARMA COFFEE  </h2>   
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
    <form class = "" action="" method="post" autocomplete="off">

    <tr align="center"><label for="usernamenameemail"> Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""> </tr> <br>

        <tr align="center"> <label for="password">Password : </label>
        <input type="password" name="password" id="password" required value=""> </tr> <br>

        <tr align="center">  <button type="submit" name="submit">Login</button> </tr>
        <br>

    </form>
    <br>
    
    </body>
</html>