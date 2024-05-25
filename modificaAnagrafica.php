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