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


        <script>
            function show_alert() {
                if(!confirm("Eliminare definitivamente?")) {
                    return false;
                }
                this.form.submit();
            }
        </script>

        <?php
            session_start();

            if (isset($_SESSION['session_id'])) {               // se è stato definito il token id allora
                // definisco le variabili di sessione
                $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');   // username
                $session_id = htmlspecialchars($_SESSION['session_id']);                            // id
                $session_role = htmlspecialchars($_SESSION['session_role']);                        // ruolo
                $session_lang = htmlspecialchars($_SESSION['session_lang']);                        // lingua
            } else {
                header('Location: /');                          // ritorna alla schermata di login altrimenti
            }
        ?>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Tutti gli utenti</h2>
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        <?php echo $session_user ?>
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
        
		<a href="home.php">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>


        <div class='box'>
            
            <table class='table table-fixed'>
                <thead>
                    <tr scope="row">
                        <th scope="col" class="col-1">
                            Username
                        </th>
                        <th scope="col" class="col-1">
                            Cognome&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th scope="col" class="col-1">
                            Nome&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th scope="col" class="col-1">
                            Ruolo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th scope="col" class="col-1">
                            Aggiornamento Password&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th scope="col" class="col-1">
                            Creazione&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                        <th scope="col" class="col-1">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('db.php');

                        $sql = "
                            SELECT username, cognome, nome, ruolo, pw_update, creazione FROM `user`
                            ORDER BY `user`.`username`
                        ";

                        $res= $conn->query($sql);

                        while($row = $res->fetch_assoc()) {
                            echo "
                                <tr scope='row'>
                                    <td>".$row["username"]."</td>
                                    <td>".$row["cognome"]."</td>
                                    <td>".$row["nome"]."</td>
                                    <td>".$row["ruolo"]."</td>
                                    <td>".$row["pw_update"]."</td>
                                    <td>".$row["creazione"]."</td>
                                    <td>
                                        <form action='adminPOST.php' method='post' onsubmit='return show_alert();'>
                                            <button type='submit' class='btn btn-danger' value='".$row["username"]."' name='cestino' >
                                                <img src='rsc/bin.png' width='90%' height='90%'>
                                            </button>
                                            
                                        </form>
                                    </td>
                                </tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <br><br>
        <div class='box'>
            <h4>Modifica Password</h4>
            <form action='adminPOST.php' method="post">
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Vecchia Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="oldpwd" name="oldpwd">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Nuova Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="newpwd" name="newpwd" required>
                    </div>
                    <label for="password" class="col-sm-2 col-form-label">Ripeti Nuova Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="rnewpdw" name="rnewpwd" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="changepassword">
            </form>
        </div>

        <br><br>
        <div class='box'>
            <h4>Aggiungi utente</h4>
            <form action='adminPOST.php' method="post">
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <label for="cognome" class="col-sm-2 col-form-label">Cognome</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cognome" name="cognome">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ruolo" class="col-sm-2 col-form-label">Ruolo</label>
                    <div class="col-sm-4">
                        <select class="form-select" id='ruolo' name='ruolo' required>
                            <option value="" selected>-Nessuna Selezione-</option>
                            <option value="1">Triage</option>
                            <option value="2">Infermiere</option>
                            <option value="3">Ostetrica</option>
                            <option value="4">Medico</option>
                            <option value="5">Tecnico Laboratorio</option>
                            <option value="6">Farmacista</option>
                            <option value="7">Amministratore</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="register">
            </form>
        </div>
        
    </body>
</html>