<?php 
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
     
   //---------Perform a query------------------------
   $sql = "CREATE Database Employee_info";  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not create database: " . mysql_error());
   }
   else
   {
	 print("database is created<br/>");  
   }
   
   mysql_select_db("Employee_info");  
   
   //---------Perform a query------------------------ 
   $sql = "CREATE TABLE employee( ".
      "emp_id INT NOT NULL AUTO_INCREMENT, ".
      "emp_name VARCHAR(20) NOT NULL, ".
      "emp_address  VARCHAR(20) NOT NULL, ".
      "emp_salary   INT NOT NULL, ".
      "join_date    varchar(20) NOT NULL, ".
      "primary key ( emp_id ));"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not create table: " . mysql_error());
   }
   else
   {
	 print("table is created<br/>");  
   }
   //---------Perform a query------------------------ 
   $sql = "INSERT INTO employee ".
      "(emp_name,emp_address, emp_salary, join_date) ".
      "VALUES ( \"guest\", \"XYZ\", 2000, NOW() )"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not insert data to table: " . mysql_error());
   }   
   else
   {
	 print("data is inserted<br/>");  
   }
      //---------Perform a query------------------------ 
   $sql = "INSERT INTO employee ".
      "(emp_name,emp_address, emp_salary, join_date) ".
      "VALUES ( \"vistor\", \"ABC\", 3000, NOW() )"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not insert data to table: " . mysql_error());
   }   
   else
   {
	 print("data is inserted<br/>");  
   }
   //---------Perform a query------------------------ 
   $sql = "SELECT * FROM employee"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not insert data to table: " . mysql_error());
   }   
   else
   {
	 print("data is retrieved<br/>");  
   }   

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "Employee Name :{$row['emp_name']}  <br/> ".
         "Employee Address: {$row['emp_address']} <br/> ".
         "Employee Salary: {$row['emp_salary']} <br/> ".
         "Join Date : {$row['join_date']} <br/> ".
         "--------------------------------<br>";
   } 
   print("data is printed<br/>");
  
   //---------Perform a query------------------------ 
   $sql = "UPDATE employee SET emp_salary=3000 where emp_address=\"XYZ\""; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not update table: " . mysql_error());
   }      
   else
   {
	 print("database is updated<br/>");  
   }
  /* 
 //---------Perform a query------------------------ 
   $sql = "DROP TABLE employee"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not drop table: " . mysql_error());
   } 
   else
   {
	 print("table is deleted<br/>");  
   }
  //---------Perform a query------------------------ 
   $sql = "DROP DATABASE Employee_info"; 
	  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) 
   {
      die("Could not drop database: " . mysql_error());
   } 
   else
   {
	 print("database is deleted<br/>");  
   }  
   */
   mysql_close($conn);
?>