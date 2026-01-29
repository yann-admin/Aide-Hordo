<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
    
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
	    namespace App\Controllers;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
		use App\Controllers\UserController;
        use App\Entities\ArrayRenderData;
        use App\Entities\Session;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class HomeController extends Controller{
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */

                /* ▂ ▅  index()  ▅ ▂ */
                    Public function index(){
                        $this -> login();
                        // if ($_SESSION['connected']==false){
                        //     $this -> login();
                        // }else{
                        //     //echo "cette méthode affiche la page d'acceuil";
                        //     $this -> render('home/index');                         
                        // };     
                        
                        
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                /* ▂ ▅  disconnect()  ▅ ▂ */
                    Public function disconnect(){
                        $objSession = new Session(); 
                        $objSession -> sessionDestroy();   
                        header('location:home');
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                /* ▂ ▅  login()  ▅ ▂ */
                    Public function login(){
                        # We construct the Render object in the $ArrayRender variable.
                        # @ ArrayRenderData($titre, $onglet, $form, $scriptJs, $sheetCss, $responce)
                        $objArrayRenderData = new ArrayRenderData();
                        # We construct the Form object in the $form variable.
                        $objetUser = new UserController();
                        $myForm = $objetUser->constructFormUserLogin();
                        # we set the ArrayRender object
                        $objArrayRenderData -> setTitrePage("");
                        $objArrayRenderData -> setOngletPage("API-Chichoune/Login");
                        $objArrayRenderData -> setSheetCss("App/Css/formLogin.css");
                        $objArrayRenderData -> setScriptJs("App/Js/scriptPage/loginPage.js");
                        $objArrayRenderData -> setForms($myForm);
                        //echo "cette méthode affiche la page formulaire login";
                        $this -> render('login/login',["ArrayRender" => $objArrayRenderData]);  
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */ 

                






                /*▂ ▅ ▆ █ Setters █ ▆ ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Getters ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>
