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

    function getUserNameById($id) {
        $conn = connectToDatabase();
        $conn->select_db("blogs");
        $sql = "SELECT * FROM users where u_ID=$id";
        $res = $conn->query($sql);
        $row = $res->fetch_row();
        return $row[4];
    }

    function getUserIdByUserName($username) {
         $conn = connectToDatabase();
        $conn->select_db("blogs");
        $sql = "SELECT * FROM users where username='$username'";
        $res = $conn->query($sql);
        $row = $res->fetch_row();
        echo $row[0];
        //exit(0);
        return $row[0];
    }

?>