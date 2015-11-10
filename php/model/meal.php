<?php
require_once '../inc/global.php';

class Meal{
    public static function Get($id = null){
        $sql = "SELECT * FROM meals";
        
		if($id){
			$sql .= " WHERE mid=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
    }
    
    static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM meals WHERE mid = $id";
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		return $error ? array ('sql error' => $error) : false;
	}
	
	static public function Blank()
	{
		return array();
	}
	static public function Save(&$row)
	{
		$conn = GetConnection();
		
		$row2 = escape_all($row, $conn);
		$row2['Birthday'] = date( 'Y-m-d H:i:s', strtotime( $row2['Birthday'] ) );
		if (!empty($row['id'])) {
			$sql = "Update meals
						Set Name='$row2[Name]', Birthday='$row2[Birthday]'
					WHERE id = $row2[id]
					";
		}else{
			$sql = "INSERT INTO meals
					(Name, Birthday, created_at)
					VALUES ('$row2[Name]', '$row2[Birthday]', Now() ) ";				
		}
		
		$results = $conn->query($sql);
		$error = $conn->error;
		
		if(!$error && empty($row['id'])){
			$row['id'] = $conn->insert_id;
		}
		$conn->close();
		return $error ? array ('sql error' => $error) : false;
	}
}


