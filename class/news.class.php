<?php
require_once('db.class.php');
/**
* @note Class for create, update, delete and read news
*/
class NewsActions extends Db
{
	public $con;
	public $table_name;
	function __construct()
	{
        $this->con = parent::connect();
  		//Set Table Name
  		$this->table_name = 'news';
	}

	/**
	* @note Get All Exist News
	* @params ()
	* @return $rows (news array)  
	*/
	public function getNews(){
		$rows = '';
		$query = 'SELECT * FROM '.$this->table_name.' ORDER BY `id` DESC';
        $result = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
        if (!empty($result->num_rows) && $result->num_rows > 0) {
        	$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }

        return $rows;

        mysqli_close($this->con);
	}

	/**
	* @note Get One new, using id
	* @params $id (int: numeric)
	* @return $data (news array)  
	*/
	public function getSinglNew($id){
		$query = "SELECT * FROM ".$this->table_name." where id = ".$id;
        $result = mysqli_query($this->con,$query) or die(mysql_error($this->con));
        $data = mysqli_fetch_assoc($result);
        return $data;
        mysqli_close($this->con);
	}

	/**
	* @note Create or Update News
	* @params $formData (array: $_POST), $action (string: 'create','update'), $id (int: numeric) 
	* @return array  
	*/
	public function createUpdateNews($formData, $action, $id = ''){
        // keep track validation errors
        $titleError 	= null;
        $authorError 	= null;
        $contentError 	= null;

        $title 		= '';
        $author 	= '';
        $content 	= '';
         
        // keep track post values
        $title 		= $formData['title'];
        $author 	= $formData['author'];
        $content 	= $formData['content'];
         
        // validate input
        $valid = true;
        if (empty($title)) {
            $titleError = 'Please enter Title';
            $valid = false;
        }
         
        if (empty($author)) {
            $authorError = 'Please enter Author Name';
            $valid = false;
        }
         
        if (empty($content)) {
            $contentError = 'Please enter Content';
            $valid = false;
        }
         
        // insert data
        if ($valid) {

        	if ( $action == 'create' ) {
        		$content = mysqli_real_escape_string($this->con,$content);
	            $query = "INSERT INTO ".$this->table_name." (title,author,content) values('".$title."', '".$author."', '".$content."')";
	            mysqli_query($this->con, $query);
	            header("Location: index.php?page=list");

        	}
        	elseif ( $action == 'update' && !empty($id) ) {
        		$content = mysqli_real_escape_string($this->con,$content);
	            $query = "UPDATE ".$this->table_name."  set title = '".$title."', author = '".$author."', content = '".$content."' WHERE id = '".$id."'";
	            mysqli_query($this->con, $query) or die(mysqli_error($this->con));
	            mysqli_close($this->con);
	            header("Location: index.php?page=list");
        	}

            exit();
        }

        return array(
        		'title'			=> $title,
        		'author'		=> $author,
        		'content'		=> $content,
        		'titleError' 	=> $titleError,
        		'authorError' 	=> $authorError,
        		'contentError' 	=> $contentError
        	);
	}

	/**
	* @note Delete News
	* @params $id (int: numeric) 
	* @return array  
	*/
	public function deleteNews($id){      
        // delete data
        $query = "DELETE FROM ".$this->table_name." WHERE id = ".$id;
        mysqli_query($this->con, $query) or die(mysql_error($this->con));
        mysqli_close($this->con);
        header("Location: index.php?page-list");
        exit();
	}

}