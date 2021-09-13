<?php 
   $emp_name = $_POST["emp_name"];
   //----------connect to MySQL system-------------- 
   $dbhost = "localhost:3306";
   $dbuser = "root";
   $dbpass = "";
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) 
   {
      die("Could not connect: " . mysql_error());
   }
   else
   {
	   print("connected <br/>");
   }
       
   mysql_select_db("Employee_info");  
   
   //---------Perform a query------------------------ 
   $sql = "SELECT * FROM employee where emp_name = \"$emp_name\""; 
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not retrieve data : " . mysql_error());
   }   
   else
   {
	 print("data is retrieved<br/>");  
   }   

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "Instructor Name :{$row['emp_name']}  <br/> ".
         "--------------------------------<br>";
   } 
   print("data is printed<br/>");
  
   mysql_close($conn);
?>