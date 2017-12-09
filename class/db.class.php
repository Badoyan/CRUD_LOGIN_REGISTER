<?php

/**
* Class for Connect To DB
*/
class Db 
{
	
	public function connect(){
		// Enter your Host, username, password, database below.
		$this->con = mysqli_connect("localhost","root","","news");
		// Check connection
		if (mysqli_connect_errno())
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}

  		return $this->con;
	}
}