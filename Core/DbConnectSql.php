<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*Nous définissons une classe que nous utilisons principalement pour la connexion à la base de données. 
        Pour cela, nous utilisons la classe "PDO", comme expliqué dans le module "PHP2 avancé". Dans la classe "DbConnect", nous déclarons deux propriétés : 
        l'une pour stocker la connexion PDO en tant qu'objet PDO, et l'autre pour stocker la requête à exécuter. 
        Nous utilisons le constructeur de la classe pour établir la connexion, ce qui permet de la récupérer lors de l'instanciation de la classe.
        Nous faisons appel à deux classes natives du langage PHP : "PDO" et "Exception". Pour y accéder, nous utilisons la directive "use"
        */

    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        namespace App\Core;
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        use PDO;
        use Exception;
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █    Class    █ ▆ ▅ ▂ */
        class DbConnectSql{
            /* ▂ ▅ Attributs ▅ ▂ */
                protected $connexion;
                protected $request;
            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

            /* ▂ ▅ Constant ▅ ▂ */
            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                /* ▂ ▅ construct  ▅ ▂ */
                    public function __construct(){
                        try{
                            $this -> connexion = new PDO("mysql:host=". $_ENV['SERVER_SQL'] . ":" . $_ENV['PORT_SQL'] .";dbname=" . $_ENV['BASE_SQL'], $_ENV['USER_SQL'], $_ENV['PASSWORD_SQL']);
                            #Activation des erreurs PDO:
                            $this -> connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            #Les retours de requete seront en tableau objet par défaut:
                            $this -> connexion -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                            #Encodage des caractères spéciaux "utf-8":
                            $this -> connexion -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
                        }catch (Exception $e){
                            die('Erreur :' . $e->getMessage());
                        }
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Setters  ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                    public function getConnection(){ return $this -> connexion;}
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */      
        }
        /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>
