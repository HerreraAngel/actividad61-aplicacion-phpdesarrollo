<?php

include("config.php");


$idfoca = $_GET['idfoca'] ?? null;

if ($idfoca) {
  
    $idfoca = $mysqli->real_escape_string($idfoca);


    $result = $mysqli->query("DELETE FROM focas WHERE foca_id = $idfoca");

    $mysqli->close();
}

header("Location: index.php");
exit;
?>

