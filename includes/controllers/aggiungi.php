<?php
include "function.class.php";


	$admin = new Connessione();
	/* Cerco il numero di record presenti nel database */ 

	$nRiga = $admin->nVeicoli();
	/* assegno a una variabile l'elemento che rappresenta l'ultimo record nel database */
	$lastRecord = $nRiga - 1;

for($i=0; $i < $nRiga; $i++){
	$trovaId = $admin->recuperaDatiVeicolo($lastRecord); // Recupero tutti i dati riguardanti l'ultimo elemento
	if($i == $lastRecord) $id = $trovaId['id']; // Assegno ad una variabile temporanea il valore dell'ultimo id presente nel database
}

	$id ++ ; // Incremento il valore dell'id che verrà assegnato al record che andrò a salvare successivamente


	$targa = $_POST['targa'];

	$controlTarga = $admin->controlTarga($targa);
/** Controllo che la targa inserita 
	non sia già esistente nel database */
if($controlTarga > 0){
	echo "Errore Targa gia presente!"; echo"<a href=../views/aggiungiVeicolo.php> Torna indietro </a>";
}
else{
	$modello = $_POST['modello'];
	if(empty($_POST['immagine'])) 
		$immagine = "../../assets/img/noImage.jpg"; /* inserisco un immagine di default nel caso il campo immagine inserito sia vuoto */
	else{
		$immagine = $_POST['immagine'];
	}
	$descrizione = $_POST['descrizione'];
	$prezzo = $_POST['prezzo'];

	/* Verifico il prezzo inserito del veicolo, 
	   se non è un numero blocco l'inserimento, 
	   ugualmente se il prezzo è minore di 0 */
	if(!is_numeric($prezzo)) {
		echo "Per favore inserisci un numero come prezzo!"; 
		echo "<a href=../views/aggiungiVeicolo.php >Torna indietro</a>"; 
	}else if($prezzo < 0) {
		echo "Prezzo inserito minore 0!"; 
		echo "<a href=../views/aggiungiVeicolo.php >Torna indietro</a>"; 
	}else {

	$modello= str_replace("'"," ",$modello);
	$descrizione = str_replace("'"," ",$descrizione);

	/* Controllo la lunghezza della descrizione e tolgo gli spazi */

	$lenght = strlen($descrizione);
	for($i=0; $i < $lenght; $i++) $descrizione = trim($descrizione);

	$control = $admin->addVeicolo($id , $targa,$modello,$immagine,$descrizione, $prezzo);

	if(!$control) {
		echo "Errore durante l'aggiunta del record al database"; echo "<a href=../views/admin.php >Torna indietro</a>"; 
		}
	else header("location:../views/admin.php");
	}
}
?>