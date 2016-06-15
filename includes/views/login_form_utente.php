<!DOCTYPE html>
<script language="javascript" type="text/javascript">
    function validateUser() {
    var x = document.forms["myForm"]["username"].value;
    var y = document.forms["myForm"]["psw"].value;
    if((x != "utente") || (y != "utente")){
     alert("Nome o password errati");
     return false;
    }
}
</script>
<html>
<head>
    <title>LoginUtente</title>
    <meta charset="UTF-8">
    <!-- Richiamo la funzione css -->
    <link href="../../assets/css/login.css" rel="stylesheet" type="text/css" /> 
</head>

<body>
        <!-- Barra laterale -->
        <div id="menuBar">
            <fieldset id="initialImage">
                    <img src="../../assets/img/auto-icon3.png" id="image">
            </fieldset>
            
            <form action="login_form_utente.php" method="post">
            <button type="submit" id="userLogin">Login as User</button></form>
        
            <form action="login_form_admin.php" method="post">
            <button type="submit" id="adminLogin">Login as Admin</button></form>
        </div>
        
        <!-- barra superiore -->
        <div id="superiorBar">
            <div id="writeBar">
                <p id="scrittaBenvenuto">Welcome Back User</p>
            </div>
            
            <div id="indietro">
                <form action="../../index.php" method="get">
                <button type="submit" id="goBackButton">Indietro</button></form>                
            </div>
        </div>
        
        <div id="workout">
            <div id="loginTable">
                <div id="loginScritta" >
                    <p id="scritta">Login</p>
                </div>
                
                <div id="usernameField">
                    <form name="myForm" action="../controllers/verifyLogin.php" method="post" onsubmit="return validateUser()">
                    <label for="username" id="usernameScritta">Username:</label>
                    <input type="text" id="inputUsername" name="username" required>
                </div>
                
                <div id="passwordField">
                    <label for="psw" id="passwordScritta">Password:</label>
                    <input type="password" name="psw" id="inputPassword" required>
                </div>
                
                <div id="accediField">
                    
                    <button type="submit" id="accediButton">Accedi</button></form>
                </div>
            </div>
        </div>


</body>
</html>
