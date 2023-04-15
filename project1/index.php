<?php
require'Config.php';
if(!empty($_SESSION["id"])){
   $id = $_SESSION["id"];
   $result = mysqli_query($conn,"SELECT * FROM tb_users WHERE  id = $id");
   $row =  mysqli_fetch_assoc($result);
}
else{
   header("Location :Login.php");
}
?>

<!DOCTYPE html> 
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="./index.css">
 </head>

 <header>
    <div class="class hero-section-elements">
        <h2 id="COFFEE_SHOP_text">KARMA COFFEE </h2> 
        <img class="logo" src="images/Artboard 78.png" alt="" width="200" height="200">  
    </div>

    <nav>
    <ul>                                                                                                                               
      <li class="right" ><a href="regristration.php"><button>Regristration</button></a></li>
      <li class="right"><a href="Login.php"><button>Login</button></a></li>
      <li class="right"><a href="Login.php"><button>Order</button></a></li>
      <li class="right"><a href="home.php"><button>Home</button></a></li>
    </ul>
  </nav>
</header>  


    <body>
    <h1 id="bold_underline_text">Welcome <?php  echo $row["Name"]; ?>, which coffee would you prefer? </h1>

   </body>
</html>
<a href="logout.php">Logout</a>
