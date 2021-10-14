<?php 
   $emp_name = $_POST["emp_name"];
   //----------connect to MySQL system-------------- 
   $dbhost = "localhost:3306";
   $dbuser = "root";
   $dbpass = "";
   $conn = new mysqli($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) 
   {
      die("Could not connect: " . mysql_error());
   }
   else
   {
	   print("connected <br/>");
   }
       
    $conn->select_db("Employee_info");  
   
   //---------Perform a query------------------------ 
   $sql = "SELECT * FROM employee where emp_name = \"$emp_name\""; 
   $retval = $conn->query($sql);
   
   if(! $retval ) 
   {
      die("Could not retrieve data : " . mysql_error());
   }   
   else
   {
	 print("data is retrieved<br/>");  
   }   

   while($row = $retval->fetch_assoc()) 
   {
      echo "Instructor Name :{$row['emp_name']}  <br/> ".
         "--------------------------------<br>";
   } 
   print("data is printed<br/>");

   $conn->close();
  
?>