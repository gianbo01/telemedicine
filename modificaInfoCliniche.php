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


	</head>

	<body>
		<?php
			require_once('db.php');
			var_dump($_POST);

			$id = $_POST['modificaP'] ?? '';

			$sql ="SELECT P.ID, P.vaccinazioni, P.anamnesiPat, P.precInterventi, P.precRicoveri, P.precVisite, P.malattieGenitori, P.malAllergiche, P.malEndocrine, P.tumori, P.allergie, P.terapiaCronica, P.altroTerapiaCronica, P.note
					FROM `paziente` AS P
					WHERE `ID`= '$id';";

			$res= $conn->query($sql);

			$row = $res->fetch_assoc();

			$anamnesi = $row['anamnesiPat'];
			$vaccinazioni = $row['vaccinazioni'];
			$precInterventi = $row['precInterventi'];
			$precRicoveri = $row['precRicoveri'];
			$precVisite = $row['precVisite'];
			$malattieGenitori = $row['malattieGenitori'];
			$malAllergiche = $row['malAllergiche'];
			$malEndocrine = $row['malEndocrine'];
			$tumori = $row['tumori'];
			$allergie = $row['allergie'];
			$terapiaCronica = $row['terapiaCronica'];
			$altroTerapiaCronica = $row['altroTerapiaCronica'];
			$note = $row['note'];

			$sql = "SELECT * FROM `terapiacronica`;";

			$res= $conn->query($sql);
		?>

		<script type="text/javascript">
			window.onload = function() {
				// Verifica iniziale alla pagina caricata
				picText(document.getElementById('pic').value);
				proText(document.getElementById('pro').value);
				vmeText(document.getElementById('vme').value);
				maText(document.getElementById('malattieA').value);
				meText(document.getElementById('malattieE').value);
				tText(document.getElementById('tumori').value);
				allergieText(document.getElementById('allergie').value);
			};

			function picText(val){
				var pic = '<?php echo $precInterventi; ?>';
				if(val=='picSi' && pic != 'Nessuna') {
					document.getElementById('picSiP').innerHTML='<input type="text" class="form-control" name="pic" id="picSiText" placeholder="Precedenti interventi chirurgici" value="'+ pic +'" required />';
				}
				else  {
					document.getElementById('picSiP').innerHTML="<input type='hidden' name='pic' value='Nessuna'>";
				}
			}

			function proText(val){
				var pro = '<?php echo $precRicoveri; ?>';
				if(val=='proSi' && pro != 'Nessuna') {
					document.getElementById('proSiP').innerHTML='<input type="text" class="form-control" name="pro" id="proSiText" placeholder="Precedenti ricoveri in ospedale" value="'+ pro +'" required/>';
				}
				else  {
					document.getElementById('proSiP').innerHTML="<input type='hidden' name='pro' value='Nessuna'>";
				}
			}

			function vmeText(val){
				var vme = '<?php echo $precVisite; ?>';
				if(val=='vmeSi' && vme != 'Nessuna') {
					document.getElementById('vmeSiP').innerHTML='<input type="text" class="form-control" name="vme" id="vmeSiText" placeholder="Precedenti visite mediche effettuate" value="'+ vme +'" required/>';
				}
				else  {
					document.getElementById('vmeSiP').innerHTML="<input type='hidden' name='vme' value='Nessuna'>";
				}
			}

			function maText(val){
				var ma = '<?php echo $malAllergiche; ?>';
				if(val=='malattieASi' && ma != 'Nessuna') {
					document.getElementById('malattieASiP').innerHTML='<input type="text" class="form-control" name="malattieA" id="malattieAText" placeholder="Malattie Allergiche" value="'+ ma +'" required/>';
				}
				else  {
					document.getElementById('malattieASiP').innerHTML="<input type='hidden' name='malattieA' value='Nessuna'>";
				}
			}

			function meText(val){
				var me = '<?php echo $malEndocrine; ?>';
				if(val=='malattieESi' && me != 'Nessuna') {
					document.getElementById('malattieESiP').innerHTML='<input type="text" class="form-control" name="malattieE" id="malattieEText" placeholder="Malattie Endocrine" value="'+ me +'" required/>';
				}
				else  {
					document.getElementById('malattieESiP').innerHTML="<input type='hidden' name='malattieE' value='Nessuna'>";
				}
			}

			function tText(val){
				var tumori = '<?php echo $tumori; ?>';
				if(val=='tumoriSi' && tumori != 'Nessuna') {
					document.getElementById('tumoriSiP').innerHTML='<input type="text" class="form-control" name="tumori" id="tumoriText" placeholder="Tumori" value="'+ tumori +'" required/>';
				}
				else  {
					document.getElementById('tumoriSiP').innerHTML="<input type='hidden' name='tumori' value='Nessuna'>";
				}
			}

			function allergieText(val){
				var allergie = '<?php echo $allergie; ?>';
				if(val=='allergieSi' && allergie != 'Nessuna') {
					document.getElementById('allergieSiP').innerHTML='<input type="text" class="form-control" name="allergie" id="allergieSiText" placeholder="Allergie" value="'+ allergie +'" required/>';
				}
				else  {
					document.getElementById('allergieSiP').innerHTML="<input type='hidden' name='allergie' value='Nessuna'>";
				}
			}

		</script>


        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Nuovo Paziente</h2>
				<div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>

		
		<a href="javascript:history.go(-1)">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>


		<form action="paziente.php" method="post" class="was-validated">
			
			<div class='box'>
				<h4>Informazioni Cliniche</h4>
				<br>
				<h5>Anamnesi Patologica Remota</h5>
				<br>
				<div class="mb-3 row" >
                    <label for="morbillo" class="col-sm-2 col-form-label">Morbillo</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="morbillo" id="morbillo" value="morbillo, " required <? if (str_contains($anamnesi, "morbillo")) {echo "checked";} ?>>
						<label class="form-check-label" for="morbilloSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="morbillo" id="morbillo" value="" required <? if (!str_contains($anamnesi, "morbillo")) {echo "checked";} ?>>
						<label class="form-check-label" for="morbilloNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="varicella" class="col-sm-2 col-form-label">Varicella</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="varicella" id="varicella" value="varicella, " required <? if (str_contains($anamnesi, "varicella")) {echo "checked";} ?>>
						<label class="form-check-label" for="varicellaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="varicella" id="varicella" value="" required <? if (!str_contains($anamnesi, "varicella")) {echo "checked";} ?>>
						<label class="form-check-label" for="varicellaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="rosolia" class="col-sm-2 col-form-label">Rosolia</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="rosolia" id="rosolia" value="rosolia, " required <? if (str_contains($anamnesi, "rosolia")) {echo "checked";} ?>>
						<label class="form-check-label" for="rosoliaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="rosolia" id="rosolia" value="" required <? if (!str_contains($anamnesi, "rosolia")) {echo "checked";} ?>>
						<label class="form-check-label" for="rosoliaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="scarlattina" class="col-sm-2 col-form-label">Scarlattina</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="scarlattina" id="scarlattina" value="scarlattina, " required <? if (str_contains($anamnesi, "scarlattina")) {echo "checked";} ?>>
						<label class="form-check-label" for="scarlattinaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="scarlattina" id="scarlattina" value="" required <? if (!str_contains($anamnesi, "scarlattina")) {echo "checked";} ?>>
						<label class="form-check-label" for="scarlattinaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="eritema" class="col-sm-2 col-form-label">Eritema infettivo</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="eritema" id="eritema" value="eritema infettivo, " required <? if (str_contains($anamnesi, "eritema infettivo")) {echo "checked";} ?>>
						<label class="form-check-label" for="eritemaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="eritema" id="eritema" value="" required <? if (!str_contains($anamnesi, "eritema infettivo")) {echo "checked";} ?>>
						<label class="form-check-label" for="eritemaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="esatema" class="col-sm-2 col-form-label">Esatema critico</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="esatema" id="esatema" value="esatema critico, " required <? if (str_contains($anamnesi, "esatema critico")) {echo "checked";} ?>>
						<label class="form-check-label" for="esatemaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="esatema" id="esatema" value="" required <? if (!str_contains($anamnesi, "esatema critico")) {echo "checked";} ?>>
						<label class="form-check-label" for="esatemaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="mpb" class="col-sm-2 col-form-label">Mani-Piedi-Bocca</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="mpb" id="mpb" value="mani-piedi-bocca, " required <? if (str_contains($anamnesi, "mani-piedi-bocca")) {echo "checked";} ?>>
						<label class="form-check-label" for="mpbSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="mpb" id="mpb" value="" required <? if (!str_contains($anamnesi, "mani-piedi-bocca")) {echo "checked";} ?>>
						<label class="form-check-label" for="mpbNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="pic" class="col-sm-2 col-form-label">Precedenti interventi chirurgici</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="pic" id="pic" value="picSi" onchange='picText(this.value);' required <? if (!str_contains($precInterventi, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="picSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="pic" id="pic" value="Nessuna" onchange='picText(this.value);' required <? if (str_contains($precInterventi, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="picNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='picSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="pro" class="col-sm-2 col-form-label">Precedenti ricoveri in ospedale</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="pro" id="pro" value="proSi" onchange='proText(this.value);' required <? if (!str_contains($precRicoveri, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="proSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="pro" id="pro" value="Nessuna" onchange='proText(this.value);' required <? if (str_contains($precRicoveri, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="proNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='proSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="vme" class="col-sm-2 col-form-label">Precedenti visite mediche effettuate</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="vme" id="vme" value="vmeSi" onchange='vmeText(this.value);' required <? if (!str_contains($precVisite, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="vmeSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="vme" id="vme" value="Nessuna" onchange='vmeText(this.value);' required <? if (str_contains($precVisite, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="vmeNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='vmeSiP'></p>
                    </div>
                </div>
				<hr class="hr" />

				<h6>Malattie dei genitori</h6>
				<br>
				<div class="mb-3 row" >
                    <label for="ipertensione" class="col-sm-2 col-form-label">Ipertensione</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="ipertensione" id="ipertensione" value="ipertensione, " required <? if (str_contains($malattieGenitori, "ipertensione")) {echo "checked";} ?>>
						<label class="form-check-label" for="ipertensioneSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="ipertensione" id="ipertensione" value="" required <? if (!str_contains($malattieGenitori, "ipertensione")) {echo "checked";} ?>>
						<label class="form-check-label" for="ipertensioneNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieCV" class="col-sm-2 col-form-label">Malattie Cardio-Vascolari</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieCV" id="malattieCV" value="malattie cardio-vascolari, " required <? if (str_contains($malattieGenitori, "malattie cardio-vascolari")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieCVSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieCV" id="malattieCV" value="" required <? if (!str_contains($malattieGenitori, "malattie cardio-vascolari")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieCVNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieR" class="col-sm-2 col-form-label">Malattie Renali</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieR" id="malattieR" value="malattie renali, " required <? if (str_contains($malattieGenitori, "malattie renali")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieRSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieR" id="malattieR" value="" required <? if (!str_contains($malattieGenitori, "malattie renali")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieRNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieA" class="col-sm-2 col-form-label">Malattie Allergiche</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieA" id="malattieA" value="malattieASi" onchange='maText(this.value);' required <? if (!str_contains($malAllergiche, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieASi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieA" id="malattieA" value="Nessuna" onchange='maText(this.value);' required <? if (str_contains($malAllergiche, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieANo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='malattieASiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="obesita" class="col-sm-2 col-form-label">Obesità</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="obesita" id="obesita" value="obesità, " required <? if (str_contains($malattieGenitori, "obesità")) {echo "checked";} ?>>
						<label class="form-check-label" for="obesitaSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="obesita" id="obesita" value="" required <? if (!str_contains($malattieGenitori, "obesità")) {echo "checked";} ?>>
						<label class="form-check-label" for="obesitaNo">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="diabete1" class="col-sm-2 col-form-label">Diabete 1</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="diabete1" id="diabete1" value="diabete 1, " required <? if (str_contains($malattieGenitori, "diabete 1")) {echo "checked";} ?>>
						<label class="form-check-label" for="diabete1Si">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="diabete1" id="diabete1" value="" required <? if (!str_contains($malattieGenitori, "diabete 1")) {echo "checked";} ?>>
						<label class="form-check-label" for="diabete1No">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="diabete2" class="col-sm-2 col-form-label">Diabete 2</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="diabete2" id="diabete2" value="diabete 2, " required <? if (str_contains($malattieGenitori, "diabete 2")) {echo "checked";} ?>>
						<label class="form-check-label" for="diabete2Si">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="diabete2" id="diabete2" value="" required <? if (!str_contains($malattieGenitori, "diabete 2")) {echo "checked";} ?>>
						<label class="form-check-label" for="diabete2No">No</label>
					</div>
                </div>
				<div class="mb-3 row" >
                    <label for="malattieE" class="col-sm-2 col-form-label">Malattie Endocrine</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="malattieE" id="malattieE" value="malattieESi" onchange='meText(this.value);' required <? if (!str_contains($malEndocrine, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieESi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="malattieE" id="malattieE" value="Nessuna" onchange='meText(this.value);' required <? if (str_contains($malEndocrine, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="malattieENo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='malattieESiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="tumori" class="col-sm-2 col-form-label">Tumori</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="tumori" id="tumori" value="tumoriSi" onchange='tText(this.value);' required <? if (!str_contains($tumori, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="tumoriSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="tumori" id="tumori" value="Nessuna" onchange='tText(this.value);' required <? if (str_contains($tumori, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="tumoriNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='tumoriSiP'></p>
                    </div>
                </div>
				<div class="mb-3 row" >
                    <label for="allergie" class="col-sm-2 col-form-label">Allergie</label>
                    <div class="col-sm-2" style='margin-left: 3%'>
						<input class="form-check-input" type="radio" name="allergie" id="allergie" value="allergieSi" onchange='allergieText(this.value);' required <? if (!str_contains($allergie, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="allergieSi">Si</label>
					</div>
					<div class="col-sm-1">
						<input class="form-check-input" type="radio" name="allergie" id="allergie" value="Nessuna" onchange='allergieText(this.value);' required <? if (str_contains($allergie, "Nessuna")) {echo "checked";} ?>>
						<label class="form-check-label" for="allergieNo">No</label>
					</div>
					<div class="col-sm-6">
						<p id='allergieSiP'></p>
                    </div>
                </div>
				<hr class="hr" />
				<h5>Terapia Cronica</h5>
				<div class="mb-3 row">
                    <label for="tc" class="col-sm-2 col-form-label">Terapia cronica</label>
                    <div class="col-sm-10">
						<select class="selectpicker show-tick" multiple name="tc[]">
							<?php
								while($row = $res->fetch_assoc()) {
									if (str_contains($terapiaCronica, $row["nome"])) {
										echo "<option value='".$row["nome"]."' selected>".$row["nome"]."</option>";
									}
									else {
										echo "<option value='".$row["nome"]."' >".$row["nome"]."</option>";
									}
								}
							?>
						</select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="altro" class="col-sm-2 col-form-label">Altro</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="altro" id="altro" rows="3" placeholder="Altre terapie croniche"><?php echo $altroTerapiaCronica; ?></textarea>
                    </div>
                </div>
				<hr class="hr" />
				<div class="mb-3 row">
                    <label for="vac" class="col-sm-2 col-form-label">Vaccinazioni eseguite</label>
                    <div class="col-sm-10">
						<input type="text" class="form-control" id="vac" name="vac" placeholder="Vaccinazioni" value="<?php echo $vaccinazioni; ?>">
                    </div>
                </div>
				<hr class="hr" />
				<div class="mb-3 row">
                    <label for="noteP" class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="noteP" id="noteP" rows="5" placeholder="Note"><?php echo $note; ?></textarea>
                    </div>
                </div>
				<input type="submit" class="btn btn-primary btn-lg" name='modificaInfoCliniche' value="<?php echo $id ?>">
			</div>
		</form>
	</body>
</html>