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

        <?php
            $id = $_GET["ID"] ?? '';

            require_once('db.php');
			if (isset($_POST['submitR'])){
                var_dump($_POST);

                $id = $_POST['ID'];
                $nome = $_POST['nf'][0];
                $dataVal = $_POST['dataVal'][0];
                $qtn = $_POST['qtn'][0];   // quantità
                $qtu = $_POST['qtu'][0];   // unità
                $qt = $_POST['qt'][0];     // dose
                $note = $_POST['noteR'][0];

                $sql = "INSERT INTO `ricetta`(`id_paziente`, `nome`, `validità`, `qta`, `unita`, `dose`, `note`) 
                    VALUES ('$id','$nome','$dataVal','$qtn','$qtu','$qt','$note')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
            else {
                $num = $_GET['num'] ?? '';
                $usato = $_GET['usato'] ?? '';

                if ($usato == 'True'){
                    $sql = "UPDATE `ricetta` SET `validità`=NULL WHERE `id_paziente`='$id' AND `num`='$num'";
                    $res = $conn->query($sql);
                }

                $sql = "SELECT * FROM `ricetta` WHERE `id_paziente` = '$id' AND `num` = '$num'";

                $res = $conn->query($sql);

                $row = $res->fetch_assoc();

                $nome = $row['nome'] ?? '';
                $dataVal = $row['validità'] ?? '';
                $qtn = $row['qta'] ?? '';
                $qtu = $row['unita'] ?? '';
                $qt = $row['dose'] ?? '';
                $note = $row['note'] ?? '';
            }
        ?>

	</head>
	<body>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Visulizza Ricetta - nome</h2>
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
			<h2>Visualizza Ricetta</h2>
            <br>
            
            <dl class="mb-3 row">
                <dt class="col-sm-3">Nome Farmaco</dt>
                <dd class="col-sm-9"><?php echo $nome ?></dd>
            </dl>

            <!-- if $dataVal == NULL allora stampa allert-->
            <?php
                if ($dataVal != NULL){
                    echo '<dl class="mb-3 row">
                            <dt class="col-sm-3">Valida fino al</dt>
                            <dd class="col-sm-9">'.$dataVal.'</dd>
                        </dl>';
                }
            ?>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Quantità</dt>
                <dd class="col-sm-9"><?php echo $qtn." ".$qtu." ".$qt; ?></dd>
            </dl>

            <dl class="mb-3 row">
                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9"><?php echo $note ?></dd>
            </dl>
			<br>
            <!-- if $dataVal == NULL allora nascondi tasto e mostra allert-->
            <?php
                if ($dataVal == NULL){
                    echo '<div class="alert alert-danger" role="alert">Ricetta non valida!</div>';
                }
                else{
                    echo "<a href='ricetta.php?ID=".$id."&num=".$num."&usato=True'><button type='button' class='btn btn-primary btn-lg' name='Utilizza'>Utilizza</button></a>";
                }
            ?>
		</div>
	</body>
</html>

<!-- aggiungere campo:
    -> usato si/no
    -> quantità ed eventuale unità di misura
    -> 
-->
