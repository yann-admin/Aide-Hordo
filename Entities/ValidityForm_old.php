<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*Un contrôleur nommé HomeController est créé. Comme il s'agit d'une déclaration de classe, il est important de spécifier le "namespace". 
        Ce contrôleur hérite du contrôleur parent défini précédemment, pour bénéficier de ses paramètres.
        Une méthode publique appelée "index()" est déclarée pour l'instant, elle affiche simplement une chaîne de caractères.
        Le routeur cible ce contrôleur et sa méthode "index()" pour répondre à l'action de l'utilisateur via l'URL. 
        */
    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
        namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
    
	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
        use App\Entities\UserInformation;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class ValidityForm{
            /* ▂ ▅ Attributs ▅ ▂ */
            # 
            private $formError_;
            private $formErrorMsg_;
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */

                /* ▂ ▅  construct  ▅ ▂ */
                    # @ User($idUser, $userName, $userFirstName, $userEmail,  $idIdentification, $identifiant, $userAccess )
                    # User(null, null, null, null,  null, null, null )
                    // public function __construct() {

                    // }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


                /* ▂ ▅ ControlMethod(string $method)  ▅ ▂ */
                    Public function ControlMethod(string $method=''){
                        $this -> formError_ = true;
                        if($_SERVER["REQUEST_METHOD"] == $method){
                            $this -> formError_ = false;
                        }else{
                           $this -> formError_ = true; 
                           $this -> formErrorMsg_ = "Opération annulée! <br> La Methode n\'est pas correcte" ;
                        };
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


                /* ▂ ▅ ControlAntiBot(string $fieldAntiBot)  ▅ ▂ */
                    Public function ControlAntiBot(string $fieldAntiBot=''){
                        $this -> formError_ = true;
                        if(empty($fieldAntiBot) || !isset($fieldAntiBot)){
                            $this -> formError_ = false;
                        }else{
                           $this -> formError_ = true; 
                           $this -> formErrorMsg_ = "Opération annulée! <br> Soumission du formulaire par un robot" ;
                        };
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


                /* ▂ ▅ ValidatePost(array $post, array $fields)  ▅ ▂ */
                    # Methodes de test des champs du formulaire si le champ existe ou si il est vide 
                    Public function ValidatePost(array $post, array $fields, array $regexs){
                        $this -> formError_ = true;
                        for( $i=0 ; $i<count($fields); $i++){
                            $fieldValue = $post[$fields[$i]];
                            $field = $fields[$i];
                            $regex = $regexs[$i];
                            # We check if the values ​​of $POST exist and are not empty
                            if( !isset($post[$field]) && empty($post[$field])){
                                $this -> formError_ = true; 
                                $this -> formErrorMsg_ = "Opération annulée! <br> Le champ ` $field ne doit pas être vide" ;
                                break;
                            }else{
                                $errorRegex = $this -> ValidateRegex($fieldValue, $regex);
                                if($errorRegex){
                                $this -> formError_ = true; 
                                $this -> formErrorMsg_ = "Opération annulée! <br> Le champ ` $field contient une erreur" ;
                                break;
                                };
                            };
                        };
                        $this -> formError_ = false;
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


                /* ▂ ▅ ValidatePost(array $post, array $fields)  ▅ ▂ */
                    # Methodes de test des champs du formulaire si le champ existe ou si il est vide 
                    Public function ValidateRegex($post, $regex){
                        switch ($regex){
                            case 'text-1':
                                $reg =  '/^[A-Za-z0-9]+$/i';
                                break;
                            case 'password':
                                $reg =  '/^[A-Za-z\d\/@$!%*?&#]+$/i';
                                break;
                        };
                        if(!preg_match($reg,$post)==0){
                            return false;
                        }else{ return true; };                         
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */



                /* ▂ ▅ Setters  ▅ ▂ */

                    // public function setPassword($modifPassword){ $this -> password = htmlspecialchars(trim($modifPassword),ENT_QUOTES); return $this; }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                    public function getFormError(){ return ($this -> formError_); }
                    public function getFormErrorMsg(){ return ($this -> formErrorMsg_); }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>