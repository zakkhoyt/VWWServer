<?php
    
    
    include 'db_config.php';
    
    $pdo = new PDO($db_string, $db_username, $db_password, array());
    
    // If there is an error executing database queries, we want PDO to
    // throw an exception. Our exception handler will then exit the script
    // with a "500 Server Error" message.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // We want the database to handle all strings as UTF-8.
    $pdo->query('SET NAMES utf8');

    
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        echo 'GET';
        echo 'uuid: ' . $_GET['uuid'];
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo 'POST';
        if (!isset($_POST['first_name']) ||
            !isset($_POST['last_name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['password'])){
            echo 'missing required parameter';
            echo print_r($_POST);
            exitWithHttpError(400, "missing param");
        }
        
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, passcode, uuid, created_at) VALUES (?, ?, ?, ?, ?, ?)');
        $date = date('m/d/Y h:i:s a', time());
        $stmt->execute(array($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], get_random_string(40), $date));
        $pdo->commit();
        
        echo "added users entry to db";
    }
    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        echo 'DELETE' . '<br>';
        
        echo print_r($_REQUEST);
        if (!isset($_REQUEST['uuid'])){
            echo 'missing required parameter';
            echo print_r($_DELETE);
            exitWithHttpError(400, "missin uuid");
        }
        $uuid = $_REQUEST['uuid'];
        echo 'uuid = ' . $uuid;
        
        $pdo->beginTransaction();
        $stmt = $pdo->prepare('DELETE from users where uuid = ?');
        $stmt->execute(array($_REQUEST['uuid']));
        $pdo->commit();
        
        echo "deleted user entry from db";

    }
    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        echo 'PUT' . '<br>';
    }
    
    


?>