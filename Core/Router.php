<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        # Le routeur va récupérer l'URL demandée par l'utilisateur. Nous allons donc définir une structure type des URLs.
        // ?XDEBUG_SESSION_START=1
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
    namespace App\Core;
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        use PDO;
        use Exception;
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class Router {
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                /* ▂ ▅ ▆ █ render(string $patch, array $data = []) █ ▆ ▅ ▂ */
                    public function routes(){
                        /*Nous stockons la valeur du paramètre "controller" récupéré par la superglobale "$_GET" dans la variable "$controller". ucfirst(array_shift($_GET)):'Home'*/
                        $controller = (isset($_GET['controller']) ? ucfirst(array_shift($_GET)):'Home');
                        $controller = '\\App\\Controllers\\'. $controller . 'Controller';
                        /* Nous faisons ensuite la même chose avec le paramètre "action". Sauf que dans ce cas, l'objectif étant d'exécuter la méthode du contrôleur concerné, 
                        nous ne récupérons que le nom de cette méthode. Par défaut, pour accéder à la page d'accueil, la méthode exécutée se nomme "index". */
                        $action = (isset($_GET['action']) ? array_shift($_GET):'index');
                        
                        //On instancie le contrôleur:
                        $controller = new $controller();
                        if(method_exists($controller,$action)){
                            //Execute la méthode:
                            (isset($_GET)) ? call_user_func_array([$controller,$action], $_GET) : $controller->action();
                        }else{
                            // On envoie Error 404:
                            http_response_code(404);
                            echo "La page recherchée n'existe pas";
                        };
                    }
                /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
        };  
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>