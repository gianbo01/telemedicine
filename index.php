<html>
    <head>
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
        <div class='box'>
            <?php
                session_start();
                require_once('db.php');     // collegamento al db
                
                if (isset($_SESSION['session_id'])) {   // se son già loggato
                    header('Location: home.php');       // mi porta alla home
                    exit;
                }
                if (isset($_POST['login'])) {       // fase di login
                    $username = $_POST['username'] ?? '';
                    $password = $_POST['password'] ?? '';
                    
                    if (empty($username) || empty($password)) {
                        $msg = 'Inserisci username e password';
                    } else {
                        $sql = "
                            SELECT username, password, ruolo FROM `user` WHERE `USERNAME`='$username'
                        ";
                        
                        $res= $conn->query($sql);

                        if($res->num_rows == 0) {
                            $msg = 'Username inesistente';
                        }
                        else {
                            while($row = $res->fetch_assoc()){
                                if($username == $row["username"] && password_verify($password, $row["password"])){     // se ci sono le credenziali corrette
                                    session_regenerate_id();                                            // allora genero l'ID
                                    $_SESSION['session_id'] = session_id();                             // e le variabili di sessione
                                    $_SESSION['session_user'] = $username;
                                    $_SESSION['session_role'] = $row["ruolo"];
                                    $_SESSION['session_lang'] = "ITA";
                                    
                                    header('Location: home.php');                                       // mi porta alla home
                                    exit;
                                }
                                else {
                                    $msg = 'Hai sbagliato password';
                                }
                            }
                        }
                        
                    }
                    // stampa il messaggio
                    echo('<div class="alert alert-danger" role="alert">'.$msg.'</div>');
                }
            ?>

            <form action="/" method="post">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="username" class="form-control was-invalid" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control was-valid" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            
            
        </div>

    </body>
</html>