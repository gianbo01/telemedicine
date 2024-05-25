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
			require_once('db.php');
			if (isset($_POST['submit'])){
                var_dump($_POST);

				$nome = $_POST['nome'];
				$cognome = $_POST['cognome'];
				$email = $_POST['email'];
				$specializzazione = $_POST['spec'];

				$sql = "INSERT INTO `rubrica`(`nome`, `cognome`, `email`, `specializzazione`) 
					VALUES ('$nome','$cognome','$email','$specializzazione')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
					
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		?>

	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
				<h2>Rubrica</h2>
				<div class="d-flex">
					<span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
						Nome Utente
					</span>

					<button type="button" class="btn btn-danger">Logout</button>
				</div>
			</div>
		</nav>

			
		<a href="home.php">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>


		<div class='box'>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">
						Email
					</th>
					<th scope="col">
						Nome e Cognome
					</th>
					<th scope="col">
						Specilizzazione
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sqlR = "SELECT * FROM `rubrica`";
					$res = $conn->query($sqlR);
					while($row = $res->fetch_assoc()) {
						echo "<tr>
								<td scope='col'>".$row['email']."</td>
								<td scope='col'>".$row["nome"]." ".$row["cognome"]."</td>
								<td scope='col'>".$row["specializzazione"]."</td>
							</tr>";
					}
				?>
			</tbody>
		</table>
		</div>
		<br>
		<br>
		<div class='box'>
			<h3>Aggiungi contatto</h3>
			<br>
			<form action='rubrica.php' method="post">
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-1 col-form-label">Nome</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <label for="cognome" class="col-sm-1 col-form-label">Cognome</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.it" required>
                    </div>
                    <label for="spec" class="col-sm-1 col-form-label">Specilizzazione</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="spec" name="spec" placeholder="Specilizzazione" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="submit">
            </form>
		</div>
	</body>
</html>