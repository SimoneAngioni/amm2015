<!-- faccio partire la sessione e includo la classe con le funzioni inerenti al progetto */ -->
<?php
    include "../controllers/function.class.php";    
    $classe = new Connessione();
?>
<!-- J ajax -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" language="javascript">
    function showVehicle(id) {
    var xhttp;
    if(id==""){ document.getElementById("showResultResearch").innerHTML = ""; return;} // Se L'id è vuoto non stampo nulla


    if(window.XMLHttpRequest) xhttp = new XMLHttpRequest(); //Controllo che browser è in utilizzo <-- Browser Moderni
    else xhttp = new ActiveXObject("Microsoft.XMLHTTP");    // IE < 7

    xhttp.onreadystatechange = function(){
    if (xhttp.readyState == 4 && xhttp.status == 200) { // status 4 -> richiesta finita e responso pronto... status 200 -> la richiesta è andata a buon fine
      document.getElementById("showResultResearch").innerHTML = xhttp.responseText; // mando in stampa il risultato della richiesta
            }
    };

        xhttp.open("GET", "../controllers/getVehicle.php?id="+id, true); // Mando a getVehicle la richiesta asincrona passandogli come parametro l'id ricevuto dalla funzione.
        xhttp.send();
    }
</script>

<!-- fine J ajax -->

<html>
    <head>
        <!-- richiamo le librerie necessarie per la query -->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />

        <!-- INIZIO JQUERY -->

        <script>
        $(document).ready(function(){
            $("#dialog").dialog({
                autoOpen: false,
                closeOnEscape: false,
                open: function(event, ui) { 
                    $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); 
                },
                show: {
                    effect: "explode",
                    duration: 500
                },
                hide: {
                    effect: "explode",
                    duration: 500
                }
            });
            
            $("#logoutButton").click(function(){
                $("#dialog").dialog("open");
            });

            $("#no").click(function(){
                $("#dialog").dialog("close");
            });

            $("#si").click(function(){
                $("#dialog").dialog("close");
                window.location.href = "../controllers/logout.php";
            });
        });
        </script>

        <!-- FINE JQUERY -->

        <title>Utente</title>
        <!-- Includo le css -->

        <link href="../../assets/css/utente.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/homeUtente.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/selectVehicle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/dialog.css" />
        <meta charset="UTF-8">
    </head>
<body> 
          <!--    creazione barra laterale       -->
            <div id="menuBottoni">
                <fieldset id="userImage">
                        <img src="../../assets/img/User.png" id="image">
                </fieldset>
            
                <form action="carrello.php" method="post">
                <button type="submit" id="carrelloButton">Carrello</button></form>

            </div>
            
            <div id="barraSuperiore">
                <div id="userBar">
                    <p id="scrittaUser">UTENTE</p>
                </div>
                
                <div id="logoutBarra">
                    <button type="submit" id="logoutButton">Logout</button>
                </div>
            </div> 
 
            <div id="workout">
                <div id ="container">
                    <div id = "searchVehicle">
                            <select id="selectDatabase" name="id" onchange="showVehicle(this.value)" > 
                <?php 
                    $nVeicoli = $classe->nVeicoli();

                    if($nVeicoli == 0)  echo '<option value="'.'">Non hai nessun veicolo</option>';
                    else {  
                            echo '<option value="'.'" >Seleziona veicolo</option>';

                                for($i=0;$i<$nVeicoli;$i++){
                                $dati = $classe->recuperaDatiVeicolo($i);
                                echo '<option value="'.$dati['id'].'">'. $dati['modello'] .'</option> ';
                                }
                        }
                ?>
                    </select>
                </div>
            </div> 
                <div id = "showResultResearch">
                
                </div>
            

                <div id="dialog" title="Logout">

                <p id="testoDialog">Sei sicuro di fare il logout?</p>
                <?php 
                    $elementiCarrello = $classe->nElementiCarrello();
                    if($elementiCarrello == 0) ;
                    else echo '
                        <p id="testoDialog">Facendolo elimini gli elementi inseriti nel carrello</p>
                    ';
                ?>
                
                    <button id="si" type="submit">Si</button>

                    <button id="no" type="submit">no</button>
                </div>
                <div id="firma">
                    <p id="myTag"> -->© Created by Angioni Simone for Amm <-- </p>
                </div>
            </div>
            
</body>
</html>

