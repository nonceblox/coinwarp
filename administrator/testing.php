<?php  
    $host = '103.98.72.66';
    $db   = 'bbtokens_bbtokens';
    $user = 'bbtokens_user';
    $pass = 'Iostream@213';
    $charset = 'utf8';
    
    
    function testdb_connect ($hostname, $username, $password){
        $dbh = new PDO("mysql:host=$hostname;dbname=removed", $username, $password);
        return $dbh;
    }
    
    try {
        $dbh = testdb_connect ($hostname, $username, $password);
        echo 'Connected to database';
    } catch(PDOException $e) {
        echo $e->getMessage();
    }


?>