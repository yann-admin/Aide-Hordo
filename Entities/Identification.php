<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* Fichier entities database: api_chichoune - table: identification via constructor_Array_DataBase_SQL.php VERSION: 3.0.0*/ 
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use PDO;
		use Exception;
		use App\Core\DbConnect;
		use App\Entities\Identification;
		# Class other
		use App\Models\PdoDbException;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
	class Identification{
		/* ▂ ▅ Attributs ▅ ▂ */
			protected $idIdentification_;
			protected $identifiant_;
			protected $password_;
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  copy and paste in the code  ▅ ▂ */
			# $objIdentificationModel = new IdentificationModel();
			# $objIdentification = new Identification();
			# -  $objIdentification -> setIdIdentification($_POST['IdIdentification']);
			# -  $objIdentification -> setIdentifiant($_POST['Identifiant']);
			# -  $objIdentification -> setPassword($_POST['Password']);

			# -  $objIdentification -> getIdIdentification();
			# -  $objIdentification -> getIdentifiant();
			# -  $objIdentification -> getPassword();

		/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  construct  ▅ ▂ */
			/* @ $objIdentification( $idIdentification='', $identifiant='', $password='',  ) */
			public function __construct( $idIdentification='', $identifiant='', $password='',  ){
				$this -> idIdentification_ = $idIdentification;
				$this -> identifiant_ = $identifiant;
				$this -> password_ = $password;

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
			public function setIdIdentification($modifIdIdentification){ $this -> idIdentification_ = htmlspecialchars(trim($modifIdIdentification), ENT_QUOTES); return $this; }
			public function setIdentifiant($modifIdentifiant){ $this -> identifiant_ = htmlspecialchars(trim($modifIdentifiant), ENT_QUOTES); return $this; }
			public function setPassword($modifPassword){ $this -> password_ = htmlspecialchars(trim($modifPassword), ENT_QUOTES); return $this; }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Getters  ▅ ▂ */
			/* Traitement lecture htmlspecialchars_decode() 'Convertir des entités HTML spéciales en caractères'  */
			/* ENT_COMPAT => Je vais convertir les guillemets doubles et laisser les guillemets simples intacts. */
			public function getIdIdentification(){ return htmlspecialchars_decode($this -> idIdentification_, ENT_COMPAT); }
			public function getIdentifiant(){ return htmlspecialchars_decode($this -> identifiant_, ENT_COMPAT); }
			public function getPassword(){ return htmlspecialchars_decode($this -> password_, ENT_COMPAT); }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>