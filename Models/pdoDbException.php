<?php
	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
    namespace App\Models;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class pdoDbException  {
            /* ▂ ▅ Attributs ▅ ▂ */
                public $code;
                public $errorText;            
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                /* ▂ ▅  construct  ▅ ▂ */
                    public function __construct($e) {
                        $this->code = $e->getCode();
                        switch ($e->getCode()){
                            case 23000:
                                $this->errorText = "Opération annulée, cette donnée est utilisée ".":".$e->getCode();  
                                break; 
                            case 42000:
                                $this->errorText = "Erreur de syntaxe ou violation d'accès : 1064 ".":".$e->getCode();   
                                break;
                        };
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Setters  ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                public function getcodeE(){ return $this -> code;}
                public function geterrorText(){ return $this -> errorText;}                
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

        }
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
?>