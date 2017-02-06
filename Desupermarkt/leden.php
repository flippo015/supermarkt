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
            
                <form action="verwerk1.php" method="POST">

                    <p><label for="Voornaam"> voornaam</label>
                        <input type="text" name="voornaam" id="voornaam" size="30"  pattern="[a-zA-Z][a-zA-Z ]{4,}+"  required placeholder="Vul hier voornaam in*"/></p>
                    <p><label for="Achternaam"> Achternaam en Tussenvoegsel</label>
                        <input type="text" name="achternaam" id="achternaam" size="30" pattern="[a-zA-Z][a-zA-Z ]{4,}+"required placeholder="Vul hier tussenvoegsel & achternaam in*"/></p>
                    <p><label for="adres">adres</label>
                        <input type="text" name="adres" id="adres" size="30"  required placeholder="Vul hier adres in*"/></p>                 
                    <p><label for="postcode">postcode</label>
                        <input type="text" name="postcode" id="Postcode"size="30" pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}" required placeholder="Vul hier postcode in*"/></p>
                    <p><label for="woonplaats">woonplaats</label>
                        <input type="text" name="woonplaats" id="Woonplaats" size="30" pattern="[a-zA-Z\-']+" required placeholder="Vul hier woonplaats in*"/></p>
                    <p><label for="email">email</label>
                        <input type="text" name="email" id="email" size ="30" required placeholder="Vul hier email in*"/></p>
                    <p><label for="telefoonnummer">telefoonnummer</label>
                        <input type="text" name="telefoonnummer" id="telefoonnummer" size ="30" pattern="\d{3}\d{3}\d{4}" required placeholder="Vul hier telefoonnummer in*"/></p>                    
                    
                    <p><input type="submit" value="registreren" /></p>
                </form> 
    </body>
</html>
