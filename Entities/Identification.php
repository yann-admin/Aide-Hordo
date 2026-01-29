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
			protected $IdIdentification;
			protected $Identifiant;
			protected $Password;
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  copy and paste in the code  ▅ ▂ */
			# $objIdentificationModel = new IdentificationModel();
			# $objIdentification = new Identification();
			/*  */
				# -  $identification -> setIdIdentification($_POST['IdIdentification']);
				# -  $identificationGet = $identification -> getIdIdentification();
			/*  */
				# -  $identification -> setIdentifiant($_POST['Identifiant']);
				# -  $identificationGet = $identification -> getIdentifiant();
			/*  */
				# -  $identification -> setPassword($_POST['Password']);
				# -  $identificationGet = $identification -> getPassword();
		/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Setters  ▅ ▂ */
			/* Traitement faille XSS htmlspecialchars() 'Cette fonction retourne une chaîne avec ces Conversions réalisées.' */
			/* ENT_QUOTES => Convertira les deux citations doubles et simples. */
			/*  */
			public function setIdIdentification($modifIdIdentification){ $this -> IdIdentification = htmlspecialchars(trim($modifIdIdentification),ENT_QUOTES); return $this; }
			/*  */
			public function setIdentifiant($modifIdentifiant){ $this -> Identifiant = htmlspecialchars(trim($modifIdentifiant),ENT_QUOTES); return $this; }
			/*  */
			public function setPassword($modifPassword){ $this -> Password = htmlspecialchars(trim($modifPassword),ENT_QUOTES); return $this; }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

		/* ▂ ▅  Getters  ▅ ▂ */
			/* Traitement lecture htmlspecialchars_decode() 'Convertir des entités HTML spéciales en caractères'  */
			/* ENT_COMPAT => Je vais convertir les guillemets doubles et laisser les guillemets simples intacts. */
			/*  */
			function getIdIdentification(){ return htmlspecialchars_decode($this -> IdIdentification,ENT_COMPAT); }
			/*  */
			function getIdentifiant(){ return htmlspecialchars_decode($this -> Identifiant,ENT_COMPAT); }
			/*  */
			function getPassword(){ return htmlspecialchars_decode($this -> Password,ENT_COMPAT); }
		/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>