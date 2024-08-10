<!doctype html>
<html lang="en">
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
    </head>
    <body>
        <?php
            require_once('db.php');         // collegamento al database
            $_SESSION['session_lang'] = $_GET["lang"] ?? $session_lang;     // assegno la lingua alla var di sessione se il valore passato con il GET altrimenti riassegno se stessa 
            $L = htmlspecialchars($_SESSION['session_lang']);               // variabile di appoggio
            
            $sql = "SELECT * FROM voclista AS g WHERE g.lingua = '$L' UNION ALL SELECT * FROM guihome AS gh WHERE gh.lingua = '$L';";          // prende il vocaboli dal db

            $res= $conn->query($sql);       // salvo il risultato

            if (!$res) {
                die('Errore nella query: ' . $conn->error);
            }
            
            $k = 0;
            while( $row = $res->fetch_assoc()){
                $ref = $row['VocRef'];
                $voc  = $row['voc'];
                $trad[$ref] = $voc;
            }
        ?>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b><?php echo $trad['Home']; ?></b></a>
                <h2><?php echo $trad['Tutti i pazienti']; ?></h2>
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>
                    <a href="logout.php">
                        <button type="button" class="btn btn-danger">Logout</button>
                    </a>
                </div>
            </div>
        </nav>

        
		<a href="home.php">
            <button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- <?php echo $trad['Indietro']; ?></button>
        </a>
        <!-- buttons to change language -->
        <div style='margin-left: auto; margin-right: 5%; display: flex; justify-content: flex-end;'>
            
            <a href="listapazienti.php?lang=ITA">
                <button type="button" class='buttonLang'><img src="rsc/itFlag.svg" width='100%' height='100%'></button>
            </a>
            <a href="listapazienti.php?lang=ENG">
                <button type="button" class='buttonLang'><img src="rsc/enFlag.svg" width='100%' height='100%'></button>
            </a>
            <a href="listapazienti.php?lang=ARAB">
                <button type="button" class='buttonLang'><img src="rsc/kFlag.png" width='50%' height='100%'></button>
            </a>
        </div>

        <?php 
            require_once('db.php');
			if (isset($_POST['eliminaP'])){
				//var_dump($_POST);

                $id = $_POST['eliminaP'] ?? '';

                $sql = "DELETE FROM `anagrafica` WHERE `ID` = '$id';";

                if ($conn->query($sql) === TRUE) {
                }

                $sql = "DELETE FROM `paziente` WHERE `ID` = '$id';";

                if ($conn->query($sql) === TRUE) {
                }
            }
        ?>
        <div class='box'>
            <div class="input-group mb-3">
                <select class="input-group-select">
                    <option selected>Tutto</option>
                    <option value="1">ID</option>
                    <option value="2">Nome</option>
                    <option value="3">Cognome</option>
                </select>
                <input type="text" class="form-control">
                <input type="button" class="input-group-button" value="🔍">
            </div>

            <table class='table table-hover'>
                <thead>
                    <tr class="d-flex">
                        <th scope="col" class="flex-fill">
                            ID
                        </th>
                        <th scope="col" class="flex-fill">
                            <?php echo $trad['cognome']; ?>
                        </th>
                        <th scope="col" class="flex-fill">
                            <?php echo $trad['nome']; ?>
                        </th>
                        <th scope="col" class="flex-fill">
                            <?php echo $trad['Nato il']; ?>
                        </th>
                        <th scope="col" class="flex-fill">
                            <?php echo $trad['Provenienza']; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('db.php');

                        $sql = "SELECT `ID`, `nome`, `cognome`, `dataNascita`, `provenienza` FROM `anagrafica`";

                        $res= $conn->query($sql);

                        while($row = $res->fetch_assoc()) {
                            $link = '"paziente.php?ID='.$row["ID"].'"';
                            echo "
                                <tr scope='row' class='d-flex' onclick = 'document.location = ".$link.";'>
                                    <td class='flex-fill'>".$row["ID"]."</td>
                                    <td class='flex-fill'>".$row["cognome"]."</td>
                                    <td class='flex-fill'>".$row["nome"]."</td>
                                    <td class='flex-fill'>".$row["dataNascita"]."</td>
                                    <td class='flex-fill'>".$row["provenienza"]."</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>