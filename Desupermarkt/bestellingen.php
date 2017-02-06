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
?>            <br><br><br><br><br>

        <h3>zoek in klanten</h3> 
	    <p>zoek via klantnummer of naam</p> 
    <form  method="post" action=""  id="searchform"> 
        <input  type="text" name="search">
	      <input  type="submit" name="submit" value="Search"> ,</form>
              <?php
              
              
              
include  'database.php';

  

  if(isset($_POST['submit'])){
 
  $search=$_POST['search'];
  //connect  to the database
  
  $sql="SELECT  * FROM klanten WHERE IDklant LIKE '%$search%' OR voornaam LIKE '%" . $search . "%' ";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  echo '  <form  method="post" action="verwerk3.php"  id="searchform2"> ';
  while($row=mysql_fetch_array($result)){
          $voornaam  =$row['voornaam'];
          $IDklant=$row['IDklant'];
          $achternaam=$row['achternaam'];
          $adres=$row['adres'];
          $postcode=$row['postcode'];
          $woonplaats=$row['woonplaats'];
          $telefoonnummer=$row['telefoonnummer'];
          
          $_SESSION["IDklant"] = "$IDklant";
          $_SESSION["voornaam"] = "$voornaam";
          $_SESSION["achternaam"]= "$achternaam";
          
            echo "<input type='text' name='IDklant' value='" . $IDklant . "'> " . $_SESSION["voornaam"] . "" . $_SESSION["achternaam"] . " <br>";                
     }
            echo "<input type='text' name='datum' value='" . date('m/d/y') . "'>";
            echo '<input  type="submit" name="submit" value="submit"> ';
            echo "     </select>  </form> "   ; 
  
  
  }
 

?> 
    </body>
</html>
