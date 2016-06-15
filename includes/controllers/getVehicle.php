
<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="../../assets/css/selectVehicle.css">
		</head>
	<body>

		<?php		
		include "../controllers/function.class.php";

		$con = mysqli_connect('localhost', 'root', '', 'amm15-angionisimone');
		if(!$con) {
			die('impossibile connettersi :' +mysql_error($con));
		}
		$id= intval($_GET['id']);

		$sql = "SELECT * FROM veicolo WHERE id = '".$id."' ";
		$result = mysqli_query($con, $sql);

while($dati = mysqli_fetch_array($result)) {
		echo'   <div id= "container2"> 
                                        <div id="contenitoreImage"> 
                                            <img src="'.$dati['immagine'].'" id="image" >
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

                                        <div id="database">
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
                                        <div id="aggiungiAlCarrello">
                                            <form action="../controllers/aggiungiCarrello.php" method="post">
                                            <button type="submit" id="addButton" value= "'.$dati['id'].'" name= "nRiga" >Aggiungi Al Carrello</button></form>
                                        </div>
                                    </div> 
                                ';
                            }
				mysqli_close($con);
	?>
	</body>
</html>