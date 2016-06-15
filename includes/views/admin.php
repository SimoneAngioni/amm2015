
<?php
    include "../controllers/function.class.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        
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
                window.location.href = "../controllers/logoutAdmin.php";
            });
        });
        </script>
        <title>Admin</title>


       
        <!-- Includo le css -->
        <link href="../../assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/show.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/dialog.css" />
    </head>
<body>
          <!--    creazione barra laterale       -->
            <div id="menuBottoni">
                <fieldset id="userImage">
                        <img src="../../assets/img/auto-icon-admin.png" id="image">
                </fieldset>
                <form action="aggiungiVeicolo.php" method="post">
                <button type="submit" id="addButton">Aggiungi</button></form>
            
            </div>
            
            <div id="barraSuperiore">
                <div id="userBar">
                    <p id="scrittaAdmin">ADMIN HOME PAGE</p>
                </div>
                
                <div id="logoutBarra">
                    <button type="submit" id="logoutButton">Logout</button>
                </div>
            </div> 
 
            <div id="workout">
               <?php /* Ciclo gli elementi del database e li mando in stampa nella home dell'admin 
                      * Nel caso non ci siano elementi nel database mando un messaggio di errore 
                      * Altrimenti li stampo a video nei blocchi prestabiliti */
                    $i=0;
                    $classe = new Connessione();
                    $nVeicoli = $classe->nVeicoli();
                    if($nVeicoli == 0) echo '<div id="noDatabase">
                                            <p id="errorMsg">Non hai nessun veicolo!</p>
                                            </div>
                                            ';
                    else for ($i=0; $i < $nVeicoli ; $i++) { 
                            $dati = $classe->recuperaDatiVeicolo($i); // --> Funzione all'interno di function.class.php

                            echo'   <div id= "container"> 
                                        <div id="contenitoreImage"> 
                                            <img src="'.$dati['immagine'].'" id="image2" >
                                        </div>

                                        <div id= "modelVehicle"> 
                                            <div id="titleDiv">
                                                <p id="title">Modello</p>
                                            </div>

                                            <div id="database">
                                                <input id="modello" value = "'. $dati['modello'].'" readonly = "readonly">
                                            </div>
                                        </div>

                                    <div id= "plateVehicle"> 
                                        <div id="titleDiv">
                                            <p id="title">Targa</p>
                                        </div>

                                        <div id="database">
                                            <input id="plate" value = "'.$dati['targa'].'" readonly = "readonly">
                                        </div>
                                    </div>

                                    <div id= "descriptionVehicle"> 
                                        <div id="titleDiv">
                                            <p id="title">Descrizione</p>
                                        </div>

                                        <div id="descrizione">
                                            <textarea id="description" readonly="readonly">'.$dati['descrizione'].'</textarea>
                                        </div>
                                    </div>
                                        <div id="idVehicle">
                                            <div id="titleBox">
                                                <p id="title">ID</p>
                                            </div>

                                            <div id="littleThing">
                                                <input id="uniqueValue" value ="'.$dati['id'].'" readonly = "readonly">
                                            </div>
                                        </div>
                                        
                                        <div id= "priceVehicle">
                                            <div id="titleBox">
                                                <p id="title">Prezzo</p>
                                            </div>

                                            <div id="littleThing">
                                                <input id="uniqueValue" value ="'.$dati['prezzo'].' €" readonly = "readonly">
                                            </div>
                                        </div>
                                        <div id="modifyVehicle">
                                            <form action="modificaVeicolo.php" method="post">
                                            <button type="submit" id="modifyButton" value= "'.$i.'" name= "nRiga" >Modifica</button></form>
                                        </div>

                                        <div id="removeVehicle">
                                            <form action="../controllers/deleteVeicolo.php" method="post">
                                            <button type="submit" id="removeButton" value= "'.$dati['id'].'" name= "id" >Rimuovi</button></form>
                                        </div>
                                    </div> 
                                ';
                        }
                ?>
               
            </div>
            <!-- finestra che apparirà quando verrà premuto logout -->

            <div id="dialog" title="Logout">
                <p id="testoDialog">Sei sicuro di fare il logout?</p>
                
                <button id="si" type="submit">Si</button>

                <button id="no" type="submit">no</button>
            </div>
            <div id="firma">
                    <p id="myTag"> -->Created by Angioni Simone for Amm <-- </p>
            </div>
</body>
</html>




   


