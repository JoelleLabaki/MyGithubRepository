    <?php  
      
    /* 
    * class db 
    * @param Host 
    * @param User  
    * @param Password 
    * @param Name 
    */  
    class db  
    {  
          
        private $host;        //MySQL Host  
        private $user;        //MySQL User  
        private $pass;        //MySQL Password  
        private $dbname;      //MySQL Name  
          
        private $mysqli;      //MySQLi Object  
        private $last_query;
		
          
        /* 
         * Class Constructor 
         * Creates a new MySQLi Object 
         */  
         function __construct($host, $user, $pass, $dbname)  
        {  			  
		  $this->host =  $host ;  
		  $this->user = $user;  
		  $this->pass = $pass;  
		  $this->dbname = $dbname;  

          $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname); 
		  if (mysqli_connect_errno()) die('Could not connect: ' . mysqli_connect_error());			
        }  
		
		/* 
		 * Function Insert 
		 * @param into 
		 * @param values 
		 * @returns boolean 
		 */  
		 public function insert($into, $values)  
		{  
		  $this->last_query = "INSERT INTO " . $into . " VALUES(" . $values . ")";  
			
		  if($this->mysqli->query($this->last_query))  
		  {  
		    return true;  
		  } else {  
		   return false;  
		  }    
		}  
		
		/* 
		 * Function select 
		 * @param fields 
		 * @param table 
		 * @param whereCond 
		 * @returns result 
		 */  
		 public function select($fields,$table,$whereCond)  
		{  
			$this->last_query = "Select $fields from $table where $whereCond";  
			$result = $this->mysqli->query($this->last_query);
			return $result;
		}  

    }  
 
    ?>  
	