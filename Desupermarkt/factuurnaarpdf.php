<?php
require_once 'testpdf/autoload.inc.php';
use Dompdf\Dompdf;
ob_start();

include 'database.php';


//selecteer database

$factuur_id = $_GET['factuur_id'];
$factuurinfo = "SELECT * FROM orders WHERE IDorder = $factuur_id";  
$querryfactuur = mysql_query($factuurinfo);
$gegevensfactuur = mysql_fetch_array($querryfactuur);

$klantid = $gegevensfactuur['IDklant'];

$klantgegevensquerry = "SELECT * FROM klanten WHERE IDklant = $klantid";  
$klantgegevensmysql = mysql_query($klantgegevensquerry);
$klantgegevens = mysql_fetch_array($klantgegevensmysql);
?>
<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factuur <?php echo $gegevensfactuur['IDorder']; ?></title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="Afbeeldingen/Naamloos.png">
      </div>
      <h1>Factuur <?php echo $gegevensfactuur['IDorder']; ?></h1>
      <div id="company" class="clearfix">
        <div>Supermarkt</div>
        <div>damwand,<br /> 100 1274pg</div>
        <div>0900-6666</div>
        <div><a href="mailto:support@robby.nl">support@robby.nl</a></div>
      </div>
      <div id="project">
          <div><span>Klant</span><?php echo $klantgegevens['voornaam'],' ',$klantgegevens['achternaam']; ?></div>
        <div><span>Addres</span><?php echo $klantgegevens['adres']; ?></div>
        <div><span>Datum</span> <?php echo $gegevensfactuur['datum']; ?></div>
      </div>
    </header>
    <main>
        <br>
        <br>
        <br>
      <table>
        <thead>
          <tr>
            <th class="desc">Beschrijving</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Totaal</th>
          </tr>
        </thead>
        <tbody>
<?php 
                //
$krijgartikelen = "SELECT * FROM bestelde_artikelen WHERE IDorder = $factuur_id";  
$producten = mysql_query($krijgartikelen);
$aantalzonderbtw = 0;
$btwhoogtotaal = 0;
$btwlaagtotaal = 0;
while($outputartikelen = mysql_fetch_array($producten)){
$artikelid = $outputartikelen['IDartikel'];
$productendatebase = "SELECT * FROM artikelen WHERE IDartikel = $artikelid ";  
$querryproducten = mysql_query($productendatebase);
while($outputartikelennaam = mysql_fetch_array($querryproducten)) {
    $totalaantalprijsprijs = money_format('%.2n',$outputartikelen["aantal"] * $outputartikelennaam["prijs"]);
    echo '<tr>
            <td class="desc">'. $outputartikelennaam["omschrijving"] .'</td>
            <td class="unit">'. $outputartikelennaam["prijs"] .'</td>
            <td class="qty">'. $outputartikelen["aantal"] .' </td>
            <td length="6,2"  class="total">'. $totalaantalprijsprijs .'</td>
          </tr>';
    
    
    // functie rekenen btw
    $aantalzonderbtw = $aantalzonderbtw + $totalaantalprijsprijs;
    if($outputartikelennaam["btw"] == 'laag') {
        $btwlaag = $outputartikelennaam["prijs"]*0.06;
        $btwlaagtotaal = $btwlaagtotaal + round($btwlaag,2);
    } else {
    $btwhoog = $outputartikelennaam["prijs"]*0.21;
    $btwhoogtotaal = $btwhoogtotaal + round($btwhoog,2);
    }
    $totaalbedrag = $btwhoogtotaal + $btwlaagtotaal + $aantalzonderbtw;
}
}
?>
          <tr>
            <td colspan="4">Bedrag zonder btw</td>
            <td class="total"><?php echo $aantalzonderbtw; ?></td>
          </tr>
          <tr>
            <td colspan="4">Btw 6%</td>
            <td class="total"><?php echo $btwlaagtotaal; ?></td>
          </tr>
          <tr>
            <td colspan="4">Btw 21%</td>
            <td class="total"><?php echo $btwhoogtotaal; ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">Totaal</td>
            <td class="grand total"><?php echo $totaalbedrag; ?></td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>


<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");
?>