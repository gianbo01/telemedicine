<!doctype html>
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

        <script>
            function show_alert() {
                if(!confirm("Eliminare definitivamente?")) {
                    return false;
                }
                this.form.submit();
            }
        </script>

    </head>

    <body>


        <?php
			require_once('db.php');
			if (isset($_POST['submitVisita'])){
                var_dump($_POST);

                $id = $_POST['ID'];
                $date = $_POST['date'];
                $psmax = $_POST['psmax'];
                $psmin = $_POST['psmin'];
                $fc = $_POST['fc'];
                $sat = $_POST['sat'];
                $fr = $_POST['fr'];
                $tp = $_POST['tp'];
                $note = $_POST['note'];

                $sql = "INSERT INTO `visita`(`id_paziente`, `date`, `psmax`, `psmin`, `freq_Cardiaca`, `saturazione`, `freq_Respiratoria`, `terapia_prescritta`, `note`, `diagnosi`)
                    VALUES ('$id','$date','$psmax','$psmin','$fc','$sat','$fr','$tp','$note', '')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $sql = "SELECT MAX(`num`) AS n FROM `visita` 
                    WHERE `id_paziente` = '$id' AND `date` = '$date' AND `psmax` = '$psmax' AND `psmin` = '$psmin' AND `freq_Cardiaca` = '$fc' AND `saturazione` = '$sat' AND `freq_Respiratoria` = '$fr' AND `terapia_prescritta` = '$tp' AND `note` = '$note' AND `diagnosi` = ''";

                $resN = $conn->query($sql);

                $rowN = $resN->fetch_assoc();

                $n_visita = $rowN['n'];

                $nome = $_POST['nf'];
                $dataVal = $_POST['dataVal'];
                $qtn = $_POST['qtn'];   // quantità
                $qtu = $_POST['qtu'];   // unità
                $qt = $_POST['qt'];     // dose
                $noteR = $_POST['noteR'];

                $k = 0;
                while($k < count($_POST['nf'])){
                    $sqlRicetta = "INSERT INTO `ricetta`(`id_paziente`, `nome`, `validità`, `qta`, `unita`, `dose`, `note`, `num_visita`) 
                        VALUES ('$id', '".$nome[$k]."', '".$dataVal[$k]."', '".$qtn[$k]."', '".$qtu[$k]."', '".$qt[$k]."', '".$note[$k]."', '$n_visita')";

                    if ($conn->query($sqlRicetta) === TRUE) {
                        echo "New record created successfully";
                        
                    } else {
                        echo "Error: " . $sqlRicetta . "<br>" . $conn->error;
                    }

                    $k++;
                }
            }
            elseif (isset($_POST['modificaVisita'])){
                
                $num = $_POST['modificaVisita'];
                $id = $_POST['ID'];
                $date = $_POST['date'];
                $psmax = $_POST['psmax'];
                $psmin = $_POST['psmin'];
                $fc = $_POST['fc'];
                $sat = $_POST['sat'];
                $fr = $_POST['fr'];
                $tp = $_POST['tp'];
                $note = $_POST['note'];

                
                $sql = "UPDATE `visita` SET `date`='$date',`psmax`='$psmax',`psmin`='$psmin',`freq_Cardiaca`='$fc',`saturazione`='$sat',`freq_Respiratoria`='$fr',`terapia_prescritta`='$tp',`note`='$note' WHERE `num` = '".$_POST['modificaVisita']."'";
                $res= $conn->query($sql);


                // ricetta

                $sqlRicetta = "SELECT * FROM `ricetta` WHERE `id_paziente` = '$id' AND `num_visita` = '$num'";

                $resRicetta = $conn->query($sqlRicetta);

            }
            else{
                $id = $_GET['ID'] ?? '';
                $num = $_GET['num'] ?? '';
                $date = $_GET['data'] ?? '';

                $sql = "SELECT `id_paziente`, `num`, `date`, `psmax`, `psmin`, `freq_Cardiaca`, `saturazione`, `freq_Respiratoria`, `terapia_prescritta`, `note`, `diagnosi` FROM `visita` 
                    WHERE `num` = '$num' AND `id_paziente` = '$id' ";

                $res= $conn->query($sql);

                $row = $res->fetch_assoc();

                $psmax = $row['psmax'] ?? '';
                $psmin = $row['psmin'] ?? '';
                $fc = $row['freq_Cardiaca'] ?? '';
                $sat = $row['saturazione'] ?? '';
                $fr = $row['freq_Respiratoria'] ?? '';
                $tp = $row['terapia_prescritta'] ?? '';
                $note = $row['note'] ?? '';

                // ricetta

                $sqlRicetta = "SELECT * FROM `ricetta` WHERE `id_paziente` = '$id' AND `num_visita` = '$num'";

                $resRicetta = $conn->query($sqlRicetta);
            }

        ?>

        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2><?php echo $id." / ".$date; ?></h2>
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>

        
		<a href="paziente.php?ID=<?php echo $id?>">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>

        <div class='box'>
            <h2>Visita</h2>
            <br>
            <dl class="mb-3 row" >
                <dt class="col-sm-3">Data Visita</dt>
                <dd class="col-sm-9"><?php echo $date ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Pressione Sanguigna Massima</dt>
                <dd class="col-sm-3"><?php echo $psmax ?></dd>
                <dt class="col-sm-3">Pressione Sanguigna Minima</dt>
                <dd class="col-sm-3"><?php echo $psmin ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Frequenza Cardiaca</dt>
                <dd class="col-sm-3"><?php echo $fc ?></dd>
                <dt class="col-sm-3">Saturazione</dt>
                <dd class="col-sm-3"><?php echo $sat ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Frequenza Respiratoria</dt>
                <dd class="col-sm-9"><?php echo $fr ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Diagnosi</dt>
                <dd class="col-sm-9"><?php echo "diagnosi" ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Terapia Prescritta</dt>
                <dd class="col-sm-9"><?php echo $tp ?></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9"><?php echo $note ?></dd>
            </dl>
            <br>

            <?php
                echo "<hr class='hr' />
                    <h2>Visualizza Ricetta</h2>
                    <br>";
                $i = 0;
                while($row = $resRicetta->fetch_assoc()) {
                    echo "<hr class='hr' />
                        <dl class='mb-3 row'>
                            <dt class='col-sm-3'>Nome Farmaco</dt>
                            <dd class='col-sm-9'>".$row['nome']."</dd>
                        </dl>
                        
                        <dl class='mb-3 row'>
                            <dt class='col-sm-3'>Valida fino al</dt>
                            <dd class='col-sm-9'>".$row['validità']."</dd>
                        </dl>
                        
                        <dl class='mb-3 row'>
                            <dt class='col-sm-3'>Quantità</dt>
                            <dd class='col-sm-9'>".$row['qta']." ".$row['unita']." ".$row['dose']."</dd>
                        </dl>

                        <dl class='mb-3 row'>
                            <dt class='col-sm-3'>Note</dt>
                            <dd class='col-sm-9'>".$row['note']."</dd>
                        </dl>";
                    $i++;
                }
                if($i == 0){
                    echo "nessuna ricetta<br><br>";
                }
            ?>
            
            <br><br>
            <a href='paziente.php?ID=<?php echo $id?>'>
                <button type="button" class="btn btn-primary btn-lg col-5">Torna a <?php echo $id ?></button>
            </a>
            <a href="listaPazienti.php">
                <button type="button" class="btn btn-primary btn-lg col-5 float-end">Tutti i Pazienti</button>
            </a>

        </div>

        
        <br>
        <div class="box">
            <form action='modificaVisita.php' method='post'>  
				<button type="submit" class="btn btn-warning btn-lg col-5" value='<?php echo $num ?>' name='modificaV'>Modifica</button>
            </form>
            <form action='paziente.php?ID=<?php echo $id?>' method='post' onsubmit='return show_alert();'>
				<button type="submit" class="btn btn-danger btn-lg col-5 float-end" style="margin-top: -50px" value='<?php echo $num ?>' name='eliminaV'>Elimina</button>
			</form>
		</div>
    </body>

</html>