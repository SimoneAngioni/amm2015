<?php
include "function.class.php";


$admin = new Connessione();

$id = $_POST['id'];

$control = $admin->deleteVeicolo($id);

if(!$control) {
	echo "Errore durante l'eliminazione del record dal database"; echo "<a href=../views/admin.php >Riprova</a>"; 
	}
else header("location:../views/admin.php");

?>