<?php   
 //database.php  
 class Databases{  
      public $con;  
      public $error;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("mysqli", "root", "root", "testing");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      } 
public function insertData($post)
		{
			
			$username = $this->con->real_escape_string($_POST['username']);
			$password = $this->con->real_escape_string($_POST['password']);
			$email = $this->con->real_escape_string($_POST['email']);
			$query="INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";
			$sql = $this->con->query($query);
			if ($sql==true) {
				header("location: can_login.php?msg1=insert");
			}else{
				echo "Registration failed try again!";
			}
		}	  
      public function required_validation($field)  
      {  
           $count = 0;  
           foreach($field as $key => $value)  
           {  
                if(empty($value))  
                {  
                     $count++;  
                     $this->error .= "<p>" . $key . " is required</p>";  
                }  
           }  
           if($count == 0)  
           {  
                return true;  
           }  
      }  
      public function can_login($table_name, $where_condition)  
      {  
           $condition = '';  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           /*This code will convert array to string like this-  
           input - array(  
                'id'     =>     '5'  
           )  
           output = id = '5'*/  
           $query = "SELECT * FROM ".$table_name." WHERE " . $condition;  
           $result = mysqli_query($this->con, $query);  
           if(mysqli_num_rows($result))  
           {  
                return true;  
           }  
           else  
           {  
                $this->error = "Wrong Data";  
           }  
      }       
 }  
 ?>  