<?php 
	class Connection{
		public function __construct(){
			session_start();
		}
		public function DataBase_Conn(){
			$Connection=new mysqli('localhost','root','','Budget');

			if($Connection->connect_errno){
				die('Connection Failed !'.$Connection->connect_errno);
			}
			return $Connection;
		}
	}
?>