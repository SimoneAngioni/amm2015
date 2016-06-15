<?php
    include "../controllers/function.class.php";
?>



<html>
    <head>
        <meta charset="UTF-8">

        
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
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
                /*faccio il logout in questa pagina perchè 
                 * non c'è bisogno di liberare il carrello;
                 */
            });
        });
</script>


        <title>Carrello</title>

       
        <!-- Includo le css -->
        <link href="../../assets/css/utente.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/acquistoEffettuato.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/dialog.css" />
    </head>
<body>
          <!--    creazione barra laterale       -->
            <div id="menuBottoni">
                <fieldset id="userImage">
                        <img src="../../assets/img/auto-icon-admin.png" id="image">
                </fieldset>

                <form action="utente.php" method="post">
                <button type="submit" id="homeButton">Home</button></form>

            </div>
            
            <div id="barraSuperiore">
                <div id="userBar">
                    <p id="scrittaUser">Acquisto effettuato</p>
                </div>
                
                <div id="logoutBarra">
                    <button id="logoutButton">Logout</button>
                </div>
            </div>  
 
            <div id="workout">
               <?php 
                    $admin = new Connessione();
                    $prezzoTot = $_POST['prezzoTot'];
                    $utente = $admin->recuperoUsername();
                    $utenteNome = $utente['nome'];
                    echo '
                        <div id="container">
                            <div id="scrittaField">
                                <p id="scritta" > Complimenti "'.$utenteNome.'"!</p>
                                <p id="scritta" > L\'acquisto di importo € '.$prezzoTot.' e\' andato a buon fine,</p>
                                <p id="scritta" > La contatteremo alla sua mail quando il veicolo e\' pronto per il ritiro! </p>
                            </div>
                        </div>
                    ';

                    $eliminoDatabase = $admin->deleteCarrello();
                ?>
               
            </div>

            <!-- finestra che apparirà quando verrà premuto logout -->

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