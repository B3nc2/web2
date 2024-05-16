<?php
    $db_server= "sql111.infinityfree.com";
    $db_host= "if0_36548864";
    $db_pass = "OzjzhN0VLFFpRdr";
    $db_name = "if0_36548864_csehely";
    
    try {
        $conn = mysqli_connect($db_server, $db_host, $db_pass, $db_name);
    } catch (mysqli_sql_exception) {
        echo "Error: Could not connect to {$db_name} database. <br>";
    }
?>
