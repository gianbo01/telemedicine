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

        <script>
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

            $id = $_GET["ID"] ?? '';
            var_dump($_POST);
            if (isset($_POST['subES'])){
                $tipo = $_POST['tipo'] ?? '';
                $data = $_POST['dataV'] ?? '';
                $noteV = $_POST['noteV'] ?? '';
                
                $esrval = $_POST['esrval'] ?? '0';

                $redbloodcells = $_POST['redbloodcells'] ?? '0';
                $whitebloodcells = $_POST['whitebloodcells'] ?? '0';
                $hemoglobin = $_POST['hemoglobin'] ?? '0';
                $hematocrit = $_POST['hematocrit'] ?? '0';
                $platelets = $_POST['platelets'] ?? '0';

                $crpval = $_POST['crpval'] ?? '0';

                $colore = $_POST['colore'] ?? '';
                $aspetto = $_POST['aspetto'] ?? '';
                $ph = $_POST['ph'] ?? '0';
                $glucosio = $_POST['glucosio'] ?? '0';
                $proteine = $_POST['proteine'] ?? '0';
                $emoglobina = $_POST['emoglobina'] ?? '0';
                $corpichetonici = $_POST['corpichetonici'] ?? '0';
                $bilirubina = $_POST['bilirubina'] ?? '0';
                $urobilinogeno = $_POST['urobilinogeno'] ?? '0';
                $leucociti = $_POST['leucociti'] ?? '0';
                $creatinina = $_POST['creatinina'] ?? '0';

                $ptval = $_POST['ptval'] ?? '0';
                $ptEsito = $_POST['ptEsito'] ?? '';

                $tyH = $_POST['tyH'] ?? '0';
                $tyO = $_POST['tyO'] ?? '0';
                $patyH = $_POST['patyH'] ?? '0';
                $patyO = $_POST['patyO'] ?? '0';

                
                $batval = $_POST['batval'] ?? '0';
                $batEsito = $_POST['batEsito'] ?? '';

                $hbsval = $_POST['hbsval'] ?? '0';
                $hbsEsito = $_POST['hbsEsito'] ?? '';

                $hivval = $_POST['hivval'] ?? '0';
                $hivEsito = $_POST['hivEsito'] ?? '';

                $hcvval = $_POST['hcvval'] ?? '0';
                $hcvEsito = $_POST['hcvEsito'] ?? '';

                $fbsval = $_POST['fbsval'] ?? '0';

                $bgval = $_POST['bgval'] ?? '0';

                $hpylorival = $_POST['hpylorival'] ?? '0';
                $hpyloriEsito = $_POST['hpyloriEsito'] ?? '';

                $choval = $_POST['choval'] ?? '0';

                $tgval = $_POST['tgval'] ?? '0';

                $hdlval = $_POST['hdlval'] ?? '0';

                $ldlval = $_POST['ldlval'] ?? '0';

                $vldlval = $_POST['vldlval'] ?? '0';

                $noteV = $_POST['noteV'] ?? '';

                $exams = $_POST['exams'] ?? '';
                
                echo "<br>esami->";
                print_r($exams);
                if (!(empty($exams))){
					$ex = join(",", $exams);
				}

                $sql = "INSERT INTO `esame`(`id_paziente`, `data`, `tipo`, `note`, `ESR`, `redbc`, `whitebc`, `hemoglobin`, `hematocrit`, `platelets`, `CRP`, `colore`, `aspetto`, `ph`, `glucosio`, `proteine`, `emoglobina`, `corpiChetonici`, `bilirubina`, `urobilinogeno`, `leucociti`, `creatinina`, `PT`, `PTval`, `tyH`, `tyO`, `patyH`, `patyO`, `BATval`, `BAT`, `HBS`, `HBSval`, `HIV`, `HIVval`, `HCV`, `HCVval`, `FBS`, `BG`, `HPY`, `HPYval`, `CHO`, `TG`, `HDL`, `LDL`, `VLDL`, `ex`) 
                    VALUES ('$id','$data','$tipo','$noteV', '$esrval', '$redbloodcells', '$whitebloodcells', '$hemoglobin', '$hematocrit', '$platelets', '$crpval', '$colore', '$aspetto', '$ph', '$glucosio', '$proteine', '$emoglobina', '$corpichetonici', '$bilirubina', '$urobilinogeno', '$leucociti', '$creatinina', '$ptEsito', '$ptval', '$tyH', '$tyO', '$patyH', '$patyO', '$batval', '$batEsito', '$hbsEsito', '$hbsval', '$hivEsito', '$hivval', '$hcvEsito', '$hcvval', '$fbsval', '$bgval', '$hpyloriEsito', '$hpylorival', '$choval', '$tgval', '$hdlval', '$ldlval', '$vldlval', '$ex')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    $conn->close();
                    
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            elseif (isset($_POST['subFile'])){
                $tipo = $_POST['tipo'] ?? '';
                $data = $_POST['dataV'] ?? '';
                $noteV = $_POST['noteV'] ?? '';

                $files = array_filter($_FILES['file']['name']) ?? '';
                $total_count = count($_FILES['file']['name']) ??  0;

                for( $i=0 ; $i < $total_count ; $i++ ) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                        if($check !== false) {
                            //echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            //echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                    
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        //echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    
                    // Check file size
                //    if ($_FILES["file"]["size"] > 500000) {
                //      echo "Sorry, your file is too large.";
                //      $uploadOk = 0;
                //    }
                    
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) {
                        //echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
                        $uploadOk = 0;
                    }
                    
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        //echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
                            $file_ar[$i] = $target_file;
                            $name_ar[$i] = $_FILES["file"]["name"][$i];
                            $file_str = join(";",$file_ar);
                            $name_str = join(";",$name_ar);
                            //echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                $sql = "INSERT INTO `esame`(`id_paziente`, `data`, `tipo`, `note`, `filePath`, `fileName`) 
                    VALUES ('$id','$data','$tipo','$noteV','$file_str','$name_str')";
                
                if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
					$conn->close();
					
					
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

            }
            else {
                $data = $_GET["data"] ?? '';
                $tipo = $_GET["tipo"] ?? '';
                $num_esame = $_GET["num_esame"] ?? '';

                $sql = "SELECT `id_paziente`, `data`, `tipo`, `num_esame`, `note`, `filePath`, `fileName`, `ESR`, `redbc`, `whitebc`, `hemoglobin`, `hematocrit`, `platelets`, `CRP`, `colore`, `aspetto`, `ph`, `glucosio`, `proteine`, `emoglobina`, `corpiChetonici`, `bilirubina`, `urobilinogeno`, `leucociti`, `creatinina`, `PT`, `PTval`, `tyH`, `tyO`, `patyH`, `patyO`, `BATval`, `BAT`, `HBS`, `HBSval`, `HIV`, `HIVval`, `HCV`, `HCVval`, `FBS`, `BG`, `HPY`, `HPYval`, `CHO`, `TG`, `HDL`, `LDL`, `VLDL`, `ex`
                    FROM `esame` 
                    WHERE `id_paziente`='$id' AND `data`='$data' AND `tipo`='$tipo' AND `num_esame`='$num_esame';";

                $res= $conn->query($sql);

                $row = $res->fetch_assoc();

                $noteV = $row["note"] ?? '';
                $file_str = $row["filePath"] ?? '';
                $name_str = $row["fileName"] ?? '';
                $ex = $row["ex"] ?? '';
                $file_ar = explode(";",$file_str) ?? '';
                $name_ar = explode(";",$name_str) ?? '';
                $exams = explode(",", $ex) ?? '';



                $esrval = $row['ESR'] ?? '0';

                $redbloodcells = $row['redbc'] ?? '0';
                $whitebloodcells = $row['whitebc'] ?? '0';
                $hemoglobin = $row['hemoglobin'] ?? '0';
                $hematocrit = $row['hematocrit'] ?? '0';
                $platelets = $row['platelets'] ?? '0';

                $crpval = $row['CRP'] ?? '0';

                $colore = $row['colore'] ?? '';
                $aspetto = $row['aspetto'] ?? '';
                $ph = $row['ph'] ?? '0';
                $glucosio = $row['glucosio'] ?? '0';
                $proteine = $row['proteine'] ?? '0';
                $emoglobina = $row['emoglobina'] ?? '0';
                $corpichetonici = $row['corpiChetonici'] ?? '0';
                $bilirubina = $row['bilirubina'] ?? '0';
                $urobilinogeno = $row['urobilinogeno'] ?? '0';
                $leucociti = $row['leucociti'] ?? '0';
                $creatinina = $row['creatinina'] ?? '0';

                $ptval = $row['PTval'] ?? '0';
                $ptEsito = $row['PT'] ?? '';

                $tyH = $row['tyH'] ?? '0';
                $tyO = $row['tyO'] ?? '0';
                $patyH = $row['patyH'] ?? '0';
                $patyO = $row['patyO'] ?? '0';

                $batval = $row['BATval'] ?? '0';
                $batEsito = $row['BAT'] ?? '';

                $hbsval = $row['HBSval'] ?? '0';
                $hbsEsito = $row['HBS'] ?? '';

                $hivval = $row['HIVval'] ?? '0';
                $hivEsito = $row['HIV'] ?? '';

                $hcvval = $row['HCVval'] ?? '0';
                $hcvEsito = $row['HCV'] ?? '';

                $fbsval = $row['FBS'] ?? '0';

                $bgval = $row['BG'] ?? '0';

                $hpylorival = $row['HPYval'] ?? '0';
                $hpyloriEsito = $row['HPY'] ?? '';

                $choval = $row['CHO'] ?? '0';

                $tgval = $row['TG'] ?? '0';

                $hdlval = $row['HDL'] ?? '0';

                $ldlval = $row['LDL'] ?? '0';

                $vldlval = $row['VLDL'] ?? '0';




                
                $total_count = count($file_ar) ??  0;
            }
        ?>

        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2><?php echo $id ?></h2>
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
        


        <div class='box'>

            <?php           // in base alla tipoligia di esame cambiano i parametri da inserire
                if($tipo == 'es'){
                    echo '<h4>Esame del Sangue</h4>';
                }
                if($tipo == 'eu'){
                    echo '<h4>Esame Urine</h4>';
                }
                if($tipo == 'tg'){
                    echo '<h4>Test Gravidanza</h4>';
                }
                if($tipo == 'ecg'){
                    echo '<h4>Elettrocardiogramma</h4>';
                }
                if($tipo == 'rg'){
                    echo '<h4>Radiografia</h4>';
                }
                if($tipo == 'eg'){
                    echo '<h4>Ecografia</h4>';
                }
                if($tipo == 'tac'){
                    echo '<h4>TAC</h4>';
                }
                if($tipo == 'rm'){
                    echo '<h4>Risonanza Magnetica</h4>';
                }
            ?>

            <br>

            <dl class="mb-3 row">
                <dt class="col-sm-3">Data visita</dt>
                <dd class="col-sm-9">
                    <?php echo $data; ?>
                </dd>
            </dl>

            <?php           // in base alla tipoligia di esame cambiano i parametri da inserire
                if($tipo == 'el'){
                    if (in_array('esr', $exams)){
                        echo '<dl class="mb-3 row">
                                <dt class="col-sm-5">Erythrocyte Sedimentation Rate (ESR)</dt>
                                <dd class="col-sm-7">'.
                                    $esrval
                                .'</dd>
                            </dl>';
                    }
                    if (in_array('cbc', $exams)){
                        echo '<h5>Complete Blood Count (CBC)</h5>
                            <dl class="mb-3 row">
                                <dt class="col-sm-5">Red blood cells</dt>
                                <dd class="col-sm-7">'.
                                    $redbloodcells
                                .'</dd>
                            </dl>
                            <dl class="mb-3 row">
                                <dt class="col-sm-5">White blood cells</dt>
                                <dd class="col-sm-7">'.
                                    $whitebloodcells
                                .'</dd>
                            </dl>
                            <dl class="mb-3 row">
                                <dt class="col-sm-5">Hemoglobin</dt>
                                <dd class="col-sm-7">'.
                                    $hemoglobin
                                .'</dd>
                            </dl>
                            <dl class="mb-3 row">
                                <dt class="col-sm-5">Hematocrit</dt>
                                <dd class="col-sm-7">'.
                                    $hematocrit
                                .'</dd>
                            </dl>
                            <dl class="mb-3 row">
                                <dt class="col-sm-5">Platelets</dt>
                                <dd class="col-sm-7">'.
                                    $platelets
                                .'</dd>
                            </dl>';
                    }
                    if (in_array('crp', $exams)) {
                        echo '<dl class="mb-3 row">
                                <dt class="col-sm-5">C~ Reactive Protein (CRP)</dt>
                                <dd class="col-sm-7">'.
                                    $crpval
                                .'</dd>
                            </dl>';
                    }
                    if (in_array('gue', $exams)) {
                        echo '<h5>General Urine Examination (GUE)</h5>
                        <dl class="mb-3 row">
                            <dt class="col-sm-5">Colore</dt>
                            <dd class="col-sm-7">'.
                                $colore
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Aspetto</dt>
                            <dd class="col-sm-7">'.
                                $aspetto
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">pH</dt>
                            <dd class="col-sm-7">'.
                                $ph
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Glucosio</dt>
                            <dd class="col-sm-7">'.
                                $glucosio
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Proteine</dt>
                            <dd class="col-sm-7">'.
                                $proteine
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Emoglobina</dt>
                            <dd class="col-sm-7">'.
                                $emoglobina
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Corpi chetonici</dt>
                            <dd class="col-sm-7">'.
                                $corpichetonici
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Bilirubina</dt>
                            <dd class="col-sm-7">'.
                                $bilirubina
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Urobilinogeno</dt>
                            <dd class="col-sm-7">'.
                                $urobilinogeno
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Leucociti</dt>
                            <dd class="col-sm-7">'.
                                $leucociti
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Creatinina</dt>
                            <dd class="col-sm-7">'.
                                $creatinina
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('pt', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Pregnant Test (PT)</dt>
                            <dd class="col-sm-5">'.
                                $ptEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $ptval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('wat', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Typhi H</dt>
                            <dd class="col-sm-5">'.
                                $tyH
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Typhi O</dt>
                            <dd class="col-sm-5">'.
                                $tyO
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Para Typhi BH</dt>
                            <dd class="col-sm-5">'.
                                $patyH
                            .'</dd>
                        </dl>';
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Para Typhi BO</dt>
                            <dd class="col-sm-5">'.
                                $patyO
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('bat', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Brucella Agglutination Test (BAT)</dt>
                            <dd class="col-sm-5">'.
                                $batEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $batval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('hbs', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Hepatitis B (HBS)</dt>
                            <dd class="col-sm-5">'.
                                $hbsEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $hbsval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('hiv', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Human immune deficiency virus (HIV)</dt>
                            <dd class="col-sm-5">'.
                                $hivEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $hivval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('hcv', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Hepatitis C (HCV)</dt>
                            <dd class="col-sm-5">'.
                                $hcvEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $hcvval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('fbs', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Fasting Blood Sugar (FBS)</dt>
                            <dd class="col-sm-7">'.
                                $fbsval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('bg', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Blood group (BG)</dt>
                            <dd class="col-sm-7">'.
                                $bgval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('hpylori', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Helicobacter Pylori ( H pylori)</dt>
                            <dd class="col-sm-5">'.
                                $hpyloriEsito
                            .'</dd>
                            <dd class="col-sm-2">'.
                                $hpylorival
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('cho', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">Changes in plasma levels of cholesterol (CHO)</dt>
                            <dd class="col-sm-7">'.
                                $choval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('tg', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">triglyceride (TG)</dt>
                            <dd class="col-sm-7">'.
                                $tgval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('hdl', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">high density lipoprotein (HDL)</dt>
                            <dd class="col-sm-7">'.
                                $hdlval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('ldl', $exams)) {
                        echo '<dl class="mb-3 row">
                            <dt class="col-sm-5">low density lipoprotein (LDL)</dt>
                            <dd class="col-sm-7">'.
                                $ldlval
                            .'</dd>
                        </dl>';
                    }
                    if (in_array('vldl', $exams)){
                        echo '<dl class="mb-3 row">
                                <dt class="col-sm-5">very low density lipoprotein (VLDL)</dt>
                                <dd class="col-sm-7">'.
                                    $vldlval
                                .'</dd>
                            </dl>';
                    }
                }
                if($tipo == 'ecg' || $tipo == 'rg' || $tipo == 'eg' || $tipo == 'tac' || $tipo == 'rm'){
                    echo '
                        <dl class="mb-3 row">
                            <dt class="col-sm-3">File Caricati</dt>
                        </dl>';
                        for ( $i=0 ; $i < $total_count ; $i++ ){
                            echo '<dl class="mb-3 row">
                                    <dd class="col-sm-3">File: </dd>
                                    <dd class="col-sm-9">
                                        <a href="'.$file_ar[$i].'">'.$name_ar[$i].'</a>
                                    </dd>
                                </dt>
                            </dl>';
                        }
                }

            ?>
            <dl class="mb-3 row">
                <dt class="col-sm-3">Note</dt>
                <dd class="col-sm-9">
                    <?php echo $noteV; ?>
                </dd>
            </dl>
            <br><br>
            <a href='paziente.php?ID=<?php echo $id?>'>
                <button type="button" class="btn btn-primary btn-lg col-5">Torna a <?php echo $id ?></button>
            </a>
            <a href="listaPazienti.php">
                <button type="button" class="btn btn-primary btn-lg col-5 float-end">Tutti i Pazienti</button>
            </a>
        </div>
        <br>
        <div class="box">
            <form action='modificaEsame.php' method='post'>  
				<button type="submit" class="btn btn-warning btn-lg col-5" value='<?php echo $num_esame ?>' name='modificaE'>Modifica</button>
            </form>
            <form action='paziente.php?ID=<?php echo $id?>' method='post' onsubmit='return show_alert();'>
				<button type="submit" class="btn btn-danger btn-lg col-5 float-end" style="margin-top: -50px" value='<?php echo $num_esame ?>' name='eliminaE'>Elimina</button>
			</form>
		</div>
    </body>
</html>
