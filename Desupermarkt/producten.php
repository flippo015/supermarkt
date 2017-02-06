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
            
                <form action="verwerk2.php" method="POST">

                    <p><label for="omschrijving"> omschrijving:</label>
                        <input type="text" name="omschrijving" id="Omschrijving" size="30"  pattern="[a-zA-Z][a-zA-Z ]{4,}+"  required placeholder="Vul hier omschrijving in*"/></p>
                    <p><label for="prijs"> prijs:</label>
                        <input type="text" name="prijs" id="prijs" size="30" required placeholder="Vul hier prijs in*"/></p>
                    <p><label for="btw"> BTW Invoeren:</label></p>
                        <select name="btw">
                        <option value="laag">6%</option>
                        <option value="hoog">21%</option>
                        </select>
                    
                    <p><input type="submit" value="registreren" /></p>
                </form> 
    </body>
</html>
