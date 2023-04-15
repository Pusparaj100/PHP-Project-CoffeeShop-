<?php
require 'Config.php';
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./order.css">
    <title>Order</title>

</head>


<header>
    
<div class="class hero-section-elements">
        <h2 id="COFFEE_SHOP_text">KARMA COFFEE </h2> 
        <img class="logo" src="images/Artboard 78.png" alt="" width="200" height="200">  
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
    <h1 id="bold_underline_text">Welcome <?php  echo $row["Name"]; ?>, what would you prefer? </h1>
    <br><br><br><br>
    <table class="my-table" border="1">
        <tr>
                <th>SN</th>
                <th>Items</th>
                <th>Price</th>
                <th>Quantity</th>
        </tr>
<?php
$query_coffee = "SELECT * from category_coffee";
$query_dessert = "SELECT * from category_dessert";
$query_breakfast = "SELECT * from category_breakfast";  
$result_coffee = mysqli_query($conn,$query_coffee);
$result_dessert = mysqli_query($conn, $query_dessert);
$result_breakfast = mysqli_query($conn,$query_breakfast);

// taking order
echo "<form action= 'order.php' method= 'POST'>";
echo"<tr>
        <td><h3>Coffee</h3></td>
    </tr>";



while($row=mysqli_fetch_assoc($result_coffee)){
    echo"<tr>";
    echo"<td>". $row['id']."</td>";
    echo"<td>". $row['Name']."</td>";
    echo"<td>". $row['price']."</td>";
    echo"<td> <input type=number min=0 name='".str_replace(' ', '_', $row['Name'])."' value=0 ></td>";
    echo"</tr>";
    
    

}


echo"<tr>
        <td><h3>Dessert</h3></td>
    </tr>";

    mysqli_data_seek($result_coffee, 0);
    mysqli_data_seek($result_dessert, 0);
    mysqli_data_seek($result_breakfast, 0);
while($row=mysqli_fetch_assoc($result_dessert)){
    echo"<tr>";
    echo"<td>". $row['id']."</td>";
    echo"<td>". $row['name']."</td>";
    echo"<td>". $row['price']."</td>";
    echo"<td> <input type=number min=0 name='".str_replace(' ', '_', $row['name'])."' value=0 ></td>";
    echo"</tr>";


}

echo"<tr>
        <td><h3>Breakfast</h3></td>
    </tr>";
    mysqli_data_seek($result_coffee, 0);
    mysqli_data_seek($result_dessert, 0);
    mysqli_data_seek($result_breakfast, 0);
while($row=mysqli_fetch_assoc($result_breakfast)){
    echo"<tr>";
    echo"<td>". $row['id']."</td>";
    echo"<td>". $row['Name']."</td>";
    echo"<td>". $row['price']."</td>";
    echo"<td> <input type=number min=0 name='".str_replace(' ', '_', $row['Name'])."' value=0   ></td>";
    echo"</tr>";    
}

echo"<tr>
<td><button type='submit'>Order</button></td>
</tr>       
</table> 
</form>";


if($_SERVER['REQUEST_METHOD']=='POST'){

// setting all the variables

$t_coffee=0;
$t_dessert=0;
$t_breakfast=0;
$total=0;
include 'clearfunction.php';

// calculating total individually

?>
<div>
    <?php
    echo "table";
    //total for coffee
    while($row=mysqli_fetch_assoc($result_coffee)){
        
        if($_POST[str_replace(' ', '_', $row['Name'])]>0){
            
            $t_coffee= $row['price']*$_POST[str_replace(' ', '_', $row['Name'])];
    }
    }
    include 'clearfunction.php';
    
    //total for dessert
    while($row=mysqli_fetch_assoc($result_dessert)){
    
        if($_POST[str_replace(' ', '_', $row['name'])]>0){
            
         $t_dessert= $row['price']*$_POST[str_replace(' ', '_', $row['name'])];
    
            
    }
    }
    include 'clearfunction.php';    
    //total for breakfast
    
    while($row=mysqli_fetch_assoc($result_breakfast)){
        if($_POST[str_replace(' ', '_', $row['Name'])]>0){
            $t_breakfast= $row['price']*$_POST[str_replace(' ', '_', $row['Name'])];
    }   
    }
    echo $t_coffee ."<br>";
    echo $t_dessert ."<br>";
    echo $t_breakfast ."<br>";  
    
    // total price
    $total = $t_coffee+$t_breakfast+$t_dessert;
    echo $total;
    }

?>

</div>

</body>
</html>