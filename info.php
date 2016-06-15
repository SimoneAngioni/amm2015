<!DOCTYPE Html>

<html>
<head>
	<title></title>
	<link href="assets/css/index.css" rel="stylesheet" type="text/css" /> 
</head>
<body>           
<div id="event">
	<h1> Descrizione del sito:</h1>

                <p>Il sito gestisce un salone di auto. </p>
                <p>Il sito prevede due ruoli distinti:</p>
                <ol>
                    <li><b>Utente:</b></li>
                        <ul>
                            <li><b><i>Visualizza</i></b> i veicoli presenti nel database;</li>
                            <li>Ha la possibilità di <b><i>aggiungere</i></b> i veicoli nel carrello;</li>
                            <li>Può decidere se <b><i>comprare</i></b> gli elementi inseriti nel carrello o rimuoverli da esso;</li>
                        </ul>
                    <li><b>Admin:</b></li>
                        <ul>
                            <li>Crea nuovi veicoli con le seguenti caratteristiche:</li>
                                <ul>
                                    <li><b><i>Modello</i></b>;</li>
                                    <li><b><i>Targa</i></b>; (che non sia già esistente nel database)</li>
                                    <li><b><i>Url per un eventuale immagine</i></b>; (non necessaria)</li>
                                    <li><b><i>Descrizione</i></b>; (non necessaria)</li>
                                    <li><b><i>Prezzo</i></b>;</li>
                                </ul>
                            <li>Modifica veicoli già esistenti;</li>
                            <li>Elimina veicoli</li>
                        </ul>
                </ol>
                <br/>
                <h1>Requisiti del progetto:</h1>
                    <ul>
                        <li>Utilizzo di <b><i>HTML</i></b> e <b><i>CSS</i></b>;</li>
                        <li>Utilizzo di <b><i>PHP</i></b> e <b><i>MYSQL</i></b>;</li>
                        <li>Utilizzo del pattern <b><i>MVC</i></b>;</li>
                        <li>Due ruoli [utente], [admin];</li>
                        <li>Transazioni: </li>
                            <ul>
                                <li>Lato <i>Utente:</i></li>
                                    <ol>
                                        <li>Transazione per la vendita di veicoli;</li>
                                        <li>Funzione per l'aggiunta di un veicolo al carrello;</li>
                                        <li>Funzione per la rimozione di un veicolo dal carrello;</li>
                                    </ol>
                            
                                <li>Lato <i>Admin:</i></li>
                                    <ol>
                                        <li>Funzione di aggiunta dei veicoli;</li>
                                        <li>Funzione per la modifica di veicoli;</li>
                                        <li>Funzione per la rimozione di veicoli;</li>
                                    </ol>
                            </ul>
                        <li>Utilizzo di jAjax nel lato utente:   [<b><i>utente.php</i></b>]</li>
                            <ol>
                                <li>I veicoli vengono caricati dal database;</li>
                                <li>L'utente vedrà il nome di ogni veicolo in una select;</li>
                                <li>I dati relativi alla scelta verranno caricati una volta selezionato il modello del veicolo;</li>
                            </ol>
                        <li>Utilizzo di jQuery in ogni pagina che necessita il logout, nella homepage per accedere alle info.</li>
                    </ul>
                <h1>Accesso al progetto:</h1>
                    <p>Ci troviamo già nella <b>home page</b> del progetto,</p>
                    <p>si potrà accedere alle varie pagine attraverso i bottoni presenti nel menù laterale</p>

                    <p>Le credenziali di accesso sono: </p>
                        <ol>
                            <li><b><i>Utente:</i></b></li>
                                <ul>
                                    <li><b>Username:</b> utente</li>
                                    <li><b>Password:</b> utente</li>
                                </ul>
                            <li><b><i>Admin:</i></b></li>
                                <ul>
                                    <li><b>Username:</b> admin</li>
                                    <li><b>Password:</b> admin</li>
                                </ul>
                        </ol>
                <h2>Funzionalità extra:</h2>
                    <ol>
                        <li>Lato Admin:</li>
                            <ul>
                                <li>All'aggiunta di un nuovo veicolo controllo che la targa inserita non sia già esistente;</li>
                                <li>All'aggiunta di un nuovo veicolo controllo che il prezzo sia un numero;</li>
                                <li>All'aggiunta di un nuovo veicolo controllo che l'url inserito non sia vuoto, se lo è gli assegno un immagine che indica il fatto che sia vuoto;</li>
                                <li>All'aggiunta di un nuovo veicolo controllo che il prezzo non sia negativo;</li>
                            </ul>
                        <li>Login:</li>
                            <ul>
                                <li>Aggiunta di uno script per la verifica delle credenziali;</li>
                                <li>Lo script farà apparire un alert in caso le credenziali siano sbagliate;</li>
                            </ul> 
                    </ol>
                   </div>
</body>
</html>