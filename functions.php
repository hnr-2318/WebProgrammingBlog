<?php
    function connectToDatabase() {
        $dbhost = "localhost:3306";
        $dbuser = "root";
        $dbpass = "";
        $conn = new mysqli($dbhost, $dbuser, $dbpass);
        if(! $conn ) 
        {
            die("Could not connect: " . mysql_error());
        }
        return $conn;
    }

    function performQuery($conn, $sql) {
        $retval = $conn->query($sql);
        if( !$retval ) 
        {
            die("Could not retrieve data : " . mysql_error());
        }   
        return $retval;
    }

    function getUserNameById($conn,$id) {
        $sql = "SELECT username FROM 'users' WHERE u_ID='$id'";
        $res = performQuery($conn,$sql);
        return $res->fetch_row()[0];
    }

?>