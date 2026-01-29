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

	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class SecurityForm{
            /* ▂ ▅ Attributs ▅ ▂ */
            # 
            // private $formError_;
            // private $formErrorMsg_;
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */


            /* ▂ ▅ encode_XssTrim( array $posts):array ▅ ▂ */
            public static function encode_XssTrim( array $posts ):array{
                $postEncode=[];
                // Loop for array $posts
                foreach ($posts as $name => $post){
                    $postEncode[$name] = htmlspecialchars(trim($post));
                };
                return $postEncode;
            }
            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

            /* ▂ ▅ decode_XssTrim( array $posts):array ▅ ▂ */
            public static function decode_XssTrim( array $posts ):array{
                $postDecode=[];
                // Loop for array $posts
                foreach ($posts as $name => $post){
                    $postDecode[$name] = htmlspecialchars_decode($post);
                };
                return $postDecode;
            }
            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


            /* ▂ ▅ SecurityForm( ) ▅ ▂ */
            # lexicon SecurityForm( )
                # @ SecurityForm( array $setting ) $setting = ['method'=>'POST', 'token'=>$postEncode['token'], 'antirobot'=>$postEncode['antirobot'], 'fieldRequired'=> $manuelPost  ]);
                # grafcet SecurityForm( $setting )
                # │  ╚ Step 2.0 control method
                # │     ╬═ (true=>next)
                # │     ╬═ (false=>return array)         
                # │     ╚ Step 2.1 control antibot
                # │         ╬═ (true=>next)
                # │         ╬═ (false=>return array) 
                # │         ╚ Step 2.2 control token  
                # │             ╬═ (true=>next)
                # │             ╬═ (false=>return array) 
                # │             ╚ Step 2.3 control token_time ( 4min )
                # │                 ╬═ (true=>next)
                # │                 ╬═ (false=>return array)           
                # │                 ╚ Step 2.4 controle value isset && empty && match regex
                # │                     ╬═ (true=>next)
                # │                     ╬═ (false=>return array)  
                # │                               
            # ----------- 
                public static function SecurityForm( array $setting ):array{
                    $response=['error'=>true, 'Msg'=>'error'];
                    # Step 2.0 control method
                    if( $_SERVER["REQUEST_METHOD"] === $setting['method'] ){
                        # Step 2.1 control antibot
                        if( (isset($setting["post"]["antirobot"])) && ($setting["post"]["antirobot"] === '') ){
                            # Step 2.2 control token
                            if( (isset($setting["post"]['token'])) && ($_SESSION['token'] === $setting["post"]['token']) ){
                                # Step 2.3 control token_time ( 4min )
                                $timestamp = time() - (4*60);
                                if( $_SESSION['token_time'] >= $timestamp ){
                                    # Step 2.4 control value $post
                                    // Loop for array $setting['fieldRequired']
                                    $fieldEmpty = true;
                                    $fieldRegex = true;
                                    foreach ($setting['fieldRequired'] as $field => $regex){
                                        $fieldValue = $setting["post"][$field];
                                        if( $fieldValue == '' ){ 
                                            $fieldEmpty=false; break; 
                                        }else{
                                            if( !preg_match($regex, $fieldValue) ){                                               
                                                $fieldRegex=false;
                                                break;
                                            };
                                        };
                                    };
                                    if($fieldEmpty){
                                        if($fieldRegex){
                                            $response=['error'=>false, 'Msg'=>''];
                                            return $response;
                                        }else{
                                        $response=['error'=>true, 'Msg'=>"Opération annulée! <br> Veuillez respecter le format demander pour le champ ` $field ."];
                                        return $response;
                                        };
                                    # Else 2.4
                                    }else{
                                        $response=['error'=>true, 'Msg'=>"Opération annulée! <br> Le champ de saisie ` $field  ` est obligatoire."];
                                        return $response;
                                    };                                  
                                    # End 2.4
                                    /* ---------------------------------------------------- */
                                    # Else 2.3
                                }else{
                                    $response=['error'=>true, 'Msg'=>'Opération annulée! <br> Le jeton de contrôle est périmé. Veuillez actualiser la page s\'il vous plaît. <a href="home" ><i class="fa-solid fa-arrow-rotate-left"></i> </a>'];
                                    return $response;
                                };
                                # End 2.3
                                /* ---------------------------------------------------- */
                            # Else 2.2
                            }else{
                            $response=['error'=>true, 'Msg'=>'Opération annulée! <br> Les jetons de contrôle ne concorde pas.  Veuillez actualiser la page s\'il vous plaît. <a href="home"> <i class="fa-solid fa-arrow-rotate-left"></i> </a>'];
                            return $response;
                            };
                            # End 2.2
                            /* ---------------------------------------------------- */
                        # Else 2.1
                        }else{
                        $response=['error'=>true, 'Msg'=>'Opération annulée! <br> Nous identifions l\'envoi du formulaire par un robot. <a href="home"> <i class="fa-solid fa-arrow-rotate-left"></i> </a>'];
                        return $response;
                        };
                        # End 2.1
                        /* ---------------------------------------------------- */
                    # Else 2.0
                    }else{
                        $response=['error'=>true, 'Msg'=>'Opération annulée! <br> La méthode reçue n\'est pas conforme. Veuillez actualiser la page s\'il vous plaît.<a href="home" ><i class="fa-solid fa-arrow-rotate-left"></i> </a>'];
                        return $response;
                    };
                    # End 2.0
                    /* ---------------------------------------------------- */
                }
            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */







            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>