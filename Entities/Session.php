<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */

    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
        namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
    
	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
        use App\Controllers\Controller;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class Session extends Controller{
            /* ▂ ▅ Attributs ▅ ▂ */
            /* ▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
// La faille CSRF
                /* ▂ ▅  start  ▅ ▂ */
                    public function sessionStart() {
                        # Reco via https://www.php.net/manual/en/session.security.ini.php:
                        # Il est recommandé de changer le nom $_SESSION['PHPSESSID'] pour une application réelle
                        ini_set('session.name', 'myApi455');
                        # spécifie si le module doit utiliser le mode d'identifiant de session strict.
                        ini_set('session.use_strict_mode', 1);
                        # Spécifie si le module doit utiliser seulement les cookies pour stocker les identifiants de sessions du côté du navigateur. En l'activant, vous éviterez les attaques qui utilisent des identifiants de sessions dans les URL. Par défaut, vaut 1 (activé).
                        ini_set('session.use_only_cookies', 1);
                        # Permet qu'un cookie ne soit pas envoyé par le serveur avec des requêtes entre sites (cross-site). Cette assertion permet aux agents utilisateur de mitiger les riques de fuite d'informations d'origine du site (cross-origin), et fournit de la protection contre les attaques des fausses requêtes entre sites (cross-site request forgery). Notez que ceci n'est pas supporté par tous les navigateurs. Une valeur vide signifie qu'aucun attribut SameSite ne sera défini. Lax et Strict signifie que le cookie ne sera pas envoyé pour des requêtes POST entre domaines ; Lax enverra le cookie pour des requêtes GET entre domaines, tandis que Strict n'en enverra pas
                        ini_set('session.cookie_samesite', 'strict');
                        # 0 possède une signification particulière. Il informe les navigateurs de ne pas stocker le cookie en stockage permanent.
                        ini_set('session.cookie_lifetime', 0);
                        # Spécifie le chemin utilisé lors de la création du cookie. Par défaut, il vaut /.        
                        ini_set('session.cookie_path', 'App/');
                        # Spécifie que les cookies ne doivent être émis que sur des connexions sécurisées. Avec cette option définie sur on, les sessions ne fonctionnent qu'avec des connexions HTTPS. Si elle est définie sur off, alors les sessions fonctionnent avec les connexions HTTP et HTTPS. Par défaut, elle est définie sur off.
                        ini_set('session.cookie_secure', 1);
                        # Marque le cookie pour qu'il ne soit accessible que via le protocole HTTP. Cela signifie que le cookie ne sera pas accessible par les langage de script, comme Javascript. Cette configuration permet de limiter les attaques comme les attaques XSS (bien qu'elle n'est pas supporté par tous les navigateurs).
                        ini_set('session.cookie_httponly', 1);
                        session_start();
                        $mode = 0;
                        $sessionId = session_id();
                        $timeAutoRegenerateId = 900;
                        $timeAutoDisconnect = 600;                    
                        # La régénération des identifiants de session réduit le risque de vol d’identifiants de session, c’est pourquoi session_regenerate_id() doit être appelé périodiquement. Par exemple, régénérer l’ID de session toutes les 15 minutes pour le contenu sensible à la sécurité. Même dans le cas où un identifiant de session est volé, les deux La session de l’utilisateur et de l’attaquant expirera. En d’autres termes, l’accès par l’utilisateur ou l’attaquant sera générer une erreur d’accès à la session obsolète.
                        
                        # Create variable session trigger time auto regeneration id
                        if (!isset($_SESSION['autoRegenerateIdSession'])) {
                            // Définir l'horodatage de déstruction
                            $_SESSION['autoRegenerateIdSession'] = time();
                            if ($mode) { echo "Mise à jour autoRegenerateIdSession <br/>";};
                            
                        };
                        
                        # Create session variable, trigger time, auto-disconnect
                        if (!isset($_SESSION['autoDisconnectSession'])) {
                            $_SESSION['autoDisconnectSession'] = time();
                            if ($mode) { echo "Mise à jour autoDisconnectSession <br/>";};
                        };

                        # Auto Disconnect duration in one because it's the priority test
                        if (isset($_SESSION['autoDisconnectSession']) && ($_SESSION['autoDisconnectSession'] < time()-$timeAutoDisconnect)) { 
                            $this -> sessionDestroy();
                            $sessionId = session_id(); 
                            $_SESSION['connected'] = false;
                            header('location:home');
                            if ($mode) {  echo "Session destruite sessionid:$sessionId <br/>";};
                        };

                        # Auto regeneration duration test
                        if (isset($_SESSION['autoRegenerateIdSession']) && ($_SESSION['autoRegenerateIdSession'] < time()-$timeAutoRegenerateId)) { 
                            $old_sessionId = session_id();
                            session_regenerate_id();
                            $sessionId = session_id();
                           if ($mode) { echo "Mise à jour sessionId old:$old_sessionId / new:$sessionId  <br/>";};
                        };

                        # Test and redirect if the variable $_SESSION['connected'] is false
                        if(!isset($_SESSION['connected']) ){
                            $_SESSION['connected'] = false;
                        }

                        if ($mode) { 
                            echo "sessionStart(): $sessionId <br/>";
                            var_dump($_SESSION);
                        };
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                /* ▂ ▅  sessionDestroy  ▅ ▂ */
                    public function sessionDestroy(){
                        # Reco via https://www.php.net/manual/en/session.security.ini.php:
                        $this -> varSessionDestroy();
                        session_destroy(); 
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                /* ▂ ▅ varSessionDestroy  ▅ ▂ */
                public function varSessionDestroy(){
                    # Reco via https://www.php.net/manual/en/session.security.ini.php:
                    unset($_SESSION['autoDisconnectSession']);
                    unset($_SESSION['autoRegenerateIdSession']);
                    unset($_SESSION['connected']);
                    unset($_SESSION['token']);
                    unset($_SESSION['token_time']);    
                    unset($_SESSION['idUser']);
                    unset($_SESSION['userName']);
                    unset($_SESSION['userFirstName']);
                    unset($_SESSION['userAccess']);
                    unset($_SESSION['connected']);
                }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                /* ▂ ▅ Setters  ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
    };  
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>