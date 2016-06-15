<?php
include 'function.class.php';
$nome = $_POST['username'];
$password = $_POST['psw'];
$auth = new Connessione();
$controllo = $auth->verifyLogin($nome,$password);
	if($controllo == false){
		header("Location: ../Views/homeErrore.php");
	}
	else
	{
		$_SESSION['autorizzato'] = 1;
		$_SESSION['utente_id'] = $controllo['id_utentei'];
		if($controllo['id_utenti'] == 1){
			header("Location: ../Views/admin.php");
		}else if($controllo['id_utenti'] == 2){
			header("Location: ../Views/utente.php");
		}	
	}
?>