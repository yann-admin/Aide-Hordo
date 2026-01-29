<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* Fichier controller database: api_chichoune - table: identification via constructor_Array_DataBase_SQL.php VERSION: 3.0.0*/ 
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Models;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use PDO;
		use Exception;
		use App\Core\DbConnectSql;
		use App\Entities\Identification;
		# Class other
		use App\Models\PdoDbException;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
	class IdentificationModel extends DbConnectSql{
		/* ▂ ▅ Methodes ▅ ▂ */
			/* ▂ ▅  executeTryCatch()  ▅ ▂ */
				public function executeTryCatch() { 
					try {
						$this -> request -> execute();
						$pdoDbException = '';
					}catch ( Exception $e ){
						$pdoDbException =  new PdoDbException( $e );
					}
					/* Ferme le curseur, permettant à la requete d'être de nouveau executée */
					$this -> request -> closeCursor();
					return  $pdoDbException;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  findAll()  ▅ ▂ */
				public function findAll() { 
					$this -> request = $this -> connexion -> prepare( "SELECT identification.* FROM identification" );
					$this -> request -> execute();
					$results = $this -> request -> fetchAll(PDO::FETCH_OBJ);
					return $results;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  findId( int $id )  ▅ ▂ */
				public function findId( int $id ) { 
					$this -> request = $this -> connexion -> prepare( "SELECT identification.* FROM identification WHERE identification.idIdentification=:idIdentification" );
					$this -> request -> bindParam(":idIdentification", $id , PDO::PARAM_STR);
					$this -> request -> execute();
					$results = $this -> request -> fetch();
					return $results;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  findIdentifiant()  ▅ ▂ */
				public function findIdentifiant( string $identifiant ) { 
					$this -> request = $this -> connexion -> prepare( "SELECT identification.* FROM identification WHERE identification.identifiant=:identifiant" );
					$this -> request -> bindParam(":identifiant", $identifiant , PDO::PARAM_STR);
					$this -> request -> execute();
					$results = $this -> request -> fetch(PDO::FETCH_OBJ);
					return $results;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */



			/* ▂ ▅  create( Identification $Identification )  ▅ ▂ */
				public function create( Identification $Identification ) { 
					$this -> request = $this -> connexion -> prepare( "INSERT INTO identification
					SET identification.identifiant=:identifiant, identification.password=:password");
					$this -> request -> bindValue(":identifiant", $Identification -> getIdentifiant(), PDO::PARAM_STR);
					$this -> request -> bindValue(":password", $Identification -> getPassword(), PDO::PARAM_STR);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  update( int $id, Identification $Identification )  ▅ ▂ */
				public function update( int $id, Identification $Identification ) { 
					$this -> request = $this -> connexion -> prepare( "UPDATE identification
					SET identification.identifiant=:identifiant, identification.password=:password
					WHERE identification.idIdentification = :idIdentification");
					$this -> request -> bindValue(":identifiant", $Identification -> getIdentifiant(), PDO::PARAM_STR);
					$this -> request -> bindValue(":password", $Identification -> getPassword(), PDO::PARAM_STR);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/*▂ ▅  delete( int $id )  ▅ ▂ */
				public function delete( int $id ) {
					$this -> request = $this -> connexion -> prepare("DELETE FROM identification WHERE identification.idIdentification = :idIdentification");
					$this -> request -> bindParam(":idIdentification", $id , PDO::PARAM_INT);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>