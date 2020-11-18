<?php 
/**
* 
*/
class Auth 
{
	private $req;

	function __construct(){
		$user = "creat1451171";
		$pass = "fvgbffhvbc";
		$host = "creationsyorick.fr";
		$nomBase = "creat1451171";
		$db = new PDO('mysql:host=' . $host . ';dbname=' . $nomBase . ';charset=UTF-8', $user, $pass);
	}

	public static function userConnect($username, $password){
		$login = $db->prepare('SELECT * FROM `cy_users` WHERE `password` = ? AND `username` = ?');
		$login->execute(array($password, $username));
		return $login->fetch(PDO::FETCH_OBJ);
	}
}
 ?>