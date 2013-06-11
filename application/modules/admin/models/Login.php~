<?php

require_once 'Zend/Db.php';
require_once 'Zend/Db/Table/Abstract.php';

class Admin_Model_Login
{	
	
	
	
	public function fetchAll($table)
	{
	$db = Zend_Registry::get('db'); 
			$sql = "select * from ".$table;
			$stmt   = $db->query($sql);
			$result = $stmt->fetchAll(Zend_Db::FETCH_ASSOC); 
			return $result;
	}	
	
	
	
	public function update($condition,$colums,$table)
	{
			
			$db = Zend_Registry::get('db'); 
			$keys=array_keys($colums);
	  		$values=array_values($colums);
			for($i=0;$i<count($keys);$i++){
				$newarr[]=$keys[$i]."='".$values[$i]."'";
			}
			$str=join(',',$newarr);
			
			$quer="update $table set $str where id=$condition"; 
			$resultset=$db->query($quer);
			
	
	}
	

	
	public function find($table,$id){
		
		$db = Zend_Registry::get('db'); 	
		$find = "select * from $table where id=".$id;
		$find_row = $db->query($find);
		$find_result = $find_row->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $find_result;
	
	}
	
	
	
	public function columns($table){
	
		$db = Zend_Registry::get('db'); 
		$columns = "show columns from $table";
		$columns = $db->query($columns);
		$columns = $columns->fetchAll(Zend_Db::FETCH_ASSOC); 
		return $columns;
	
	}
	

	
	
	public function delete($table_name,$id)
	{
		$db = Zend_Registry::get('db'); 
		$del = "delete from ".$table_name." where id=".$id;
		$stmt   = $db->query($del);
			
	}
	
	

}

