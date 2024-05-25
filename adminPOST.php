<html><head>
<?php
require_once('db.php');

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

if (isset($_POST['cestino'])){
    
    $username=$_POST['cestino'] ?? '';

    $sql = "
        DELETE FROM `user` WHERE `USERNAME`='$username';
        ";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php');
        //echo "New record created successfully";
        $conn->close();
    }
}
//var_dump($_POST);

if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $cognome = $_POST['cognome'] ?? '';
    $ruolo = $_POST['ruolo'] ?? '';
    
    $pwdLenght = mb_strlen($password);
    
    if (empty($username) || empty($password)) {
        $msg = 'Compila tutti i campi %s';
  //  } elseif (false === $isUsernameValid) {
       // $msg = 'Lo username non è valido. Sono ammessi solamente caratteri 
         //       alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
           //     Lunghezza massima 20 caratteri';
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = 'Lunghezza minima password 8 caratteri.
                Lunghezza massima 20 caratteri';
    } else {

        
        $pwdhash = password_hash($password, PASSWORD_DEFAULT);

        //$password_hash = password_hash($password, PASSWORD_BCRYPT);

        
        $sql = "
            INSERT INTO `user` (`USERNAME`, `PASSWORD`, `NOME`, `COGNOME`, `RUOLO`) 
            VALUES ('$username', '$pwdhash', '$nome', '$cognome', '$ruolo')";
    
        
        //if ($check->rowCount() > 0) {
        //    $msg = 'Registrazione eseguita con successo';
        //} else {
        //    $msg = 'Problemi con l\'inserimento dei dati %s';
        //}

        if ($conn->query($sql) === TRUE) {
            header('Location: admin.php');
            //echo "New record created successfully";
            $conn->close();
            
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
          
        
    }
    
    
}
if (isset($_POST['changepassword'])) {
    $oldpwd = $_POST['oldpwd'] ?? '';
    $newpwd = $_POST['newpwd'] ?? '';
    $rnewpwd = $_POST['rnewpwd'] ?? '';
    echo var_dump($_POST);
    if ($newpwd == $rnewpwd) {
        $pwdLenght = mb_strlen($newpwd);

        if (empty($newpwd) || empty($rnewpwd)) {
            $msg = 'Compila tutti i campi';
        } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
            $msg = 'Lunghezza minima password 8 caratteri.
                    Lunghezza massima 20 caratteri';
        } else {
            $sql = "SELECT username, password, ruolo FROM `user` WHERE `USERNAME`='$session_user'";
            $res= $conn->query($sql);

            while($row = $res->fetch_assoc()){
                if($session_user == $row["username"] && password_verify($oldpwd, $row["password"])){     // se ci sono le credenziali corrette
                    $pwdhash = password_hash($newpwd, PASSWORD_DEFAULT);
                    
                    $sql = "UPDATE `user` SET `PASSWORD`='$pwdhash',`PW_UPDATE`= CURRENT_TIMESTAMP WHERE `USERNAME`='$session_user'";
                    $res= $conn->query($sql);

                    header('Location: home.php');                                       // mi porta alla home
                    exit;
                }
                else {
                    $msg = 'Hai sbagliato password';
                }
            }
        }
    } else {
        $msg = "diverse";
    }
    echo $msg;

}
?></head>
<body>

</body></html>