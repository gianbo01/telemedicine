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
            var_dump($_POST);
            $num = $_POST["modificaV"] ?? '';
            require_once('db.php');

            $sql = "SELECT * FROM `visita` WHERE `num` = '$num';";

            $res= $conn->query($sql);

            $row = $res->fetch_assoc();

            $id = $row['id_paziente'];
            $date = $row['date'];
            $psmax = $row['psmax'];
            $psmin = $row['psmin'];
            $fc = $row['freq_Cardiaca'];
            $sat = $row['saturazione'];
            $fr = $row['freq_Respiratoria'];
            $tp = $row['terapia_prescritta'];
            $note = $row['note'];
            $diagnosi = $row['diagnosi'];


            $sql = "SELECT * FROM `farmaco`;";

            $res= $conn->query($sql);

           // $i=0;
        ?>

        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Nuova Visita - <?php echo $id ?></h2>
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
            <h2>Nuova Visita</h2>
            <br>
            <form action="visita.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $id; ?>">
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Data Visita</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="psmax" class="col-sm-2 col-form-label">Pressione Sanguigna Massima</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="psmax" name="psmax" value="<?php echo $psmax; ?>">
                    </div>
                    <label for="psmin" class="col-sm-2 col-form-label">Pressione Sanguigna Minima</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="psmin" name="psmin" value="<?php echo $psmin; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fc" class="col-sm-2 col-form-label">Frequenza Cardiaca</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="fc" name="fc" value="<?php echo $fc; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sat" class="col-sm-2 col-form-label">Saturazione</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="sat" name="sat" value="<?php echo $sat; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fr" class="col-sm-2 col-form-label">Frequenza Respiratoria</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="fr" name="fr" value="<?php echo $fr; ?>">
                    </div>
                </div>

			    <hr class="hr" />
                <h4>Inserimento Ricetta</h4>

                

                <p id="ricetta"></p>
                <script>
                    i=0;
                    function addRicetta() {
                    document.getElementById("ricetta").innerHTML += '\
                        <div id="r<?php echo $i;
                                $i=$i+1;
                            ?>'+i+'">\
                            <hr class="hr" />\
                            <br>\
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteR('+i+');" style="margin-top: -50px">Rimuovi</button>\
                            <div class="mb-3 row">\
                                <label for="nf" class="col-sm-2 col-form-label">Nome Farmaco</label>\
                                <div class="col-sm-6">\
                                <select class="form-select"  id="nf" name="nf[]">\
                                    <option selected>Open this select menu</option>\
                                    <?php
                                        require_once('db.php');
                                        $sql = "SELECT * FROM `farmaco`;";

                                        $res= $conn->query($sql);
                                        
                                        while($row = $res->fetch_assoc()) {
                                            echo '<option value="'.$row["nome"].'">'.$row["nome"].'</option>\ ';
                                        }
                                    ?>
                                </select>\
                                </div>\
                                <label for="dataVal" class="col-sm-1 col-form-label">Validità</label>\
                                <div class="col-sm-3">\
                                    <input type="date" class="form-control" id="dataVal" name="dataVal[]">\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="nf" class="col-sm-2 col-form-label">Quantità</label>\
                                <div class="col-sm-2">\
                                    <input type="number" class="form-control" id="qt" name="qtn[]" placeholder="#">\
                                </div>\
                                <div class="col-sm-3">\
                                    <select class="form-select" id="qt" name="qtu[]" placeholder="unità">\
                                        <option selected>Open this select menu</option>\
                                        <option value="compressa">Compressa</option>\
                                        <option value="confezione">Confezione</option>\
                                    </select>\
                                </div>\
                                <div class="col-sm-5">\
                                    <input type="text" class="form-control" id="qt" name="qt[]">\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="noteR" class="col-sm-2 col-form-label">Note</label>\
                                <div class="col-sm-10">\
                                    <textarea class="form-control" name="noteR[]" id="noteR" rows="5"></textarea>\
                                </div>\
                            </div>\
                        </div>\
                        ';
                        i++;
                    };

                    function deleteR(val) {
                        s = 'r'+val;
                        console.log(s);
                        document.getElementById(s).innerHTML = "";
                    }
                </script>
                <input type="button" class="btn btn-primary w-100 p-1 fs-6" value="Aggiungi farmaco" onclick="addRicetta();"></button>
                <br>
                    

			    <hr class="hr" />
                <div class="mb-3 row">
                    <label for="tp" class="col-sm-2 col-form-label">Terapia Prescritta</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="tp" id="tp" rows="3"><?php echo $tp; ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="note" class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="note" id="note" rows="5"><?php echo $note; ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" name='submitVisita'>Modifica Visita</button>

            </form>
        </div>
    </body>

</html>