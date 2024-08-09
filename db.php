<?php
    $servername = "localhost";
    $username = "root";
    $pw = "9K7OhpsiJF4LnLOy";

    // Create connection
    $conn = new mysqli($servername, $username, $pw);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //else{
    //    echo("Connection Succesfull");
    //}

    // Creazione del database
    $sql = "CREATE DATABASE IF NOT EXISTS telemedicine";
    if ($conn->query($sql) === TRUE) {
        echo "Database creato con successo.";
    } else {
        echo "Errore durante la creazione del database: " . $conn->error;
    }

    // Seleziona il database creato
    $conn->select_db("telemedicine");

    $sql ="CREATE TABLE IF NOT EXISTS anagrafica (
            num INT(10) AUTO_INCREMENT PRIMARY KEY,
            ID VARCHAR(15) NOT NULL,
            nome VARCHAR(30) NOT NULL,
            cognome VARCHAR(30) NOT NULL,
            nome_madre VARCHAR(30) NOT NULL,
            sesso VARCHAR(7) NOT NULL,
            dataNascita DATE NOT NULL,
            provenienza VARCHAR(20) NOT NULL,
            num_tenda VARCHAR(10) DEFAULT NULL,
            sezione VARCHAR(20) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabella anagrafica creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS esame (
            id_paziente VARCHAR(15) NOT NULL,
            data DATE NOT NULL,
            tipo VARCHAR(15) NOT NULL,
            num_esame INT(11) AUTO_INCREMENT PRIMARY KEY,
            note VARCHAR(250) DEFAULT NULL,
            filePath VARCHAR(250) DEFAULT NULL,
            fileName VARCHAR(250) DEFAULT NULL,
            ESR INT(15) DEFAULT NULL,
            rbc INT(15) DEFAULT NULL,
            withebloc INT(15) DEFAULT NULL,
            hemoglobin INT(15) DEFAULT NULL,
            hematocrit INT(15) DEFAULT NULL,
            CRP INT(15) DEFAULT NULL,
            colorore INT(15) DEFAULT NULL,
            aspetito VARCHAR(20) DEFAULT NULL,
            proteine INT(15) DEFAULT NULL,
            glucosio INT(15) DEFAULT NULL,
            proliene INT(15) DEFAULT NULL,
            emoglobina INT(15) DEFAULT NULL,
            corpichetonici INT(15) DEFAULT NULL,
            bilirubina INT(15) DEFAULT NULL,
            urobilinogeno INT(15) DEFAULT NULL,
            creatinina INT(15) DEFAULT NULL,
            leucociti INT(15) DEFAULT NULL,
            PT INT(15) DEFAULT NULL,
            PTT INT(15) DEFAULT NULL,
            TP INT(10) DEFAULT NULL,
            t3 INT(10) DEFAULT NULL,
            t4 INT(10) DEFAULT NULL,
            psh INT(10) DEFAULT NULL,
            beta_psh INT(10) DEFAULT NULL,
            BAT INT(15) DEFAULT NULL,
            BATval INT(15) DEFAULT NULL,
            HB INT(15) DEFAULT NULL,
            HBval INT(15) DEFAULT NULL,
            HIV INT(15) DEFAULT NULL,
            HIVval INT(15) DEFAULT NULL,
            HCV INT(15) DEFAULT NULL,
            HCVval INT(15) DEFAULT NULL,
            FP8 INT(15) DEFAULT NULL,
            FP8val INT(15) DEFAULT NULL,
            HPV INT(15) DEFAULT NULL,
            CHO INT(15) DEFAULT NULL,
            CHOval INT(15) DEFAULT NULL,
            TRG INT(15) DEFAULT NULL,
            TRGval INT(15) DEFAULT NULL,
            LDL INT(15) DEFAULT NULL,
            LDLval INT(15) DEFAULT NULL,
            HDL INT(15) DEFAULT NULL,
            HDLval INT(15) DEFAULT NULL,
            sx VARCHAR(200) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";

    if ($conn->query($sql) === TRUE) {
        echo "Tabella esame creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql ="CREATE TABLE IF NOT EXISTS paziente (
            ID VARCHAR(15) NOT NULL PRIMARY KEY,
            vaccinazioni VARCHAR(100) DEFAULT NULL,
            anamnesiPat VARCHAR(500) DEFAULT NULL,
            precInterventi VARCHAR(100) DEFAULT NULL,
            precRicoveri VARCHAR(100) DEFAULT NULL,
            precVisite VARCHAR(100) DEFAULT NULL,
            malattieGenitori VARCHAR(500) DEFAULT NULL,
            malAllergiche VARCHAR(100) DEFAULT NULL,
            malEndocrine VARCHAR(100) DEFAULT NULL,
            tumori VARCHAR(100) DEFAULT NULL,
            allergie VARCHAR(100) DEFAULT NULL,
            terapiaCronica VARCHAR(500) DEFAULT NULL,
            altroTerapiaCronica VARCHAR(200) DEFAULT NULL,
            note VARCHAR(100) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";

    if ($conn->query($sql) === TRUE) {
        echo "Tabella paziente creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS ricetta (
            num INT(20) NOT NULL AUTO_INCREMENT,
            id_paziente VARCHAR(15) NOT NULL,
            nome VARCHAR(20) NOT NULL,
            validita DATE,
            qta INT(10) NOT NULL,
            unita VARCHAR(20) NOT NULL,
            dose VARCHAR(100),
            note VARCHAR(250),
            num_visita INT(15),
            dataErogazione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (num)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
        
    if ($conn->query($sql) === TRUE) {
        echo "Tabella ricetta creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS rubrica (
            nome VARCHAR(30) NOT NULL,
            cognome VARCHAR(30) NOT NULL,
            email VARCHAR(40) NOT NULL,
            specializzazione VARCHAR(60) DEFAULT NULL,
            PRIMARY KEY (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
                
    if ($conn->query($sql) === TRUE) {
        echo "Tabella rubrica creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS `user` (
            USERNAME VARCHAR(20) NOT NULL,
            PASSWORD VARCHAR(255) NOT NULL,
            NOME VARCHAR(20) DEFAULT NULL,
            COGNOME VARCHAR(20) DEFAULT NULL,
            RUOLO INT(2) NOT NULL,
            PW_UPDATE TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            CREAZIONE TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (USERNAME)
        ) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;";
                        
    if ($conn->query($sql) === TRUE) {
        echo "Tabella user creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS visita (
            id_paziente VARCHAR(20) NOT NULL,
            num INT(15) NOT NULL AUTO_INCREMENT,
            date DATE NOT NULL,
            psmax INT(15) DEFAULT NULL,
            psmin INT(15) DEFAULT NULL,
            freq_Cardiaca INT(15) DEFAULT NULL,
            saturazione INT(15) DEFAULT NULL,
            freq_Respiratoria INT(15) DEFAULT NULL,
            terapia_prescritta VARCHAR(500) DEFAULT NULL,
            note VARCHAR(500) DEFAULT NULL,
            diagnosi VARCHAR(200) DEFAULT NULL,
            PRIMARY KEY (num),
            KEY (id_paziente)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
                                
    if ($conn->query($sql) === TRUE) {
        echo "Tabella visita creata con successo.";
    } else {
        echo "Errore durante la creazione della tabella: " . $conn->error;
    }

    
?>