<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link rel="stylesheet" href="stile.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <?php
            session_start();

            if (isset($_SESSION['session_id'])) {               // se è stato definito il token id allora
                // definisco le variabili di sessione
                $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');   // username
                $session_id = htmlspecialchars($_SESSION['session_id']);                            // id
                $session_role = htmlspecialchars($_SESSION['session_role']);                        // ruolo
                $session_lang = htmlspecialchars($_SESSION['session_lang']);                        // lingua
            } else {
                header('Location: /');                          // ritorna alla schermata di login altrimenti
            }
        ?>
    </head>
    <body>
        <?php
            require_once('db.php');         // collegamento al database
            $_SESSION['session_lang'] = $_GET["lang"] ?? $session_lang;     // assegno la lingua alla var di sessione se il valore passato con il GET altrimenti riassegno se stessa 
            $L = htmlspecialchars($_SESSION['session_lang']);               // variabile di appoggio
            
            $sql = "SELECT * FROM vocglobal AS g WHERE g.lingua = '$L' UNION ALL SELECT * FROM guihome AS gh WHERE gh.lingua = '$L';";          // prende il vocaboli dal db

            $res= $conn->query($sql);       // salvo il risultato

            if (!$res) {
                die('Errore nella query: ' . $conn->error);
            }
            
            $k = 0;
            while( $row = $res->fetch_assoc()){     // ciclo il risulato
                //$lang[$k] = $row;                   // e lo salvo in un array temporaneo
                //$k++;
                
                $ref = $row['VocRef'];
                //$lingua = $row['lingua'];
                $voc  = $row['voc'];
                $trad[$ref] = $voc;
                // echo $ref.'=>'.$trad[$ref].'<br>';
            }
            // print_r($trad);
        ?>
        <!-- navbar -->
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b><?php echo $trad['Home']; ?></b></a>
                
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        <?php echo($session_user." ".$session_role); ?>
                    </span>
                    <a href="logout.php">
                        <button type="button" class="btn btn-danger"><?php echo $trad['Esci']; ?></button>
                    </a>
                </div>
            </div>
        </nav>
        <br>

        <!-- buttons to change language -->
        <div style='margin-left: auto; margin-right: 5%; display: flex; justify-content: flex-end;'>
            <a href="home.php?lang=ITA">
                <button type="button" class='buttonLang'><img src="rsc/itFlag.svg" width='100%' height='100%'></button>
            </a>
            <a href="home.php?lang=ENG">
                <button type="button" class='buttonLang'><img src="rsc/enFlag.svg" width='100%' height='100%'></button>
            </a>
            <a href="home.php?lang=ARAB">
                <button type="button" class='buttonLang'><img src="rsc/kFlag.png" width='50%' height='100%'></button>
            </a>
        </div>
    
        <br>
        <!-- menu buttons -->
        <div class='box'>
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <a href="addPaziente.php">
                        <button class="btn btn-primary w-100 p-3 fs-3" type="button" style="border-radius:25px">
                            <img src="rsc/add.png" width='60%' height='60%'><br><b><?php echo $trad['Nuovo Paziente']; ?></b>
                        </button>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="listaPazienti.php">
                        <button class="btn btn-primary w-100 p-3 fs-3" type="button" style="border-radius:25px">
                            <img src="rsc/list.png" width='60%' height='60%'><br><b><?php echo $trad['Lista Paziente']; ?></b>
                        </button>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="rubrica.php">
                        <button class="btn btn-primary w-100 p-3 fs-3" type="button" style="border-radius:25px">
                            <img src="rsc/contacts.png" width='60%' height='60%'><br><b><?php echo $trad['Rubrica']; ?></b>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php
            // in base ai ruoli cambia la visualizzazione dei collegamenti
            if($session_role >= 7){
                echo "
                    <div class='mb-3 row' style='margin-left: 5%;'>
                        <div class='col-sm-4'>
                            <a href='admin.php'>
                                <button class='btn btn-primary w-100 p-3 fs-3' type='button' style='border-radius:25px'>⚙️ ".$trad['Lista Utenti']."</button>
                            </a>
                        </div>
                    </div>
                ";
            }
            

        ?>
        <?php
            //var_dump($_POST);
        ?>

    </body>
</html>