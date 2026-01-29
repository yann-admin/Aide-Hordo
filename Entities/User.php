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
			protected $idUser_;
			protected $userName_;
			protected $userFirstName_;
			protected $userEmail_;
			protected $userRecoveryCode_;
			protected $userAccess_;
			protected $remenberMe_;
			protected $cookies_;
			protected $lastConnection_;
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  copy and paste in the code  ▅ ▂ */
			# $objUserModel = new UserModel();
			# $objUser = new User();
			# -  $objUser -> setIdUser($_POST['IdUser']);
			# -  $objUser -> setUserName($_POST['UserName']);
			# -  $objUser -> setUserFirstName($_POST['UserFirstName']);
			# -  $objUser -> setUserEmail($_POST['UserEmail']);
			# -  $objUser -> setUserRecoveryCode($_POST['UserRecoveryCode']);
			# -  $objUser -> setUserAccess($_POST['UserAccess']);
			# -  $objUser -> setRemenberMe($_POST['RemenberMe']);
			# -  $objUser -> setCookies($_POST['Cookies']);
			# -  $objUser -> setLastConnection($_POST['LastConnection']);

			# -  $objUser -> getIdUser();
			# -  $objUser -> getUserName();
			# -  $objUser -> getUserFirstName();
			# -  $objUser -> getUserEmail();
			# -  $objUser -> getUserRecoveryCode();
			# -  $objUser -> getUserAccess();
			# -  $objUser -> getRemenberMe();
			# -  $objUser -> getCookies();
			# -  $objUser -> getLastConnection();

		/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  construct  ▅ ▂ */
			/* @ $objUser( $idUser='', $userName='', $userFirstName='', $userEmail='', $userRecoveryCode='', $userAccess='', $remenberMe='', $cookies='', $lastConnection='',  ) */
			public function __construct( $idUser='', $userName='', $userFirstName='', $userEmail='', $userRecoveryCode='', $userAccess='', $remenberMe='', $cookies='', $lastConnection='',  ){
				$this -> idUser_ = $idUser;
				$this -> userName_ = $userName;
				$this -> userFirstName_ = $userFirstName;
				$this -> userEmail_ = $userEmail;
				$this -> userRecoveryCode_ = $userRecoveryCode;
				$this -> userAccess_ = $userAccess;
				$this -> remenberMe_ = $remenberMe;
				$this -> cookies_ = $cookies;
				$this -> lastConnection_ = $lastConnection;

			}
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  hydrate()  ▅ ▂ */
			/* @ hydrate($donnees) */
			public function hydrate($donnees){
				foreach ($donnees as $attribut => $valeur){
					$methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
					if (is_callable(array($this, $methode))){
						$this->$methode($valeur);
					};
				}
			}
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Setters  ▅ ▂ */
			/* Traitement faille XSS htmlspecialchars() 'Cette fonction retourne une chaîne avec ces Conversions réalisées.' */
			/* ENT_QUOTES => Convertira les deux citations doubles et simples. */
			public function setIdUser($modifIdUser){ $this -> idUser_ = htmlspecialchars(trim($modifIdUser), ENT_QUOTES); return $this; }
			public function setUserName($modifUserName){ $this -> userName_ = htmlspecialchars(trim($modifUserName), ENT_QUOTES); return $this; }
			public function setUserFirstName($modifUserFirstName){ $this -> userFirstName_ = htmlspecialchars(trim($modifUserFirstName), ENT_QUOTES); return $this; }
			public function setUserEmail($modifUserEmail){ $this -> userEmail_ = htmlspecialchars(trim($modifUserEmail), ENT_QUOTES); return $this; }
			public function setUserRecoveryCode($modifUserRecoveryCode){ $this -> userRecoveryCode_ = htmlspecialchars(trim($modifUserRecoveryCode), ENT_QUOTES); return $this; }
			public function setUserAccess($modifUserAccess){ $this -> userAccess_ = htmlspecialchars(trim($modifUserAccess), ENT_QUOTES); return $this; }
			public function setRemenberMe($modifRemenberMe){ $this -> remenberMe_ = htmlspecialchars(trim($modifRemenberMe), ENT_QUOTES); return $this; }
			public function setCookies($modifCookies){ $this -> cookies_ = htmlspecialchars(trim($modifCookies), ENT_QUOTES); return $this; }
			public function setLastConnection($modifLastConnection){ $this -> lastConnection_ = htmlspecialchars(trim($modifLastConnection), ENT_QUOTES); return $this; }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Getters  ▅ ▂ */
			/* Traitement lecture htmlspecialchars_decode() 'Convertir des entités HTML spéciales en caractères'  */
			/* ENT_COMPAT => Je vais convertir les guillemets doubles et laisser les guillemets simples intacts. */
			public function getIdUser(){ return htmlspecialchars_decode($this -> idUser_, ENT_COMPAT); }
			public function getUserName(){ return htmlspecialchars_decode($this -> userName_, ENT_COMPAT); }
			public function getUserFirstName(){ return htmlspecialchars_decode($this -> userFirstName_, ENT_COMPAT); }
			public function getUserEmail(){ return htmlspecialchars_decode($this -> userEmail_, ENT_COMPAT); }
			public function getUserRecoveryCode(){ return htmlspecialchars_decode($this -> userRecoveryCode_, ENT_COMPAT); }
			public function getUserAccess(){ return htmlspecialchars_decode($this -> userAccess_, ENT_COMPAT); }
			public function getRemenberMe(){ return htmlspecialchars_decode($this -> remenberMe_, ENT_COMPAT); }
			public function getCookies(){ return htmlspecialchars_decode($this -> cookies_, ENT_COMPAT); }
			public function getLastConnection(){ return htmlspecialchars_decode($this -> lastConnection_, ENT_COMPAT); }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>	<?php
