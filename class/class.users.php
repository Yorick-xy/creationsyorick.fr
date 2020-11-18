<?php 

	/**
	* Users
	*/
	class User
	{
		private $insertAll;
		private $connexion;
		private $updatepass;
		private $updateUserIp;
		private $delcompte;
		private $allUsers;
		public $showAll;
		private $id;
        private $db;

		public function __construct($db)
		{
			$this->insertAll = $db->prepare("INSERT INTO cy_users(username,password,email,rank,avatar,active,date_inscription) VALUES(:username,:password,:email,:rank,:avatar,:active,now())");
			$this->connexion = $db->prepare("SELECT * FROM cy_users WHERE username = :username AND password = :password AND active = 1");
			$this->updatepass = $db->prepare("UPDATE cy_users SET password = :password");
			$this->updateUserIp = $db->prepare("UPDATE cy_users SET last_ip = :last_ip WHERE username = :username");
			$this->delcompte = $db->prepare('DELETE * FROM cy_users WHERE username = :username');
			$this->showAll=$db->prepare("SELECT * FROM cy_users ORDER BY id DESC");
		}


		public function insertAll($username, $password, $email, $rank, $avatar, $active){
			$this->insertAll->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':rank'=> $rank, ':avatar' => $avatar, ':active' => $active));
			return $this->insertAll->rowCount();
		}

		public function connexion($username, $password){
			$this->connexion->execute(array(':username' => $username, ':password' => $password));
			return $this->connexion->fetch();
		}

		public function updatepass($password){
			$this->updatepass->execute(array(':password' => $password));
			return $this->updatepass->rowCount();
		}

		public function updateUserIp($last_ip){
			$this->updateUserIp->execute(array(':last_ip' => $last_ip));
			return $this->updateUserIp->rowCount();
		}

		public function delcompte($username, $password, $email, $rank, $avatar, $active){
			$this->delcompte->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':rank'=> $rank, ':avatar' => $avatar, ':active' => $active));
			return $this->delcompte->rowCount();
		}
		
		public function showAll($username,$email,$rank,$avatar,$active,$date_inscription){
			$this->showAll->execute(array(':username' => $username,':email' => $email, ':rank'=> $rank, ':avatar' => $avatar,':active' => $active,':date_inscription' => $date_inscription));
			return $this->showAll->fetch(PDO::FETCH_ASSOC);
		}

		public function showUserId(){
			return $this->id;
		}
        
        public function showUserAvatar(){
            $avatar = [];
            $req = $this->db->query('SELECT id, avatar FROM cy_users ORDER BY id DESC LIMIT 8');
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $avatar = new User($data);
            }
            return $avatar;
        }
        
	}

 ?>