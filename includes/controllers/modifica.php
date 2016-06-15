<?php 
include "function.class.php";


$admin = new Connessione();

$id = $_POST['id'];
$targa = $_POST['targa'];

$controlTarga = $admin->controlTargaMyId($targa, $id);
/** Controllo che la targa inserita 
	non sia già esistente nel database
	escludendo il mio id */
if($controlTarga > 0){
	echo "Errore Targa gia presente!"; echo"<a href=../views/admin.php> Torna indietro </a>";
}
else{
	$modello = $_POST['modello'];
	if(empty($_POST['immagine'])) 
		$immagine = "../../assets/img/noImage.jpg";
	else{
		$immagine = $_POST['immagine'];
	}

	$descrizione = $_POST['descrizione'];
	$prezzo = $_POST['prezzo'];

	if(!is_numeric($prezzo)) {
		echo "Per favore inserisci un numero come prezzo!"; 
		echo "<a href=../views/admin.php >Torna indietro</a>"; 
	}else if($prezzo < 0) {
		echo "Prezzo inserito minore 0!"; 
		echo "<a href=../views/admin.php >Torna indietro</a>"; 
	}else {
		$modello= str_replace("'"," ",$modello);
		$descrizione = str_replace("'"," ",$descrizione);

		/* Controllo la lunghezza della descrizione e tolgo gli spazi */

		$lenght = strlen($descrizione);
		for($i=0; $i < $lenght; $i++) $descrizione = trim($descrizione);

		$control = $admin->modifyVeicolo($id, $targa, $modello, $immagine, $descrizione, $prezzo);
		if(!$control) {
			echo "Errore durante la modifica, "; echo "<a href=../views/admin.php >Riprova</a>"; 
			}
		else header("location:../views/admin.php");
	}
}
?>