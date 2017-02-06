<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="stijlen.css" rel="stylesheet" type="text/css">
        
        <title>De Supermarkt</title>
    </head>
    
    
    <body>
        <img class="logo"  src="Afbeeldingen/desupermarkt.png" />
            <br>
<?php
include ('menu.php');
include  'database.php';
session_start();
?>            <br><br><br><br><br>

        <h3>vervolg bestellingen</h3>
        
        
        
        
        
        <?php
        
                  $IDorder =$_SESSION["IDorder"];
                  echo $IDorder ;
        
        
include 'database.php';
if(isset($_POST["submit2"]) ) { // als de form wordt gepost dan starten

$IDartikel = $_POST['IDartikel'];
$aantal = $_POST['aantal'];


    mysql_query("INSERT INTO bestelde_artikelen  VALUES ('$IDartikel', '$IDorder', '$aantal') ");   

}
        
    
    $sql2 = "SELECT * FROM orders WHERE IDklant= '$IDklant'";
$result2 = mysql_query($sql2);       
        
        ?>
     <form action=bestellingen2.php method=post>   
  product:<select name="IDartikel">
<?php 

$sql = "SELECT * FROM artikelen";  
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
              $IDartikel  =$row['IDartikel'];
              $omschrijving =$row['omschrijving'];
              $_SESSION["IDartikel"] = "$IDartikel";
	echo '<option value="' . $IDartikel['IDartikel'] . '">' . $omschrijving . '</option>';
}

mysql_close();

?>
      
      
      
  </select>
  <br>
    aantal:

    <input type="number" name="aantal" required>
<br>
    <br>

            <br><br>
  <input type="submit" value="submit2" name="submit2">
 <?php 
 echo' <a href="factuurnaarpdf.php?factuur_id='.$_SESSION["IDorder"].' "> factuur maken </a>';
 echo' <a href="index.php"> terug naar Homepagina </a>';
         
         ?>
</form>


 
    </body>
</html>