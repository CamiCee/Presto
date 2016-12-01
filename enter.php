<?php
     $host = getenv('IP');
    $username = getenv('C9_USER');
    $password = '';
    $dbname = 'Notes';
    
    if (isset ($_POST['date'])&& isset ($_POST['sermon']))
    {
        $pdo_dsn="mysql:dbname=$dbname;host=$host";
        $pdo_user=$username; 
        $pdo_password=$password;
        
         try
        {
            $conn = new PDO($pdo_dsn, $pdo_user, $pdo_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $qry=$conn->prepare('INSERT INTO sermons (date2,sermon) VALUES (:date,:sermon)');
              $qry->execute(Array(
                ':date' => $_POST[date]=filter_input (INPUT_POST, 'date', FILTER_SANITIZE_STRING),
                ':sermon' => $_POST[sermon]=filter_input (INPUT_POST, 'sermon', FILTER_SANITIZE_STRING)
                ));
            echo "Added to database";
        }
        catch (PDOException $e) 
        {
             echo "Could not connect to the database! Ha";
            echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
            exit;
        }
    }
?>