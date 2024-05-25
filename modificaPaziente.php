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


		<script type="text/javascript">
			function otherProvenienza(val){
				var element=document.getElementById('otherProv');
				if(val=='altro')
					element.style.display='block';
				else  
					element.style.display='none';
			}

			function picText(val){
				var element=document.getElementById('picSiText');
				var elementLabel=document.getElementById('picSiLabel');
				if(val=='picSi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			function proText(val){
				var element=document.getElementById('proSiText');
				var elementLabel=document.getElementById('proSiLabel');
				if(val=='proSi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			function vmeText(val){
				var element=document.getElementById('vmeSiText');
				var elementLabel=document.getElementById('vmeSiLabel');
				if(val=='vmeSi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			function maText(val){
				var element=document.getElementById('malattieAText');
				var elementLabel=document.getElementById('malattieALabel');
				if(val=='malattieASi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			function meText(val){
				var element=document.getElementById('malattieEText');
				var elementLabel=document.getElementById('malattieELabel');
				if(val=='malattieESi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			function tText(val){
				var element=document.getElementById('tumoriText');
				var elementLabel=document.getElementById('tumoriLabel');
				if(val=='tumoriSi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}


			function allergieText(val){
				var element=document.getElementById('allergieSiText');
				var elementLabel=document.getElementById('allergieSiLabel');
				if(val=='allergieSi') {
					element.style.display='block';
					elementLabel.style.display='block';
				}
				else  {
					element.style.display='none';
					elementLabel.style.display='none';
				}
			}

			
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
			if (isset($_POST['submitPaziente'])){
				var_dump($_POST);

				// Anagrafica
				$nome = $_POST['nome'] ?? '';
				$cognome = $_POST['cognome'] ?? '';
				$nome_madre = $_POST['nome_madre'] ?? '';
				$sesso = $_POST['sesso'] ?? '';
				$dataN = $_POST['dataN'] ?? '';
				$prov = $_POST['prov'] ?? '';
				$num_tenda = $_POST['num_tenda'] ?? '0';
				$sezione = $_POST['sezione'] ?? '';

				if ($prov == 'altro'){
					$prov = $_POST['otherProv'] ?? '';
				}
				
					// Informazioni Cliniche
				$vaccinazioni = $_POST['vac'] ?? '';
				

					// Anamnesi Patologica Remota
				$morbillo = $_POST['morbillo'] ?? '';
				$varicella = $_POST['varicella'] ?? '';
				$rosolia = $_POST['rosolia'] ?? '';
				$scarlattina = $_POST['scarlattina'] ?? '';
				$eritema = $_POST['eritema'] ?? '';
				$esatema = $_POST['esatema'] ?? '';
				$mpb = $_POST['mpb'] ?? '';

				$anamnesi = $morbillo.$varicella.$rosolia.$scarlattina.$eritema.$esatema.$mpb;
				$anamnesi = substr($anamnesi,0,(strlen($anamnesi)-2));

				$picText = $_POST['pic'] ?? '';
				$proText = $_POST['pro'] ?? '';
				$vmeText = $_POST['vme'] ?? '';

					// Malattie dei genitori
				$ipertensione = $_POST['ipertensione'] ?? '';
				$malattieCV = $_POST['malattieCV'] ?? '';
				$malattieR = $_POST['malattieR'] ?? '';

				$malattieA = $_POST['malattieA'] ?? '';

				$obesita = $_POST['obesita'] ?? '';
				$diabete1 = $_POST['diabete1'] ?? '';
				$diabete2 = $_POST['diabete2'] ?? '';

				$malattieE = $_POST['malattieE'] ?? '';
				$tumori = $_POST['tumori'] ?? '';
				$allergie = $_POST['allergie'] ?? '';

				$genitori = $ipertensione.$malattieCV.$malattieR.$obesita.$diabete1.$diabete2;
				$genitori = substr($genitori,0,(strlen($genitori)-2));

				$tc = $_POST['tc'] ?? '';
				$altro = $_POST['altro'] ?? '';
				if (!(empty($tc))){
					$terapiaC = join(", ", $tc);
				}
				if (!(empty($altro)) && !(empty($tc))){
					$terapiaC = $terapiaC.", ".$altro;
				}
				if (!(empty($altro)) && (empty($tc))){
					$terapiaC = $altro;
				}
				echo "tc ".$terapiaC;
				
				$noteP = $_POST['noteP'] ?? '';

				$sql = "SELECT MAX(num) AS n FROM `paziente`;";

				$n = 0;

				$res= $conn->query($sql);
				$row = $res->fetch_assoc();
				$n = $row['n'];
				$n++;

				$id = substr($nome,0,3).substr($cognome,0,3).$n;
				$id = strtoupper($id);
				echo 'ID: '.$id;


				$sql = "INSERT INTO `paziente`(`ID`, `nome`, `cognome`, `nome_madre`, `sesso`, `dataNascita`, `provenienza`, `num_tenda`, `sezione`, `vaccinazioni`, `anamnesiPat`, `precInterventi`, `precRicoveri`, `precVisite`, `malattieGenitori`, `malAllergiche`, `malEndocrine`, `tumori`, `allergie`, `terapiaCronica`, `note`)
					VALUES ('$id','$nome','$cognome', '$nome_madre','$sesso','$dataN','$prov','$vaccinazioni','$num_tenda','$sezione','$anamnesi','$picText','$proText','$vmeText','$genitori','$malattieA','$malattieE','$tumori','$allergie','$terapiaC','$noteP')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
					$conn->close();
					
					
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}


			}
			elseif (isset($_POST['eliminaE'])) {
				var_dump($_POST);

				$num_esame = $_POST['eliminaE'] ?? '';

				$sql = "DELETE FROM `esame` WHERE `num_esame` = '$num_esame';";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				}
				
				$id = $_GET["ID"];
				$sql ="SELECT P.ID, P.nome, P.cognome, P.nome_madre, P.sesso, P.dataNascita, P.provenienza, P.num_tenda, P.sezione, P.vaccinazioni, P.anamnesiPat, P.precInterventi, P.precRicoveri, P.precVisite, P.malattieGenitori, P.malAllergiche, P.malEndocrine, P.tumori, P.allergie, P.terapiaCronica, P.note
					FROM `paziente` AS P
					WHERE `ID`= '$id';";

				$res= $conn->query($sql);

				$row = $res->fetch_assoc();

				$nome = $row['nome'];
				$cognome = $row['cognome'];
				$nome_madre = $row['nome_madre'];
				$sesso = $row['sesso'];
				$dataN = $row['dataNascita'];
				$prov = $row['provenienza'];
				$num_tenda = $row['num_tenda'] ?? '';
				$sezione = $row['sezione'] ?? '';
				
				$vaccinazioni = $row['vaccinazioni'];
				$anamnesi = $row['anamnesiPat'];
				$picText = $row['precInterventi'];
				$proText = $row['precRicoveri'];
				$vmeText = $row['precVisite'];
				$genitori = $row['malattieGenitori'];
				$malattieA = $row['malAllergiche'];
				$malattieE = $row['malEndocrine'];
				$tumori = $row['tumori'];
				$allergie = $row['allergie'];
				$terapiaC = $row['terapiaCronica'];
				$noteP = $row['note'];

				// E.num_esame, E.data, E.tipo 

				$sqlEsame = "SELECT E.num_esame, E.data, E.tipo
					FROM esame AS E
					WHERE E.id_paziente = '$id';";
				
				$resEsame= $conn->query($sqlEsame);
			}
			elseif (isset($_POST['modificaP'])){
				var_dump($_POST);
			}
			else {
				$id = $_GET["ID"];
				$sql ="SELECT P.ID, P.nome, P.cognome, P.nome_madre, P.sesso, P.dataNascita, P.provenienza, P.num_tenda, P.sezione, P.vaccinazioni, P.anamnesiPat, P.precInterventi, P.precRicoveri, P.precVisite, P.malattieGenitori, P.malAllergiche, P.malEndocrine, P.tumori, P.allergie, P.terapiaCronica, P.note
					FROM `paziente` AS P
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
				
				$vaccinazioni = $row['vaccinazioni'];
				$anamnesi = $row['anamnesiPat'];
				$picText = $row['precInterventi'];
				$proText = $row['precRicoveri'];
				$vmeText = $row['precVisite'];
				$genitori = $row['malattieGenitori'];
				$malattieA = $row['malAllergiche'];
				$malattieE = $row['malEndocrine'];
				$tumori = $row['tumori'];
				$allergie = $row['allergie'];
				$terapiaC = $row['terapiaCronica'];
				$noteP = $row['note'];

				// E.num_esame, E.data, E.tipo 

				$sqlEsame = "SELECT E.num_esame, E.data, E.tipo
					FROM esame AS E
					WHERE E.id_paziente = '$id';";
				
				$resEsame= $conn->query($sqlEsame);
			}


		?>


		<nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2><?php echo $cognome.' '.$nome ?></h2>
				<div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        nome utente
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
		
		
		<a href="javascript:history.go(-1)">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>


		<div class='box'>
			<h4>Informazioni Anagrafiche</h4>
			<br>
			<dl class="mb-3 row">
				<dt class="col-sm-2">Nome</dt>
				<dd class="col-sm-3"><?php echo $nome ?></dd>
				<dt class="col-sm-2">Cognome</dt>
				<dd class="col-sm-4"><?php echo $cognome ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-2">Nome madre</dt>
				<dd class="col-sm-3"><?php echo $nome_madre ?></dd>
				<dt class="col-sm-2">Sesso</dt>
				<dd class="col-sm-1"><?php echo $sesso ?></dd>
				<dt class="col-sm-2">Data di nascita</dt>
				<dd class="col-sm-1"><?php echo $dataN ?></dd>
			</dl>
			<dl class="mb-3 row">
				<dt class="col-sm-2">Provenienza</dt>
				<dd class="col-sm-3"><?php echo $prov ?></dd>
				<dt class="col-sm-2">ID</dt>
				<dd class="col-sm-4"><?php echo $id ?></dd>
			</dl>
			<dl class="mb-3 row">
				<dt class="col-sm-2">Numero Tenda</dt>
				<dd class="col-sm-3"><?php echo $num_tenda ?></dd>
				<dt class="col-sm-2">Sezione</dt>
				<dd class="col-sm-4"><?php echo $sezione ?></dd>
			</dl>
		</div>
		<br>
		<div class='box'>
			<h4>Informazioni Cliniche</h4>
			<br>
			<h5>Anamnesi Patologica Remota</h5>
			<br>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Il paziente ha avuto</dt>
				<dd class="col-sm-12"><?php echo $anamnesi ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Precedenti interventi chirugici</dt>
				<dd class="col-sm-12"><?php echo $picText ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Precedenti ricoveri in ospedale</dt>
				<dd class="col-sm-12"><?php echo $proText ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Precedenti visite mediche effettuate</dt>
				<dd class="col-sm-12"><?php echo $vmeText ?></dd>
			</dl>
			
			<hr class="hr" />

			<h5>Malattie dei genitori</h5>
			<br>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Malattie dei genitori del paziente</dt>
				<dd class="col-sm-12"><?php echo $genitori ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Malattie allergiche</dt>
				<dd class="col-sm-12"><?php echo $malattieA ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Malattie endocrine</dt>
				<dd class="col-sm-12"><?php echo $malattieE ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Tumori</dt>
				<dd class="col-sm-12"><?php echo $tumori ?></dd>
			</dl>
			<dl class="mb-3 row" >
				<dt class="col-sm-12">Allergie</dt>
				<dd class="col-sm-12"><?php echo $allergie ?></dd>
			</dl>
			
			<hr class="hr" />
			<h5>Terapia Cronica</h5>
			<dl class="mb-3 row">
				<dt class="col-sm-12">Terapia cronica</dt>
				<dd class="col-sm-12"><?php echo $terapiaC ?></dd>
			</dl>
			<hr class="hr" />
			<dl class="mb-3 row">
				<dt class="col-sm-12">Vaccinazioni eseguite</dt>
				<dd class="col-sm-12"><?php echo $vaccinazioni ?></dd>
			</dl>
			<hr class="hr" />
			<dl class="mb-3 row">
				<dt class="col-sm-12">Note</dt>
				<dd class="col-sm-12"><?php echo $noteP ?></dd>
			</dl>
		</div>
		<br>
		<div class="box">
			<h4>Esami</h4>
			<?php
				//	E.num_esame, E.data, E.tipo 


			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Data</th>
						<th scope="col">Tipologia&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$k = 0;
						while($row = $resEsame->fetch_assoc()) {
							$k++;
							if($row["tipo"] == 'el'){
								$tipo = 'Esame Laboratorio';
							}
							if($row["tipo"] == 'ecg'){
								$tipo = 'Elettrocardiogramma';
							}
							if($row["tipo"] == 'rg'){
								$tipo = 'Radiografia';
							}
							if($row["tipo"] == 'eg'){
								$tipo = 'Ecografia';
							}
							if($row["tipo"] == 'tac'){
								$tipo = 'TAC';
							}
							if($row["tipo"] == 'rm'){
								$tipo = 'Risonanza Magnetica';
							}

							$link = '"esame.php?ID='.$id.'&data='.$row["data"].'&tipo='.$row["tipo"].'&num_esame='.$row["num_esame"].'"';
							echo "<tr scope='row' onclick ='document.location = ".$link.";'>
									<td scope='col'>".$k."</td>
									<td scope='col'>".$row["data"]."</td>
									<td scope='col'>".$tipo."</td>
								</tr>";
						}
						
					?>
				</tbody>
			</table>
			<a href="addEsame.php?ID=<?php echo $id ?>">
				<input type="button" class="btn btn-primary w-100 p-1 fs-6" value="Nuovo esame"></button>
			</a>
		</div>
		<br>
		<div class="box">
			<h4>Ricette</h4>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Data</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<tr onclick="document.location = 'ricetta.php';">
						<a href='#.php'>
							<td scope="col">1</td>
							<td scope="col">10/09/2000</td>
							<td scope="col">Tachipirina</td>
						</a>
					</tr>
					
				</tbody>
			</table>
			<a href="addRicetta.php">
				<input type="button" class="btn btn-primary w-100 p-1 fs-6" value="Nuova ricetta"></button>
			</a>
		</div>
		<br>
		<div class="box">
			<h4>Visite</h4>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Data</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<tr onclick="document.location = 'visita.php';">
						<td scope="col">1</td>
						<td scope="col">10/09/2000</td>
						<td scope="col">rjanfjgnsdj</td>
					</tr>
				</tbody>
			</table>
			<a href="addVisita.php">
				<input type="button" class="btn btn-primary w-100 p-1 fs-6" value="Nuova visita"></button>
			</a>
		</div>
		<br>
		<div class="box">
			<form action='listaPazienti.php' method='post' onsubmit='return show_alert();'>
				<a href="listaPazienti.php">
					<button type="button" class="btn btn-primary btn-lg col-3">Torna indietro</button>
				</a>
				<button type="button" class="btn btn-warning btn-lg col-3" style="position: absolute; left: 50%; transform: translateX(-50%);">Modifica</button>
				<button type="submit" class="btn btn-danger btn-lg col-3 float-end" value='<?php echo $id ?>' name='eliminaP'>Elimina</button>
			</form>
		</div>

	</body>
</html>