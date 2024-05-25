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
		?>

	</head>
	<body>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Aggiungi Ricetta - nome</h2>
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

		<div class='box'>
			<h2>Inserimento Ricetta</h2>
			<br>
			<form>
				<input type="hidden" name="ID" value="<?php echo $id; ?>">
				<div class="mb-3 row">
					<label for="nf" class="col-sm-2 col-form-label">Nome Farmaco</label>
					<div class="col-sm-6">
						<select class="form-select"  id="nf" name="nf[]">
							<option selected>Open this select menu</option>
							<?php
								require_once('db.php');

								$sql = "SELECT * FROM `farmaco` ORDER BY nome;";

								$res= $conn->query($sql);

								while($row = $res->fetch_assoc()) {
									echo "<option value='".$row["nome"]."'>".$row["nome"]."</option>";
								}
							?>
						</select>
					</div>
					<label for="dataVal" class="col-sm-1 col-form-label">Validità</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="dataVal" name="dataVal[]">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nf" class="col-sm-2 col-form-label">Quantità</label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="qt" name="qtn[]" placeholder="#">
					</div>
					<div class="col-sm-3">
						<select class="form-select" id="qt" name="qtu[]" placeholder="unità">
							<option selected>Open this select menu</option>
							<option value="compressa">Compressa</option>
							<option value="confezione">Confezione</option>
						</select>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="qt" name="qt[]">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="noteR" class="col-sm-2 col-form-label">Note</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="noteR[]" id="noteR" rows="5"></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-lg" name="submitR">Aggiungi Ricetta</button>
			</form>
		</div>
	</body>
</html>