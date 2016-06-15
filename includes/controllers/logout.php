<?php
	include "../controllers/function.class.php";    
	
	$auth = new Connessione();

	$eliminaCarrello = $auth->deleteCarrello();
	/* chiudo la sessione */
	session_destroy();

	header("location:../../index.php");
?>