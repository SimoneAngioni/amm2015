<?php
include "function.class.php";


$admin = new Connessione();

$id = $_POST['id'];

$control = $admin->deleteCarrelloId($id);

if(!$control) {
	echo "Errore durante l'eliminazione del record dal database"; echo "<a href=../views/carrello.php >Riprova</a>"; 
	}
else header("location:../views/carrello.php");

?>