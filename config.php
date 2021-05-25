<?php
	
	class config 
	{
		protected $servername='localhost';
		protected $username='root';
		protected $pass='';
		protected $db='phd';
		function __construct()
		{
			$this->conn=new mysqli($this->servername,$this->username,$this->pass,$this->db);
		}
	}

	
	class database extends config
	{
        public function register($name,$email,$phone,$cv,$proforma,$otp)
        {
            $this->qry=mysqli_query($this->conn,"SELECT * FROM users WHERE email='$email'");
            if(mysqli_num_rows($this->qry)>0){
				return 2;
			}else{
				$this->qry=mysqli_query($this->conn,"INSERT INTO users(name,email,phone,cv,proforma,otp) VALUES('$name','$email','$phone','$cv','$proforma','$otp')");
				if($this->qry)
					return 1;
				else
					return 0;
			}
        }
				
	}
?>