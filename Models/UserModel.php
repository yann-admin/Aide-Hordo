<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* Fichier controller database: api_chichoune - table: user via constructor_Array_DataBase_SQL.php VERSION: 3.0.0*/ 
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Models;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use PDO;
		use Exception;
		use App\Core\DbConnectSql;
		use App\Entities\User;
		# Class other
		use App\Models\PdoDbException;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
	class UserModel extends DbConnectSql{
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
					$this -> request = $this -> connexion -> prepare( "SELECT user.* FROM user" );
					$this -> request -> execute();
					$results = $this -> request -> fetchAll(PDO::FETCH_OBJ);
					return $results;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  findId( int $id )  ▅ ▂ */
				public function findId( int $id ) { 
					$this -> request = $this -> connexion -> prepare( "SELECT user.* FROM user WHERE user.idUser=:idUser" );
					$this -> request -> bindParam(":idUser", $id , PDO::PARAM_STR);
					$this -> request -> execute();
					$results = $this -> request -> fetch(PDO::FETCH_OBJ);
					return $results;
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  create( User $User )  ▅ ▂ */
				public function create( User $User ) { 
					$this -> request = $this -> connexion -> prepare( "INSERT INTO user
					SET user.userName=:userName, user.userFirstName=:userFirstName, user.userEmail=:userEmail, user.userRecoveryCode=:userRecoveryCode, user.userAccess=:userAccess, user.remenberMe=:remenberMe, user.cookies=:cookies, user.lastConnection=:lastConnection");
					$this -> request -> bindValue(":userName", $User -> getUserName(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userFirstName", $User -> getUserFirstName(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userEmail", $User -> getUserEmail(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userRecoveryCode", $User -> getUserRecoveryCode(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userAccess", $User -> getUserAccess(), PDO::PARAM_INT);
					$this -> request -> bindValue(":remenberMe", $User -> getRemenberMe(), PDO::PARAM_STR);
					$this -> request -> bindValue(":cookies", $User -> getCookies(), PDO::PARAM_STR);
					$this -> request -> bindValue(":lastConnection", $User -> getLastConnection(), PDO::PARAM_STR);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/* ▂ ▅  update( int $id, User $User )  ▅ ▂ */
				public function update( int $id, User $User ) { 
					$this -> request = $this -> connexion -> prepare( "UPDATE user
					SET user.userName=:userName, user.userFirstName=:userFirstName, user.userEmail=:userEmail, user.userRecoveryCode=:userRecoveryCode, user.userAccess=:userAccess, user.remenberMe=:remenberMe, user.cookies=:cookies, user.lastConnection=:lastConnection
					WHERE user.idUser = :idUser");
					$this -> request -> bindValue(":userName", $User -> getUserName(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userFirstName", $User -> getUserFirstName(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userEmail", $User -> getUserEmail(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userRecoveryCode", $User -> getUserRecoveryCode(), PDO::PARAM_STR);
					$this -> request -> bindValue(":userAccess", $User -> getUserAccess(), PDO::PARAM_INT);
					$this -> request -> bindValue(":remenberMe", $User -> getRemenberMe(), PDO::PARAM_STR);
					$this -> request -> bindValue(":cookies", $User -> getCookies(), PDO::PARAM_STR);
					$this -> request -> bindValue(":lastConnection", $User -> getLastConnection(), PDO::PARAM_STR);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

			/*▂ ▅  delete( int $id )  ▅ ▂ */
				public function delete( int $id ) {
					$this -> request = $this -> connexion -> prepare("DELETE FROM user WHERE user.idUser = :idUser");
					$this -> request -> bindParam(":idUser", $id , PDO::PARAM_INT);
					$pdoDbException = $this -> executeTryCatch(); 
					return $pdoDbException; 
				}
			/* ▂▂▂▂▂▂▂▂▂▂▂ */

	};
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>