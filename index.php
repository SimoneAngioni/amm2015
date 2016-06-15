<!DOCTYPE html>

<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!-- Richiamo la funzione css -->
    <link href="assets/css/index.css" rel="stylesheet" type="text/css" /> 

<script>
    function getAndCloseInfo() {
        document.getElementById("event").innerHTML = '<object width=\"100%\" height=\"100%\" data="info.php" ></object>';
        /* dopo aver caricato le info cambio il nome del bottone
         * e cambio l'evento al click */
        document.getElementById("eventButton").innerHTML = 'Close Info';
        document.getElementById("eventButton").addEventListener("click", function(){
            window.location.reload(true);
        })
    }
</script>
</head>

<body>
        <!-- Barra laterale -->
        <div id="menuBar">
            <fieldset id="initialImage">
                   <!-- <img <!-src="http://www.bafan.it/graffi/wp-content/uploads/konji2.jpg" id="image"> -->
            </fieldset>
            
            <form action="includes/views/login_form_utente.php" method="post">
            <button type="submit" id="userLogin">Login as User</button></form>
        
            <form action="includes/views/login_form_admin.php" method="post">
            <button type="submit" id="adminLogin">Login as Admin</button></form>

            <button type ="submit" onclick="getAndCloseInfo()" id="eventButton">Info</button>
        
        </div>
        
        <!-- barra superiore -->
        <div id="superiorBar">
            <div id="writeBar">
                <p id="scrittaBenvenuto">Home Page</p>
            </div>
            
            <div id="logoutBar">       
            </div>
        </div>
        
        <div id="workout">
            <div id="event"></div>

            <div id="firma">
                    <p id="myTag"> -->© Created by Angioni Simone for Amm <-- </p>
            </div>
        </div>


</body>
</html>
