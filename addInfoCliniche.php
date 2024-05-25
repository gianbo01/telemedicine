<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
		<link href="stile.css" rel="stylesheet" type="text/css"/>
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

			$id = $_GET["ID"];
			
			require_once('db.php');

			$sql = "SELECT * FROM `terapiacronica`;";

			$res= $conn->query($sql);

            $_SESSION['session_lang'] = $_GET["lang"] ?? $session_lang;
            $L = htmlspecialchars($_SESSION['session_lang']);
            
            $sql = "SELECT $L FROM `vocaddpaziente`";

            $resL= $conn->query($sql);

            $k = 0;
            while( $row = $resL->fetch_assoc()){
                $lang[$k] = $row;
                $k++;
            }
        ?>

		<script type="text/javascript">
			function otherProvenienza(val){
				if(val=='altro'){
					document.getElementById('altraP').innerHTML='<input type="text" class="form-control" name="otherProv" id="otherProv" placeholder="Altra provenienza" required/>';
				}
				else{
					document.getElementById('altraP').innerHTML="";
				}
			}

			function picText(val){
				if(val=='picSi') {
					document.getElementById('picSiP').innerHTML='<input type="text" class="form-control" name="pic" id="picSiText" placeholder="<?php echo $lang[22][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('picSiP').innerHTML="<input type='hidden' name='pic' value='Nessuna'>";
				}
			}

			function proText(val){
				if(val=='proSi') {
					document.getElementById('proSiP').innerHTML='<input type="text" class="form-control" name="pro" id="proSiText" placeholder="<?php echo $lang[23][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('proSiP').innerHTML="<input type='hidden' name='pro' value='Nessuna'>";
				}
			}

			function vmeText(val){
				if(val=='vmeSi') {
					document.getElementById('vmeSiP').innerHTML='<input type="text" class="form-control" name="vme" id="vmeSiText" placeholder="<?php echo $lang[24][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('vmeSiP').innerHTML="<input type='hidden' name='vme' value='Nessuna'>";
				}
			}

			function maText(val){
				if(val=='malattieASi') {
					document.getElementById('malattieASiP').innerHTML='<input type="text" class="form-control" name="malattieA" id="malattieAText" placeholder="<?php echo $lang[29][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('malattieASiP').innerHTML="<input type='hidden' name='malattieA' value='Nessuna'>";
				}
			}

			function meText(val){
				if(val=='malattieESi') {
					document.getElementById('malattieESiP').innerHTML='<input type="text" class="form-control" name="malattieE" id="malattieEText" placeholder="<?php echo $lang[33][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('malattieESiP').innerHTML="<input type='hidden' name='malattieE' value='Nessuna'>";
				}
			}

			function tText(val){
				if(val=='tumoriSi') {
					document.getElementById('tumoriSiP').innerHTML='<input type="text" class="form-control" name="tumori" id="tumoriText" placeholder="<?php echo $lang[34][$L]; ?>" required/>';
				}
				else  {
					document.getElementById('tumoriSiP').innerHTML="<input type='hidden' name='tumori' value='Nessuna'>";
				}
			}


			function allergieText(val){
				if(val=='allergieSi') {
					document.getElementById('allergieSiP').innerHTML='<input type="text" class="form-control" name="allergie" id="allergieSiText" placeholder="Allergie" required/>';
				}
				else  {
					document.getElementById('allergieSiP').innerHTML="<input type='hidden' name='allergie' value='Nessuna'>";
				}
			}

		</script>

		
		
		

	</head>

	<body>
		
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2><?php echo $lang[0][$L]; ?></h2>
				<div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>
                    <a href="logout.php">
                        <button type="button" class="btn btn-danger"><?php echo $lang[43][$L]; ?></button>
                    </a>
                </div>
            </div>
        </nav>

		<div style="display: flex; justify-content: space-around">
			<a href="paziente.php?ID=<?php echo $id ?>">
				<button type="button" class="btn btn-secondary btn-lg" style="margin-left: 5%;margin-bottom: 15px;"><?php echo $lang[42][$L]; ?></button>
			</a>
			<div class='lang'>
				<a href="addInfoCliniche.php?ID=<?php echo $id ?>&lang=ITA">
					<button type="button" class='buttonLang'><img src="rsc/itFlag.svg" width='100%' height='100%'></button>
				</a>
				<a href="addInfoCliniche.php?ID=<?php echo $id ?>&lang=ENG">
					<button type="button" class='buttonLang'><img src="rsc/enFlag.svg" width='100%' height='100%'></button>
				</a>
			</div>
		</div>

		<form action="paziente.php" method="post" class="was-validated">
			<input type="hidden" name="id" value=<?php echo $id ?>>
			<div class='box'>
				<h4><?php echo $lang[13][$L]; ?></h4>
				<br>
				<h5><?php echo $lang[14][$L]; ?></h5>
				<br>
				<div class="mb-3 row" >
                    <label for="morbillo" class="col-sm-2 col-form-label"><?php echo $lang[15][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="morbillo" id="morbillo" value="morbillo, " required>
						<label class="form-check-label" for="morbilloSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="morbillo" id="morbillo" value="" required>
						<label class="form-check-label" for="morbilloNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="varicella" class="col-sm-2 col-form-label"><?php echo $lang[16][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="varicella" id="varicella" value="varicella, " required>
						<label class="form-check-label" for="varicellaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="varicella" id="varicella" value="" required>
						<label class="form-check-label" for="varicellaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="rosolia" class="col-sm-2 col-form-label"><?php echo $lang[17][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="rosolia" id="rosolia" value="rosolia, " required>
						<label class="form-check-label" for="rosoliaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="rosolia" id="rosolia" value="" required>
						<label class="form-check-label" for="rosoliaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="scarlattina" class="col-sm-2 col-form-label"><?php echo $lang[18][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="scarlattina" id="scarlattina" value="scarlattina, " required>
						<label class="form-check-label" for="scarlattinaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="scarlattina" id="scarlattina" value="" required>
						<label class="form-check-label" for="scarlattinaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="eritema" class="col-sm-2 col-form-label"><?php echo $lang[19][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="eritema" id="eritema" value="eritema infettivo, " required>
						<label class="form-check-label" for="eritemaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="eritema" id="eritema" value="" required>
						<label class="form-check-label" for="eritemaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="esatema" class="col-sm-2 col-form-label"><?php echo $lang[20][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="esatema" id="esatema" value="esatema critico, " required>
						<label class="form-check-label" for="esatemaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="esatema" id="esatema" value="" required>
						<label class="form-check-label" for="esatemaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="mpb" class="col-sm-2 col-form-label"><?php echo $lang[21][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="mpb" id="mpb" value="mani-piedi-bocca, " required>
						<label class="form-check-label" for="mpbSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="mpb" id="mpb" value="" required>
						<label class="form-check-label" for="mpbNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="pic" class="col-sm-2 col-form-label"><?php echo $lang[22][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="pic" value="picSi" onchange='picText(this.value);' required>
						<label class="form-check-label" for="picSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="pic" value="Nessuna" onchange='picText(this.value);' required>
						<label class="form-check-label" for="picNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='picSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="pro" class="col-sm-2 col-form-label"><?php echo $lang[23][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="pro" value="proSi" onchange='proText(this.value);' required>
						<label class="form-check-label" for="proSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="pro" value="Nessuna" onchange='proText(this.value);' required>
						<label class="form-check-label" for="proNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='proSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="vme" class="col-sm-2 col-form-label"><?php echo $lang[24][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="vme" value="vmeSi" onchange='vmeText(this.value);' required>
						<label class="form-check-label" for="vmeSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="vme" value="Nessuna" onchange='vmeText(this.value);' required>
						<label class="form-check-label" for="vmeNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='vmeSiP'></p>
                    </div>
                </div>
				<hr class="hr" />

				<h6><?php echo $lang[25][$L]; ?></h6>
				<br>
				<div class="mb-3 row" >
                    <label for="ipertensione" class="col-sm-2 col-form-label"><?php echo $lang[26][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="ipertensione" id="ipertensione" value="ipertensione, " required>
						<label class="form-check-label" for="ipertensioneSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="ipertensione" id="ipertensione" value="" required>
						<label class="form-check-label" for="ipertensioneNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieCV" class="col-sm-2 col-form-label"><?php echo $lang[27][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieCV" id="malattieCV" value="malattie cardio-vascolari, " required>
						<label class="form-check-label" for="malattieCVSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieCV" id="malattieCV" value="" required>
						<label class="form-check-label" for="malattieCVNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieR" class="col-sm-2 col-form-label"><?php echo $lang[28][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieR" id="malattieR" value="malattie renali, " required>
						<label class="form-check-label" for="malattieRSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieR" id="malattieR" value="" required>
						<label class="form-check-label" for="malattieRNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieA" class="col-sm-2 col-form-label"><?php echo $lang[29][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieA" id="malattieA" value="malattieASi" onchange='maText(this.value);' required>
						<label class="form-check-label" for="malattieASi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieA" id="malattieA" value="Nessuna" onchange='maText(this.value);' required>
						<label class="form-check-label" for="malattieANo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='malattieASiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="obesita" class="col-sm-2 col-form-label"><?php echo $lang[30][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="obesita" id="obesita" value="obesità, " required>
						<label class="form-check-label" for="obesitaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="obesita" id="obesita" value="" required>
						<label class="form-check-label" for="obesitaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="diabete1" class="col-sm-2 col-form-label"><?php echo $lang[31][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="diabete1" id="diabete1" value="diabete 1, " required>
						<label class="form-check-label" for="diabete1Si">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="diabete1" id="diabete1" value="" required>
						<label class="form-check-label" for="diabete1No">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="diabete2" class="col-sm-2 col-form-label"><?php echo $lang[32][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="diabete2" id="diabete2" value="diabete 2, " required>
						<label class="form-check-label" for="diabete2Si">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="diabete2" id="diabete2" value="" required>
						<label class="form-check-label" for="diabete2No">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieE" class="col-sm-2 col-form-label"><?php echo $lang[33][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieE" id="malattieE" value="malattieESi" onchange='meText(this.value);' required>
						<label class="form-check-label" for="malattieESi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieE" id="malattieE" value="Nessuna" onchange='meText(this.value);' required>
						<label class="form-check-label" for="malattieENo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='malattieESiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="tumori" class="col-sm-2 col-form-label"><?php echo $lang[34][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="tumori" id="tumori" value="tumoriSi" onchange='tText(this.value);' required>
						<label class="form-check-label" for="tumoriSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="tumori" id="tumori" value="Nessuna" onchange='tText(this.value);' required>
						<label class="form-check-label" for="tumoriNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='tumoriSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="allergie" class="col-sm-2 col-form-label"><?php echo $lang[35][$L]; ?></label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="allergie" id="allergie" value="allergieSi" onchange='allergieText(this.value);' required>
						<label class="form-check-label" for="allergieSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="allergie" id="allergie" value="Nessuna" onchange='allergieText(this.value);' required>
						<label class="form-check-label" for="allergieNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='allergieSiP'></p>
                    </div>
                </div>
				<hr class="hr" />
				<h5><?php echo $lang[36][$L]; ?></h5>
				<div class="mb-3 row">
                    <label for="tc" class="col-sm-2 col-form-label"><?php echo $lang[37][$L]; ?></label>
                    <div class="col-sm-10">
						<select class="selectpicker show-tick" multiple name="tc[]">
							<?php
								while($row = $res->fetch_assoc()) {
									echo "<option value='".$row["nome"]."'>".$row["nome"]."</option>";
								}
							?>
						</select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="altro" class="col-sm-2 col-form-label"><?php echo $lang[38][$L]; ?></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="altro" id="altro" rows="3" placeholder="<?php echo $lang[37][$L]; ?>"></textarea>
                    </div>
                </div>
				<hr class="hr" />
				<div class="mb-3 row">
                    <label for="vac" class="col-sm-2 col-form-label"><?php echo $lang[39][$L]; ?></label>
                    <div class="col-sm-10">
						<input type="text" class="form-control" id="vac" name="vac" placeholder="<?php echo $lang[39][$L]; ?>">
                    </div>
                </div>
				<hr class="hr" />
				<div class="mb-3 row">
                    <label for="noteP" class="col-sm-2 col-form-label"><?php echo $lang[40][$L]; ?></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="noteP" id="noteP" rows="5" placeholder="<?php echo $lang[40][$L]; ?>"></textarea>
                    </div>
                </div>
				<input type="submit" class="btn btn-primary btn-lg" name='submitPaziente'>
			</div>
		</form>
	</body>
</html>