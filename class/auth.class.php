<?php
require_once('db.class.php');
/**
* @note Class for user login and registartion
*/
class UserAuth extends Db
{
	public $con;
	public $table_name;
	function __construct()
	{
  		//Set Table Name
  		$this->table_name = 'users';

  		$this->con = parent::connect();
	}

	/**
	* @note Method for login user
	* @params $userData (array)
	* @return void
	*/
	public function login($userData){
		// removes backslashes
		$username = stripslashes($userData['username']);
	    //escapes special characters in a string
		$username = mysqli_real_escape_string($this->con,$username);
		$password = stripslashes($userData['password']);
		$password = mysqli_real_escape_string($this->con,$password);
		//Checking is user existing in the database or not
	    $query = "SELECT * FROM ".$this->table_name." WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($this->con,$query) or die(mysql_error($this->con));
		$rows = mysqli_num_rows($result);
	    if( $rows == 1 ){
		    $_SESSION['username'] = $username;
	        // Redirect user to index.php
		    header("Location: index.php");
		    exit();
	    }else{
			echo "<div class='form'>
					<h3>Username/password is incorrect.</h3>
					<br/>Click here to <a href='index.php'>Login</a></div>";
			mysqli_close($this->con);
		}
	}

	/**
	* @note Method for register user
	* @params $userData (array)
	* @return void
	*/
	public function register($userData){
		// removes backslashes
		$username = stripslashes($userData['username']);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($this->con,$username); 
		$email = stripslashes($userData['email']);
		$email = mysqli_real_escape_string($this->con,$email);
		$password = stripslashes($userData['password']);
		$password = mysqli_real_escape_string($this->con,$password);
		$trn_date = date("Y-m-d H:i:s");
		$query = "INSERT into ".$this->table_name." (username, password, email, trn_date)
		    VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($this->con,$query);
        if($result){
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to <a href='index.php'>Login</a></div>";
			mysqli_close($this->con);
		}
	}
}