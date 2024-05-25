<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (empty($username) || empty($password)) {
            $msg = 'Inserisci username e password %s';
        } else {
            /*$query = "
                SELECT username, password
                FROM users
                WHERE username = :username
            ";
            
            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);
            $check->execute();
            
            $user = $check->fetch(PDO::FETCH_ASSOC);
            
            if (!$user || password_verify($password, $user['password']) === false) {*/
            if (!($username == 'gian' && $password == '1234')) {
                $msg = 'Credenziali utente errate %s';
            } else {
                /*session_regenerate_id();
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_user'] = $user['username'];
                */
                header('Location: home.php');
                exit;
            }
        }
        
        printf($msg, '<a href="../index.html">torna indietro</a>');
    }
?>