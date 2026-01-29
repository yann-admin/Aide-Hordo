<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        // ?XDEBUG_SESSION_START=1
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
                        // # Reco via https://www.php.net/manual/en/session.security.ini.php:
                        // # Il est recommandé de changer le nom $_SESSION['PHPSESSID'] pour une application réelle
                        // ini_set('session.name', 'myApi455');
                        // # spécifie si le module doit utiliser le mode d'identifiant de session strict.
                        // ini_set('session.use_strict_mode', 1);
                        // # Spécifie si le module doit utiliser seulement les cookies pour stocker les identifiants de sessions du côté du navigateur. En l'activant, vous éviterez les attaques qui utilisent des identifiants de sessions dans les URL. Par défaut, vaut 1 (activé).
                        // ini_set('session.use_only_cookies', 1);
                        // # Permet qu'un cookie ne soit pas envoyé par le serveur avec des requêtes entre sites (cross-site). Cette assertion permet aux agents utilisateur de mitiger les riques de fuite d'informations d'origine du site (cross-origin), et fournit de la protection contre les attaques des fausses requêtes entre sites (cross-site request forgery). Notez que ceci n'est pas supporté par tous les navigateurs. Une valeur vide signifie qu'aucun attribut SameSite ne sera défini. Lax et Strict signifie que le cookie ne sera pas envoyé pour des requêtes POST entre domaines ; Lax enverra le cookie pour des requêtes GET entre domaines, tandis que Strict n'en enverra pas
                        // ini_set('session.cookie_samesite', 'strict');
                        // # 0 possède une signification particulière. Il informe les navigateurs de ne pas stocker le cookie en stockage permanent.
                        // ini_set('session.cookie_lifetime', 0);
                        // # Spécifie le chemin utilisé lors de la création du cookie. Par défaut, il vaut /.        
                        // ini_set('session.cookie_path', 'App/');
                        // # Spécifie que les cookies ne doivent être émis que sur des connexions sécurisées. Avec cette option définie sur on, les sessions ne fonctionnent qu'avec des connexions HTTPS. Si elle est définie sur off, alors les sessions fonctionnent avec les connexions HTTP et HTTPS. Par défaut, elle est définie sur off.
                        // ini_set('session.cookie_secure', 1);
                        // # Marque le cookie pour qu'il ne soit accessible que via le protocole HTTP. Cela signifie que le cookie ne sera pas accessible par les langage de script, comme Javascript. Cette configuration permet de limiter les attaques comme les attaques XSS (bien qu'elle n'est pas supporté par tous les navigateurs).
                        // ini_set('session.cookie_httponly', 1);
                        // session_start();


    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        use App\Entities\Session;
        use App\Autoloader;
        use App\Core\Router;  
        use Dotenv\Dotenv;
        // 
        require '../vendor/autoload.php';
        include '../Autoloader.php';  
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */

    /* ▂ ▅ ▆ █  Call  █ ▆ ▅ ▂ */
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        Autoloader::register();
        $objSession = new Session();
        $objSession -> sessionStart();     

        # On instancie le routeur :
        $route = new Router();
        # On lance l'application :
        $route->routes();
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
?>                        
                        
