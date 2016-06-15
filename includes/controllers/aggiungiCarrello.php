<?php

include '../controllers/function.class.php';

$id = $_POST['nRiga'];
$admin = new Connessione();

$controllo = $admin->addCarrello($id);


if(!controllo){ 
	echo "Errore durante l'aggiunta del record al database"; echo "<a href=../views/utente.php >Torna indietro</a>"; 
} 
else header("Location: ../Views/carrello.php");
?>