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



		

		<?php
            session_start();

            if (isset($_SESSION['session_id'])) {
                $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
                $session_id = htmlspecialchars($_SESSION['session_id']);
                $session_role = htmlspecialchars($_SESSION['session_role']);
                $session_lang = htmlspecialchars($_SESSION['session_lang']);
            } else {
                header('Location: /');
            }
        ?>

	</head>

	<body>
		<?php
            require_once('db.php');
            $_SESSION['session_lang'] = $_GET["lang"] ?? $session_lang;
            $L = htmlspecialchars($_SESSION['session_lang']);
            
            $sql = "SELECT $L FROM `vocaddpaziente`";

            $res= $conn->query($sql);

            $k = 0;
            while( $row = $res->fetch_assoc()){
                $lang[$k] = $row;
                $k++;
            }
        ?>

		<?php
			var_dump($_POST);

			$id = $_POST['modificaA'] ?? '';
			require_once('db.php');
				
			$sql ="SELECT A.nome, A.cognome, A.nome_madre, A.sesso, A.dataNascita, A.provenienza, A.num_tenda, A.sezione
				FROM `anagrafica` AS A
				WHERE `ID`= '$id';";

			$res= $conn->query($sql);

			$row = $res->fetch_assoc();

			$nome = $row['nome'];
			$cognome = $row['cognome'];
			$nome_madre = $row['nome_madre'];
			$sesso = $row['sesso'];
			$dataN = $row['dataNascita'];
			$prov = $row['provenienza'];
			$num_tenda = $row['num_tenda'];
			$sezione = $row['sezione'];
				

		?>

		<script type="text/javascript">
			window.onload = function() {
				// Verifica iniziale alla pagina caricata
				otherProvenienza(document.getElementById('prov').value);
			};
			function otherProvenienza(val){			// se provenienza è uguale ad Altro allora mostra la casella di testo
				var prov = '<?php echo $prov; ?>';
				if(val=='altro' && (prov != 'Bajed Khandala 1' && prov != 'Bajed Khandala 2' && prov != 'Faysh Khabur')){
					document.getElementById('altraP').innerHTML='<input type="text" class="form-control" name="otherProv" id="otherProv" placeholder="Altra provenienza" value="' + prov + '" required/>';
				}
				else{
					document.getElementById('altraP').innerHTML="";
				}
			}

		</script>
		
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2><?php echo $lang[0][$L]; ?></h2>
				<div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
						<?php echo($session_user." ".$session_role); ?>
                    </span>
                    <a href="logout.php">
                        <button type="button" class="btn btn-danger"><?php echo $lang[43][$L]; ?></button>
                    </a>
                </div>
            </div>
        </nav>

		<div style="display: flex; justify-content: space-around">
			<a href="home.php">
				<button type="button" class="btn btn-secondary" style="margin-left: 0%;margin-bottom: 15px;"><-- <?php echo $lang[44][$L]; ?></button>
			</a>
			<div class='lang'>
				<a href="addPaziente.php?lang=ITA">
					<button type="button" class='buttonLang'><img src="rsc/itFlag.svg" width='100%' height='100%'></button>
				</a>
				<a href="addPaziente.php?lang=ENG">
					<button type="button" class='buttonLang'><img src="rsc/enFlag.svg" width='100%' height='100%'></button>
				</a>
				<a href="addPaziente.php?lang=ARAB">
					<button type="button" class='buttonLang'><img src="rsc/kFlag.png" width='50%' height='100%'></button>
				</a>
			</div>
		</div>

		<form action="paziente.php" method="post" class="was-validated">
			
			<div class='box'>
				<h4><?php echo $lang[1][$L]; ?></h4>
                <br>
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label"><?php echo $lang[2][$L]; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="<?php echo $lang[2][$L]; ?>" value="<?php echo $nome; ?>" required>
      					<div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cognome" class="col-sm-2 col-form-label"><?php echo $lang[3][$L]; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="<?php echo $lang[3][$L]; ?>" value="<?php echo $cognome; ?>" required>
      					<div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nome_madre" class="col-sm-2 col-form-label"><?php echo $lang[4][$L]; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome_madre" name="nome_madre" placeholder="<?php echo $lang[4][$L]; ?>" value="<?php echo $nome_madre; ?>" required>
      					<div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                </div>
                <div class="mb-3 row" >
                    <label for="sesso" class="col-sm-2 col-form-label"><?php echo $lang[5][$L]; ?></label>
                    <div class="col-sm-3" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="sesso" id="sesso" value="maschio" <?php if($sesso == 'maschio') echo 'checked'; ?> required>
						<label class="form-check-label" for="maschio"><?php echo $lang[6][$L]; ?></label>
					</div>
					<div class="col-sm-6">
						<input class="form-check-input" type="radio" name="sesso" id="sesso" value="femmina" <?php if($sesso == 'femmina') echo 'checked'; ?> required>
						<label class="form-check-label" for="femmina"><?php echo $lang[7][$L]; ?></label>
					</div>
                </div>
                <div class="mb-3 row">
                    <label for="dataN" class="col-sm-2 col-form-label"><?php echo $lang[8][$L]; ?></label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dataN" name="dataN" value="<?php echo $dataN ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="prov" class="col-sm-2 col-form-label"><?php echo $lang[9][$L]; ?></label>
                    <div class="col-sm-5">
						<select class="form-select" name="prov" id="prov" onchange='otherProvenienza(this.value);' required>
							<option value="">- select -</option>
							<option value="Bajed Khandala 1" <?php if($prov == 'Bajed Khandala 1') echo 'selected'; ?>>Bajed Khandala 1</option>
							<option value="Bajed Khandala 2" <?php if($prov == 'Bajed Khandala 2') echo 'selected'; ?>>Bajed Khandala 2</option>
							<option value="Faysh Khabur" <?php if($prov == 'Faysh Khabur') echo 'selected'; ?>>Faysh Khabur</option>
							<option value="altro" <?php if(!($prov == 'Bajed Khandala 1' || $prov == 'Bajed Khandala 2' || $prov == 'Faysh Khabur')) echo 'selected'; ?>><?php echo $lang[10][$L]; ?></option>
						</select>
					</div>
					<div class="col-sm-5">
						<p id="altraP"></p>
                    </div>
                </div>
				<div class="mb-3 row">
					<label for="num_tenda" class="col-sm-2 col-form-label"><?php echo $lang[11][$L]; ?></label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="num_tenda" name="num_tenda" placeholder="<?php echo $lang[11][$L]; ?>" value="<?php echo $num_tenda ?>">
					</div>
					<label for="sezione" class="col-sm-2 col-form-label"><?php echo $lang[12][$L]; ?></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sezione" name="sezione" placeholder="<?php echo $lang[12][$L]; ?>"  value="<?php echo $sezione ?>">
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary btn-lg" name='aggiornaPaziente' value="<?php echo $id ?>"><?php echo $lang[45][$L]; ?></button>
			</div>
			
			
		</form>

	</body>
</html>