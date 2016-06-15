<?php
    include "../controllers/function.class.php";
?>
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
                window.location.href = "../controllers/logoutAdmin.php";
            });
        });
        </script>

        <!-- FINE JQUERY -->

        <meta charset="UTF-8">
        <title>Admin</title>
        <!-- Includo le css -->
        <link href="../../assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/aggiungiVeicolo.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../../assets/css/dialog.css" />
    </head>
<body>
          <!--    creazione barra laterale       -->
            <div id="menuBottoni">
                <fieldset id="userImage">
                        <img src="../../assets/img/auto-icon-admin.png" id="image">
                </fieldset>
                <form action="aggiungi_veicolo.php" method="post">
                <button type="submit" id="addButton">Aggiungi</button></form>
            
                <form action="admin.php" method="post">
                <button type="submit" id="indietroButton">Indietro</button></form>
            </div>
            
            <div id="barraSuperiore">
                <div id="userBar">
                    <p id="scrittaAdmin">ADMIN AGGIUNGI</p>
                </div>
                
                <div id="logoutBarra">
                    <button type="submit" id="logoutButton">Logout</button>
                </div>
            </div> 
 
            <div id="workout">
                <div id="aggiungiField">
                    <div id="insertPlate">
                        <div id="nameInsert">
                            <p id="nomeCampo">Modello: </p>
                        </div>

                        <div id="commonInsertField">
                            <form action="../controllers/aggiungi.php" method="post">
                            <input type="name" id="model" name="modello" required="required" >
                        </div>
                    </div>

                    <div id="insertModel">
                        <div id="nameInsert">
                            <p id="nomeCampo">Targa: </p>
                        </div>

                        <div id="commonInsertField">
                            <input type="name" id="plate" name="targa" required="required" >
                        </div>
                    </div>

                    <div id="insertImage">
                        <div id="nameInsert">
                            <p id="nomeCampo">Url Immagine: </p>
                        </div>

                        <div id="commonInsertField">
                            <input type="name" id="img" name="immagine" >
                        </div>
                    </div>

                    <div id="insertDescription">
                        <div id="nameInsert">
                            <p id="nomeCampo">Descrizione: </p>
                        </div>

                        <div id="descriptionField">
                            <textarea name="descrizione" id="description">   
                            </textarea>
                        </div>
                    </div>

                    <div id="insertPrice">
                        <div id="nameInsert">
                            <p id="nomeCampo">Prezzo: </p>
                        </div>

                        <div id="priceField">
                            <input type="name" id="price" name="prezzo" required="required">
                        </div>
                    </div>

                    <div id="buttonSubmit">
                        <button type="submit" id="button">Submit</button>
                        </form>
                    </div>

                </div>

            </div>

            <div id="dialog" title="Logout">
                <p id="testoDialog">Sei sicuro di fare il logout?</p>
                
                <button id="si" type="submit">Si</button>

                <button id="no" type="submit">no</button>
            </div>

            <div id="firma">
                <p id="myTag"> -->© Created by Angioni Simone for Amm <-- </p>
            </div>

</body>
</html>