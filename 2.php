<?php
$emp_name = $_POST["emp_name"];
$emp_address = $_POST["emp_address"];
$emp_name = $_POST["emp_name"];
$emp_address = $_POST["emp_address"];
$emp_salary = $_POST["emp_salary"];

$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
if(! $conn ) 
{
   die("Could not connect: " . mysql_error());
}

 mysql_select_db("employee_info");                   
$sql = "INSERT INTO employee (emp_name,emp_address, emp_salary, join_date) ". 
       "VALUES(\"$emp_name\",\"$emp_address\",$emp_salary, NOW())";
               


$retval = mysql_query( $sql, $conn );
           
if(! $retval ) 
{
    die("Could not enter data: " . mysql_error());
}
else
{
	print("Your data have been added to the database");
}	
mysql_close($conn);

?>