<?php
 include ("dbConfig.php");
 session_start();

 class Connessione{
  
    public $conn;

    
   public function dbConnect(){
    $this->conn= mysql_connect(DB_HOST,DB_USER,DB_PSW) or die("Impossibile connettersi al database");
    mysql_select_db(DB_NAME,$this->conn);
    
   }
   
   public function nVeicoli(){
    $this->dbConnect();
    $query = "SELECT * FROM veicolo;";
    $result = mysql_query($query, $this->conn);
    $row = mysql_num_rows($result);
    mysql_close($this->conn);
    
    if($row == null) return 0;
    return $row;
   }

   
    /* Controllo che la targa passata in ingresso
       esista già nel database, se esiste restituisco
       i numeri delle righe in quanto voglio che non 
       possa essere inserito nessun altro veicolo con 
       la stessa targa */
    public function controlTarga($targa){
      $this->dbConnect();
      $query = "SELECT * FROM veicolo where targa = '$targa'";
      $result = mysql_query($query, $this->conn);
      $row = mysql_num_rows($result);
      mysql_close($this->conn);
      return $row;
    }


    /* Controllo che la targa passata in ingresso
       esista già nel database, se esiste restituisco
       i numeri delle righe in quanto voglio che non 
       possa essere inserito nessun altro veicolo con 
       la stessa targa escludendo il veicolo che sto 
       andando a modificare                       */

    public function controlTargaMyId($targa,$id){
      $this->dbConnect();
      $query = "SELECT * FROM veicolo where targa = '$targa', id != $id ";
      $result = mysql_query($query, $this->conn);
      $row = mysql_num_rows($result);
      mysql_close($this->conn);

      return $row;
    }

    /** Recupero i dati del veicolo tramite riga
    * inserisco il numero della riga
    */
   public function recuperaDatiVeicolo($nriga)
  { 
    $this->dbConnect();
    $query = "SELECT * FROM veicolo LIMIT 1 OFFSET $nriga ;";
    $res = mysql_query($query,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);

    
    return $row;
  }
  
   /** Aggiungo un veicolo al database.
    * Chiedo in ingresso i parametri richiesti dal database.
    * L'id non è necessario metterlo in ingresso in quanto nel database verrà incrementato automaticamente
    * ad ogni veicolo creato.
    * */
   public function addVeicolo($id, $targa,$modello,$immagine,$descrizione, $prezzo){
    $this->dbConnect();
    $query = "INSERT INTO veicolo (id, targa, modello, immagine, descrizione, prezzo)  VALUES( '$id' , '$targa', '$modello', '$immagine', '$descrizione', '$prezzo');";
    $result= mysql_query($query, $this->conn);
     
    
    if(!$result) {
      mysql_close($this->conn); return false;
    }
    else {
      mysql_close($this->conn); return true;
    }

   }
   
   /** Modifico un elemento del database in base all'id
    * non do la possibilità di modificare l'id
    * */
   
   public function modifyVeicolo($id, $targa,$modello,$immagine,$descrizione, $prezzo){
    $this->dbConnect();
    $query = "UPDATE veicolo SET targa = '$targa', modello='$modello', immagine = '$immagine', descrizione = '$descrizione', prezzo= '$prezzo' WHERE id= '$id'; ";
    $result = mysql_query($query, $this->conn);
    
    if(!$result) {mysql_close($this->conn); return false;}
    else {mysql_close($this->conn); return true;}
   }
   
   public function deleteVeicolo($id){
    $this->dbConnect();

    $query = "DELETE FROM veicolo WHERE id = $id ;";

    $result= mysql_query($query, $this->conn);

    if(!$result){ mysql_close($this->conn); return false;}
    else{ mysql_close($this->conn); return true;}
   }
   

// ---> Funzioni database utente e carrello


  public function verifyLogin($nome,$password){
    $this->dbConnect();
    $query = "SELECT * FROM utenti WHERE nome='$nome' AND password='$password'";
    $res = mysql_query($query,$this->conn);
    if($row = mysql_fetch_array($res)) return $row['id_utenti'];
    else  return false;
  }

 public function addCarrello($id){
  $this->dbConnect();
  $utente = $_SESSION['utente_id'];
  $query = "INSERT INTO CARRELLO (id_carrello, veicolo_id, utente_id) VALUES (DEFAULT, '$id', $utente);";
  $res = mysql_query($query, $this->conn);

  if(!$res) { mysql_close($this->conn); return false; }
  else {mysql_close($this->conn); return true; }
 }

 public function deleteCarrello(){
  $this->dbConnect();

  $query = "DELETE FROM carrello ;";

  $result= mysql_query($query, $this->conn);

  if(!$result){ mysql_close($this->conn); return false;}
  else{ mysql_close($this->conn); return true;}
 }

 public function deleteCarrelloId($id){
  $this->dbConnect();

  $query = "DELETE FROM carrello WHERE id_carrello = $id;";

  $result= mysql_query($query, $this->conn);

  if(!$result){ mysql_close($this->conn); return false;}
  else{ mysql_close($this->conn); return true;}
 }

 public function nElementiCarrello(){
  $this->dbConnect();
  $utente = $_SESSION['utente_id'];
  $query = "SELECT * FROM carrello WHERE utente_id = '$utente';";

  $result = mysql_query($query, $this->conn);

  $row = mysql_num_rows($result);

  if($row == null) return 0;
  return $row;
 }

 public function recuperoDaticarrello($nRiga){
  $this->dbConnect();
    $utente = $_SESSION['utente_id'];
    $query = 'SELECT * FROM veicolo INNER JOIN carrello ON veicolo.id = carrello.veicolo_id AND carrello.utente_id = '. $utente .' LIMIT 1 OFFSET '. $nRiga .';';
    $res = mysql_query($query,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row;
 }

 public function recuperoUsername(){
  $this->dbConnect();
  $utente = $_SESSION['utente_id'];

  $query = 'SELECT nome FROM utenti WHERE id_utenti = '.$utente.';';
  $res = mysql_query($query, $this->conn);
  $nome = mysql_fetch_array($res);
  mysql_close($this->conn);

  return $nome;
 }

}
?>  