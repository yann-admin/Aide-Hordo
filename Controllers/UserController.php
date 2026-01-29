<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*Un contrôleur nommé HomeController est créé. Comme il s'agit d'une déclaration de classe, il est important de spécifier le "namespace". 
        Ce contrôleur hérite du contrôleur parent défini précédemment, pour bénéficier de ses paramètres.
        Une méthode publique appelée "index()" est déclarée pour l'instant, elle affiche simplement une chaîne de caractères.
        Le routeur cible ce contrôleur et sa méthode "index()" pour répondre à l'action de l'utilisateur via l'URL. 
        */
    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
        namespace App\Controllers;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
    
	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use App\Core\Form;
		use App\Core\Token;
		use App\Entities\Identification;
		use App\Models\IdentificationModel;
		use App\Entities\User;       
        use App\Models\UserModel;
        # Class other
        use App\Entities\ArrayRenderData;
        use App\Entities\ResponseJson;
        use App\Entities\UserInformation;
        use App\Entities\SecurityForm;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class UserController {
            /* ▂ ▅ Attributs ▅ ▂ */
            /* ▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                # lexicon testLogin( )
                    # @ testLogin( )
                    # grafcet SecurityForm( $setting )
                    # │  ╚ Step 1.0 $post Cleanup
                    # │     ╬═ return array        
                    # │     ╚ Step 2.0 Security form
                    # │         ╬═  (true=>next)
                    # │         ╬═  (false=>return $response) 
                    # │         ╚   Step 3.0 Code function () 
                    # │             ╬═ Step 3.1 search indentifiant in database
                    # │                 ╬═  (true=>next)
                    # │                 ╬═  (false=>return $response)
                    # │                 ╚   Step 3.2 password_verify()
                    # │                     ╬═  (true=>next)
                    # │                     ╬═  (false=>return $response)                
                    # │                     ╚   # Step 3.3 create obj User()     
                    # │                 
                    # │                     
                    # │                      
                    # │                               
                # ----------- 



                /* ▂ ▅  testLogin  ▅ ▂ */
                    public function testLogin(){
                        $otherMsgError = false;
                        $otherMsgOk = false;
                        # We instantiate the SecurityForm() class 
                        $objSecurityForm = new SecurityForm();

                        /* ▂ ▅  Step 1.0 $post Cleanup / XSS vulnerability treatment htmlspecialchars() and Trim() ▅ ▂ */
                        # We retrieve the $POST values ​​from the request
                        $post=json_decode(file_get_contents('php://input'), true);
                        $postEncode = $objSecurityForm -> encode_XssTrim( $post );
                        /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */


                        /* ▂ ▅  Step 2.0 Security form ▅ ▂ */
                            # @ SecurityForm( array $setting ) $setting = ['method'=>'POST', 'token'=>$postEncode['token'], 'antirobot'=>$postEncode['antirobot'], 'fieldRequired'=> $manuelPost  ] 
                            $manuelPost=['identifiant'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$/', 
                                        'password'=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\/@$!%*?&#])[A-Za-z\d\/@$!%*?&#]{10,11}$/' ];                            
                            $setting = ['method'=>'POST', 'post'=>$postEncode, 'fieldRequired'=> $manuelPost ];     
                            $responseSecurityForm = $objSecurityForm -> SecurityForm( $setting );   
                            if( ! $responseSecurityForm['error'] ){
                                /* ▂ ▅  Step 3.0 Code function ▅ ▂ */
                                    # Step 3.1 search indentifiant in database
                                    # We instantiate the IdentificationModel() class 
                                    $objIdentificationModel = new IdentificationModel();
                                    #@ findIdentifiant( string $identifiant )
                                    $result_Identification = $objIdentificationModel -> findIdentifiant( $postEncode['identifiant'] );  
                                    if( !empty($result_Identification) ){
                                        # Step 3.2 password_verify
                                        if(password_verify($postEncode['password'], $result_Identification -> password)){
                                            $idUser = $result_Identification -> idIdentification ;
                                            # Step 3.3 create obj User()
                                            # We instantiate the UserModel() class
                                            $objUserModel = new UserModel();
                                            $result_User = $objUserModel -> findId( $idUser );
                                            # We instantiate the User() class
                                            $objUser = new User($result_User -> idUser, $result_User -> userName, $result_User -> userFirstName, $result_User -> userEmail, $result_User -> userRecoveryCode, $result_User -> userAccess, $result_User -> remenberMe, $result_User -> cookies, $result_User -> lastConnection);
                                            # We hydrate the object $objUser with the data from the base
                                            $objUser -> hydrate( $result_User );

                                            # We create the session variables
                                            $_SESSION['idUser'] = $objUser -> getIdUser();
                                            $_SESSION['userName'] = $objUser -> getUserName();
                                            $_SESSION['userFirstName'] = $objUser -> getUserFirstName();
                                            $_SESSION['userAccess'] = $objUser -> getUserAccess();
                                            $_SESSION['connected'] = true;

                                            # We construct the variable $response
                                            # @ objUserInformation($type='', $textInfo='')
                                            $otherMsgOk = true;
                                            $objUserInformation = new UserInformation('', '' );

                                        # Else 3.2
                                        }else{
                                            $otherMsgError = true;    
                                            # We construct the variable $response
                                            # @ objUserInformation($type='', $textInfo='')
                                            $objUserInformation = new UserInformation('', "Le mot de passe saisi n'est pas correct. Veuillez vérifier le password saisi s'il vous plaît." );
                                        };
                                        # End 3.2
                                    # Else 3.1    
                                    }else{
                                        $otherMsgError = true;
                                        # We construct the variable $response
                                        # @ objUserInformation($type='', $textInfo='')
                                        $objUserInformation = new UserInformation('',"Nous ne trouvons pas cet utilisateur. Veuillez vérifier l'identifiant saisi s'il vous plaît." );
                                    /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */
                                    };
                                    # End 3.1
                            };

                            /* ▂ ▅  Bloc Response Fetch ▅ ▂ */
                                if( $responseSecurityForm['error'] ){
                                        # We construct the variable $response
                                        # @ objUserInformation($type='', $textInfo='')
                                        $objUserInformation = new UserInformation('', $responseSecurityForm['Msg'] );
                                        # We construct the variable $response
                                        # @ objResponseJson($status='', $divtInfo='', $data='', $redirect='')
                                        $objResponseJson = new ResponseJson(false, $objUserInformation -> getDanger());                                                
                                };
                                if( $otherMsgError ){
                                        # We construct the variable $response
                                        # @ objResponseJson($status='', $divtInfo='', $data='', $redirect='')
                                        $objResponseJson = new ResponseJson(false, $objUserInformation -> getDanger());                                                
                                };
                                if( $otherMsgOk ){
                                        # We construct the variable $response
                                        # @ objResponseJson($status='', $divtInfo='', $data='', $redirect='')
                                        $objResponseJson = new ResponseJson(true, '', '', 'home' );                                              
                                };


                                $response = $objResponseJson -> getResponse();
                                echo(($response));
                                return;
                            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */                         
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */



                /* ▂ ▅ ▆ █ constructFormUserLogin █ ▆ ▅ ▂ */
                    public function constructFormUserLogin(){		
                        /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
                            /* Files form : user via constructor_Array_DataBase_SQL.php VERSION: 2.0*/ 
                        /* ▂ ▅ ▆ █ Formulaire pour la table: - user - █ ▆ ▅ ▂ */
                        /* ▂   Variables   ▂ */
                        # Declaration of variables
                        $action = 'App/Public/index.php?controller=user&action=testLogin'; 
                        $method = 'POST';
                        $idForm = 'formLogin';
                        $textBtn1 = 'Connection';
                        $textBtn2 = 'Reset';
                        $identifiantValue = "YannocH17";
                        $passwordValue = "4550191Ym@";
                        /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
                        /* ▂ ▅ ▆ █ Form: - userForm - █ ▆ ▅ ▂ */
                            # A Form is instantiated 'onsubmit="return confirm()"'=>''
                            $form = new Form();
                            # We build the form col-10 col-sm-7 col-lg-6 col-xl-4
                            $form -> addDivContainerFormOpen( [ 'name'=>'divForm-UserForm', 'id'=>'divForm-UserForm', 'class'=>'col-10 col-sm-5 col-lg-3 mb-3 py-3 text-center container-form-login' ] );
                                /* @startForm( 'comment', [list of attributs] ) */
                                $form -> startForm( 'startForm', [ 'name'=>$idForm, 'id'=>$idForm, 'action'=>$action, 'method'=>$method, 'enctype'=>'multipart/form-data', 'class'=>'justify-content-center row needs-validation', 'novalidate'=>'' ] );
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>''] ); 

                                        /* @addTitleForm('comment', 'balise', 'text title, [list of attributs]) */
                                        $form -> addImageForm( '', '', [ 'name'=>'', 'id'=>'', 'src'=>'App/Images/LogoChichoune.png','class'=>'imageForm' ] );

                                        /* @addTitleForm('comment', 'balise', 'text title, [list of attributs]) */
                                        $form -> addTitleForm( 'Title Form', 'h4', '- Connection -', [ 'name'=>'', 'id'=>'', 'class'=>'titleForm fst-italic my-4' ] );

                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();

                                /* ▂ ▅ ▆ █  Div information user  █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['id'=>'userMessage', 'class'=>''] );

                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */ 

                                /* ▂ ▅ ▆ █  Input group : - identifiant -  █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'d-flex flex-nowrap gap-2 align-items-center col-10 col-sm-10 col-lg-10 mb-3'] );                               
                                        /* @addDivInputGroupFormFloatingOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivInputGroupFormFloatingOpen( '',  ['class'=>'input-group align-content-center has-validation'] );

                                            /*-------- Picto input ----------- */
                                            /* @addSpan( 'comment', 'i or img', [ list of attributs ] ) */
                                            $form -> addSpan( '', '<i class="fa-solid fa-user"></i>', [ 'id'=>'pictoInput-identifiant', 'href'=>'#', 'class'=>'input-group-text ' ]);
                                            /*---------------------------- */

                                            /*-------- Input ----------- */
                                            /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                            $form -> addDivOpen( '',  ['class'=>'form-floating is-invalid'] );
                                                /* @addInput( 'comment', [ list of attributs ] ) */
                                                $form -> addInput('', [ 'type'=>'text', 'name'=>'identifiant', 'id'=>'identifiant', 'placeholder'=>'', 'minLength'=>'6', 'maxLength'=>'10', 'required'=>'required', 'pattern'=>"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,10}$", 'regex'=>'text-1', 'value'=>$identifiantValue, 'autofocus'=>'', 'class'=>'form-control ']);
                                                /* @addLabel( 'comment', 'text', [ list of attributs ] ) */
                                                $form -> addLabel( '', 'Votre Identifiant', [ 'id'=>'inputLabel-identifiant', 'for'=>'identifiant', 'class'=>'' ]);
                                            /* @addDivClose( 'comment' ) */
                                            $form -> addDivClose();
                                            /*---------------------------- */

                                            /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                            $form -> addDivOpen( '',  ['id'=>'feedback-identifiant', 'class'=>'invalid-feedback'] );
                                            /* @addDivClose( 'comment' ) */
                                            $form -> addDivClose();
                                            /*---------------------------- */

                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivInputGroupFormFloatingClose();
                                        /*-------- Tooltip ----------- */
                                        $textTooltip ="";
                                        $textTooltip ='<p class="text-center lh-1 fw-bold fst-italic text-decoration-underline"> - Doit Contenir - </p>';
                                        $textTooltip .='<p class="text-start mb-1 text-warning">-Nombre de caractères: mini 6, maxi 10 </p>';
                                        $textTooltip .='<p class="text-center mb-0 "> avec </p>';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini une minuscule </p> ';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini une majuscule </p> ';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini un chiffre </p> ';
                                        // $textTooltip .='<p class="text-start mb-1 ps-2 text-warning"> -Mini un caractère / @ $ ! % * ? & # </p>';
                                        $textTooltip .='<p class="text-center mb-0 ps-2 "> Modèle: Chichoune69 </p>';
                                        /* @addSpan( 'comment', 'i or img', [ list of attributs ] ) */
                                        $form -> addSpan( '', '<i class="fa-solid fa-circle-info"></i>', [ 'id'=>'addon-identifiant', 'href'=>'#', 'class'=>'pictoInfo ', 'data-bs-toggle'=>'tooltip', 'data-bs-placement'=>'left', 'data-bs-html'=>'true', 'data-bs-custom-class'=>'custom-tooltip', 'data-bs-title'=>$textTooltip ]);
                                        /*---------------------------- */

                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();                
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
                                                        
                                /* ▂ ▅ ▆ █  Input group : - password -  █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'d-flex flex-nowrap gap-2 align-items-center col-10 col-sm-10 col-lg-10 mb-4'] );                               
                                        /* @addDivInputGroupFormFloatingOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivInputGroupFormFloatingOpen( '',  ['class'=>'input-group align-content-center has-validation'] );

                                            /*-------- Picto input ----------- */
                                            /* @addSpan( 'comment', 'i or img', [ list of attributs ] ) */
                                            $form -> addSpan( '', '<i class="fa-solid fa-lock"></i>', [ 'id'=>'pictoInput-password', 'href'=>'#', 'class'=>'input-group-text ' ]);
                                            /*---------------------------- */

                                            /*-------- Input ----------- */
                                            /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                            $form -> addDivOpen( '',  ['class'=>'form-floating is-invalid'] );
                                                $form -> addInput('', [ 'type'=>'text', 'name'=>'password', 'id'=>'password', 'placeholder'=>'', 'minLength'=>'10', 'maxLength'=>'10', 'required'=>'required', 'pattern'=>"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\/@$!%*?&#])[A-Za-z\d\/@$!%*?&#]{10,11}$", 'regex'=>'password', 'value'=>$passwordValue, 'class'=>'form-control']);
                                                /* @addLabel( 'comment', 'text', [ list of attributs ] ) */
                                                $form -> addLabel( '', 'Votre Password', [ 'id'=>'inputLabel-password', 'for'=>'password', 'class'=>'' ]);
                                                /* @addDivClose( 'comment' ) */
                                            $form -> addDivClose();
                                            /*---------------------------- */

                                            /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                            $form -> addDivOpen( '',  ['id'=>'feedback-password', 'class'=>'invalid-feedback'] );
                                            /* @addDivClose( 'comment' ) */
                                            $form -> addDivClose();

                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivInputGroupFormFloatingClose();
                                        /*-------- Tooltip ----------- */
                                        $textTooltip ="";
                                        $textTooltip ='<p class="text-center lh-1 fw-bold fst-italic text-decoration-underline"> - Doit Contenir - </p>';
                                        $textTooltip .='<p class="text-start mb-1 text-warning">-Nombre de caractères: mini 10, maxi 10 </p>';
                                        $textTooltip .='<p class="text-center mb-0 "> avec </p>';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini une minuscule </p> ';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini une majuscule </p> ';
                                        $textTooltip .='<p class="text-start mb-0 ps-2 text-warning"> -Mini un chiffre </p> ';
                                        $textTooltip .='<p class="text-start mb-1 ps-2 text-warning"> -Mini un caractère / @ $ ! % * ? & # </p>';
                                        $textTooltip .='<p class="text-center mb-0 ps-2 "> Modèle: 12345678Mt@ </p>';
                                        
                                        /* @addSpan( 'comment', 'i or img', [ list of attributs ] ) */
                                        $form -> addSpan( '', '<i class="fa-solid fa-circle-info"></i>', [ 'id'=>'addon-password', 'href'=>'#', 'class'=>'pictoInfo ', 'data-bs-toggle'=>'tooltip', 'data-bs-placement'=>'left', 'data-bs-html'=>'true', 'data-bs-custom-class'=>'custom-tooltip', 'data-bs-title'=>$textTooltip ]);
                                        /*---------------------------- */

                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();                
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */

                                /* ▂ ▅ ▆ █  checkbox-Consent :   █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'d-flex flex-nowrap gap-2 align-items-center col-10 col-sm-10 col-lg-10 mb-1'] );
                                        /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivOpen( '',  ['class'=>'form-check'] );
                                                    $form -> addCheckBox('', [ 'type'=>'checkbox', 'name'=>'check-RememberMe', 'id'=>'check-RememberMe', 'class'=>'form-check-input']);
                                                    /* @addLabel( 'comment', 'text', [ list of attributs ] ) */
                                                    $form -> addLabel( '', 'Se souvenir de moi', ['for'=>'check-RememberMe', 'class'=>'form-check-label fst-italic' ]);
                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivClose();  
                                        /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivOpen( '',  ['id'=>'feedback-check-RememberMe', 'class'=>'invalid-feedback'] );
                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivClose();
                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */          

                                /* ▂ ▅ ▆ █  checkbox-Cookies :   █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'d-flex flex-nowrap gap-2 align-items-center col-10 col-sm-10 col-lg-10 mb-1'] );
                                        /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivOpen( '',  ['class'=>'form-check'] );
                                                    $form -> addCheckBox('', [ 'type'=>'checkbox', 'name'=>'check-Cookies', 'id'=>'check-Cookies', 'class'=>'form-check-input']);
                                                    /* @addLabel( 'comment', 'text', [ list of attributs ] ) */
                                                    $form -> addLabel( '', 'J\'accepte les cookies essentiels.', ['for'=>'check-Cookies', 'class'=>'form-check-label fst-italic ' ]);
                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivClose();  
                                        /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                        $form -> addDivOpen( '',  ['id'=>'feedback-check-Cookies', 'class'=>'invalid-feedback'] );
                                        /* @addDivClose( 'comment' ) */
                                        $form -> addDivClose();
                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */



                                /* ▂ ▅ ▆ █  Ancre :   █ ▆ ▅ ▂ */
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'d-flex flex-nowrap gap-2 align-items-center col-10 col-sm-10 col-lg-10 mb-4'] );
                                        /* @addAncre( 'comment', 'text de l'ancre',  [ list of attributs ] ) */
                                        $form -> addAncre('', 'Politique de confidantialité', ['href'=>'#', 'class'=>'link-secondary  link-offset-2 link-offset-5-hover link-opacity-50 link-opacity-100-hover link-underline-danger link-underline-opacity-0 link-underline-opacity-100-hover fst-italic'] ); 
                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */                              

                                /* ▂ ▅ ▆ █  Anti robot  █ ▆ ▅ ▂ */
                                /* @addAntiRobot( 'value' ) */
                                $form -> addAntiRobot('');
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */

                                /* ▂ ▅ ▆ █  Token  █ ▆ ▅ ▂ */
                                $form -> addToken();
                                # ├ Appel function Token::createdToken()
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */

                                /* ▂ ▅ ▆ █  Button  █ ▆ ▅ ▂ */
                                /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                $form -> addDivOpen( '',  ['class'=>'container'] );
                                    /* @addDivOpen( 'comment', [ list of attributs ] ) */
                                    $form -> addDivOpen( '',  ['class'=>'col d-flex justify-content-evenly'] );
                                        /* @addBtn( 'comment', 'textBtn',[ list of attributs ] ) */
                                        $form -> addBtn( '', $textBtn1, [ 'type'=>'submit', 'name'=>'true', 'id'=>'true','value'=>'true', 'class'=>'btn btn-primary', ] );
                                        /* @addBtn( 'comment', 'textBtn',[ list of attributs ] ) */
                                        $form -> addBtn( '', $textBtn2, [ 'type'=>'reset', 'name'=>'false', 'id'=>'false', 'value'=>'false', 'class'=>'btn btn-danger', ] );
                                    /* @addDivClose( 'comment' ) */
                                    $form -> addDivClose();
                                /* @addDivClose( 'comment' ) */
                                $form -> addDivClose();
                                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */

                                $form -> endForm( 'endForm' );

                            $form -> addDivContainerFormClose();
                            
                            /* ▂   getFormElements   ▂ */
                            $form = $form -> getFormElements();
                            return $form;
                            /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

/* ▂ ▅ ▆ █  █ ▆ ▅ ▂ */
/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 


                /*▂ ▅ ▆ █ Setters █ ▆ ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>