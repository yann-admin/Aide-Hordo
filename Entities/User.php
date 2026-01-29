<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* Fichier entities database: api_chichoune - table: user via constructor_Array_DataBase_SQL.php VERSION: 3.0.0*/ 
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use PDO;
		use Exception;
		use App\Core\DbConnect;
		use App\Entities\User;
		# Class other
		use App\Models\PdoDbException;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
	class User{
		/* ▂ ▅ Attributs ▅ ▂ */
			protected $IdUser;
			protected $UserName;
			protected $UserFirstName;
			protected $UserEmail;
			protected $UserRecoveryCode;
			protected $UserAccess;
			protected $RemenberMe;
			protected $Cookies;
			protected $LastConnection;
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  copy and paste in the code  ▅ ▂ */
			# $objUserModel = new UserModel();
			# $objUser = new User();
			/*  */
				# -  $user -> setIdUser($_POST['IdUser']);
				# -  $userGet = $user -> getIdUser();
			/*  */
				# -  $user -> setUserName($_POST['UserName']);
				# -  $userGet = $user -> getUserName();
			/*  */
				# -  $user -> setUserFirstName($_POST['UserFirstName']);
				# -  $userGet = $user -> getUserFirstName();
			/*  */
				# -  $user -> setUserEmail($_POST['UserEmail']);
				# -  $userGet = $user -> getUserEmail();
			/*  */
				# -  $user -> setUserRecoveryCode($_POST['UserRecoveryCode']);
				# -  $userGet = $user -> getUserRecoveryCode();
			/*  */
				# -  $user -> setUserAccess($_POST['UserAccess']);
				# -  $userGet = $user -> getUserAccess();
			/*  */
				# -  $user -> setRemenberMe($_POST['RemenberMe']);
				# -  $userGet = $user -> getRemenberMe();
			/*  */
				# -  $user -> setCookies($_POST['Cookies']);
				# -  $userGet = $user -> getCookies();
			/*  */
				# -  $user -> setLastConnection($_POST['LastConnection']);
				# -  $userGet = $user -> getLastConnection();
		/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */


			    /*▂ ▅ ▆ █ construct █ ▆ ▅ ▂ */
				    # @ objUserModel$IdUser='', $UserName='', $UserFirstName='', $UserEmail='', $UserRecoveryCode='', $UserAccess='', $RemenberMe='', $Cookies='', $LastConnection='')
					public function __construct($IdUser='', $UserName='', $UserFirstName='', $UserEmail='', $UserRecoveryCode='', $UserAccess='', $RemenberMe='', $Cookies='', $LastConnection=''){
						$this -> IdUser = $IdUser;
						$this -> UserName = $UserName;
						$this -> UserFirstName = $UserFirstName;
						$this -> UserEmail = $UserEmail;
						$this -> UserRecoveryCode = $UserRecoveryCode;
						$this -> UserAccess = $UserAccess;
						$this -> RemenberMe = $RemenberMe;
						$this -> Cookies = $Cookies;
						$this -> LastConnection = $LastConnection;
					}
				/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


			/*▂ ▅ ▆ █ hydrate($donnees) █ ▆ ▅ ▂ */
				public function hydrate($donnees){
					foreach ($donnees as $attribut => $valeur){
						$methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));	
						if (is_callable(array($this, $methode))){
							$this->$methode($valeur);
						};
					};
				}
			/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


		/* ▂ ▅  Setters  ▅ ▂ */
			/* Traitement faille XSS htmlspecialchars() 'Cette fonction retourne une chaîne avec ces Conversions réalisées.' */
			/* ENT_QUOTES => Convertira les deux citations doubles et simples. */
			/*  */
			public function setIdUser($modifIdUser){ $this -> IdUser = htmlspecialchars(trim($modifIdUser),ENT_QUOTES); return $this; }
			/*  */
			public function setUserName($modifUserName){ $this -> UserName = htmlspecialchars(trim($modifUserName),ENT_QUOTES); return $this; }
			/*  */
			public function setUserFirstName($modifUserFirstName){ $this -> UserFirstName = htmlspecialchars(trim($modifUserFirstName),ENT_QUOTES); return $this; }
			/*  */
			public function setUserEmail($modifUserEmail){ $this -> UserEmail = htmlspecialchars(trim($modifUserEmail),ENT_QUOTES); return $this; }
			/*  */
			public function setUserRecoveryCode($modifUserRecoveryCode){ $this -> UserRecoveryCode = htmlspecialchars(trim($modifUserRecoveryCode),ENT_QUOTES); return $this; }
			/*  */
			public function setUserAccess($modifUserAccess){ $this -> UserAccess = htmlspecialchars(trim($modifUserAccess),ENT_QUOTES); return $this; }
			/*  */
			public function setRemenberMe($modifRemenberMe){ $this -> RemenberMe = htmlspecialchars(trim($modifRemenberMe),ENT_QUOTES); return $this; }
			/*  */
			public function setCookies($modifCookies){ $this -> Cookies = htmlspecialchars(trim($modifCookies),ENT_QUOTES); return $this; }
			/*  */
			public function setLastConnection($modifLastConnection){ $this -> LastConnection = htmlspecialchars(trim($modifLastConnection),ENT_QUOTES); return $this; }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Getters  ▅ ▂ */
			/* Traitement lecture htmlspecialchars_decode() 'Convertir des entités HTML spéciales en caractères'  */
			/* ENT_COMPAT => Je vais convertir les guillemets doubles et laisser les guillemets simples intacts. */
			/*  */
			function getIdUser(){ return htmlspecialchars_decode($this -> IdUser,ENT_COMPAT); }
			/*  */
			function getUserName(){ return htmlspecialchars_decode($this -> UserName,ENT_COMPAT); }
			/*  */
			function getUserFirstName(){ return htmlspecialchars_decode($this -> UserFirstName,ENT_COMPAT); }
			/*  */
			function getUserEmail(){ return htmlspecialchars_decode($this -> UserEmail,ENT_COMPAT); }
			/*  */
			function getUserRecoveryCode(){ return htmlspecialchars_decode($this -> UserRecoveryCode,ENT_COMPAT); }
			/*  */
			function getUserAccess(){ return htmlspecialchars_decode($this -> UserAccess,ENT_COMPAT); }
			/*  */
			function getRemenberMe(){ return htmlspecialchars_decode($this -> RemenberMe,ENT_COMPAT); }
			/*  */
			function getCookies(){ return htmlspecialchars_decode($this -> Cookies,ENT_COMPAT); }
			/*  */
			function getLastConnection(){ return htmlspecialchars_decode($this -> LastConnection,ENT_COMPAT); }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>