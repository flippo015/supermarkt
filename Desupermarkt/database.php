<?php


    $dbname = 'supermarkt' ;
    $link = mysql_connect('localhost','root', 'hilversum' );
    if (!$link) {
        die ('kan geen verbinding maken' . mysql_error());
    }
    
  //echo " con suc6";
    
    // verbinding met database
    $db_selected = mysql_select_db ($dbname, $link);
    if (!$db_selected) {
        die ( 'kan geen verbinding maken' . mysql_error());
    }
    
   //   echo " con suc6";
      
    ?>