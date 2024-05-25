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
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Nome</h2>
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
            <h2>Visita</h2>
            <br>
            <dl class="mb-3 row" >
                <dt class="col-sm-3">Data Visita</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Pressione Sanguigna Massima</dt>
                <dd class="col-sm-3"></dd>
                <dt class="col-sm-3">Pressione Sanguigna Minima</dt>
                <dd class="col-sm-3"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Frequenza Cardiaca</dt>
                <dd class="col-sm-3"></dd>
                <dt class="col-sm-3">Saturazione</dt>
                <dd class="col-sm-3"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Frequenza Respiratoria</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Diagnosi</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Terapia Prescritta</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            <br>
			<hr class="hr" />
            <h2>Visualizza Ricetta</h2>
            <br>
            
            <dl class="mb-3 row">
                <dt class="col-sm-3">Nome Farmaco</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            
            <dl class="mb-3 row">
                <dt class="col-sm-3">Valida fino al</dt>
                <dd class="col-sm-9"></dd>
            </dl>
            
            <dl class="mb-3 row">
                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9"></dd>
            </dl>

        </div>
    </body>

</html>