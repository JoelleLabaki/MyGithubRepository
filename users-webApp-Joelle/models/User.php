<?php  
  include 'db.php';
    /* 
    * class User 
	* @param id 
    * @param full_name 
    * @param email  
    * @param password 
    * @param join_date 
    */  
    class User  
    {  
	    private $id;
		private $full_name;       
        private $email;         
        private $password;       
        private $join_date;
		
		private $db;
          
        /* 
         * User Class Constructor 
         */  
		 function __construct($id,$full_name, $email, $password, $join_date)  
        {  		
			$this->id        =  $id;  
			$this->full_name =  $full_name;  
			$this->email     =  $email;  
			$this->password  =  $password;  
			$this->join_date =  $join_date;
			
			$this->db = new db('localhost', 'root', '', 'users_db'); 	
	    }

	    /* 
         * Function that gets a user by his ID 
		 * Prints the user info 
         */  
         public function getaUserByhisID()  
        {  			   
            $result = $this->db->select("*","Users",'id = '.$this->id);
            if (!$result) die('Could not get user');
			
			echo "<table border='1'>
			<tr>
			<th>FullName</th>
			<th>Email</th>
			<th>Password</th>
			<th>JoinDate</th>
			</tr>";

			while($user = $result->fetch_object()) 
			 {
			  echo "<tr>";
			  echo "<td>" . $user->full_name . "</td>";
			  echo "<td>" . $user->email     . "</td>";
			  echo "<td>" . $user->password  . "</td>";
			  echo "<td>" . $user->join_date . "</td>";
			  echo "</tr>";
			  }
			 echo "</table>";
        }  
	    /* 
		 * Function that creates an account 
		 */  
		 public function createAnAccount()  
		{  
		 // $this->validation($this->email);
		  if(!$this->db->insert("Users (full_name, email, password,join_date)","'$this->full_name','$this->email','$this->password',$this->join_date"))
           die('Could not create account');
		} 

	   /* 
		* Function validation 
		* Check The email if Unique
	    */
        public function validation()
       {
		$result = $this->db->select("1 as found ","users",'email = "'.$this->email.'" limit 1');
		if($res = $result->fetch_object())
		 echo "found";
	   }		

    }  
 
    ?>  
	