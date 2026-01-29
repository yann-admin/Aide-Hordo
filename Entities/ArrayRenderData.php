<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */
	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
	class ArrayRenderData{ 
			/* ▂ ▅ Attributs ▅ ▂ */
				private $titrePage_ = '';
				private $ongletPage_ = '';
				private $forms_ = '';
				private $scriptJs_ = '';
				private $sheetCss_ = '';
				private $responce_ = '';
            /* ▂▂▂▂▂▂▂▂▂▂▂ */
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
			
			    /*▂ ▅ ▆ █ construct █ ▆ ▅ ▂ */
				    # @ objArrayRenderData($titrePage='', $ongletPage='', $forms='', $scriptJs='', $sheetCss='', $responce='')
					public function __construct($titrePage='', $ongletPage='', $forms='', $scriptJs='', $sheetCss='', $responce=''){
						$this -> titrePage_ = $titrePage;
						$this -> ongletPage_ = $ongletPage;
						$this -> forms_ =  $forms;
						$this -> scriptJs_ = $scriptJs;
						$this -> sheetCss_ = $sheetCss;
						$this -> responce_ = $responce;
					}
				/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ Setters  ▅ ▂ */
					public function setTitrePage ($modifTitre ){ $this -> titrePage_  = trim($modifTitre ); return $this; }
					public function setOngletPage($modifOnglet){ $this -> ongletPage_ = trim($modifOnglet); return $this; }
					public function setForms ($modifForm ){ $this -> forms_  = trim($modifForm); return $this; }
					public function setScriptJs ($modifScriptJs ){ $this -> scriptJs_  = trim($modifScriptJs); return $this; }
					public function setSheetCss ($modifSheetCss ){ $this -> sheetCss_  = trim($modifSheetCss); return $this; }
					public function setResponce ($modifResponce ){ $this -> responce_  = $modifResponce; return $this; }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

				/* ▂ ▅ Getters ▅ ▂ */
					public function getTitrePage (){ return $this -> titrePage_; }
					public function getOngletPage(){ return $this -> ongletPage_; }
					public function getForms (){ return $this -> forms_; }
					public function getSheetCss (){ return $this -> sheetCss_ ; }
					public function getScriptJs (){ return $this -> scriptJs_; }
					public function getResponce (){ return $this -> responce_; }
				/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

				/* ----   Call Setters and Getters     ---- */
				# new DbmaneModel
				// \$model = new ArrayRenderDataModel;
				/* ----------------------- */
				# Variable
				// $titre  = $_POST[''];
				// $onglet = $_POST[''];
				// $formulaire  = $_POST[''];
				// $scriptJs  = $_POST[''];
				// $sheetCss  = $_POST[''];
				// $baliseHidden = $_POST[''];
				// $itemNav  = $_POST[''];
				// $responcePhp  = $_POST[''];
				// $responceAjax  = $_POST[''];
				/* ----------------------- */
				# On hydrate
				//$newObjetArrayRenderData -> setTitre (htmlspecialchars(trim($titre ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setOnglet(htmlspecialchars(trim($onglet),ENT_QUOTES));
				//$newObjetArrayRenderData -> setFormulaire (htmlspecialchars(trim($formulaire ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setScriptJs (htmlspecialchars(trim($scriptJs ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setSheetCss (htmlspecialchars(trim($sheetCss ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setBaliseHidden(htmlspecialchars(trim($baliseHidden),ENT_QUOTES));
				//$newObjetArrayRenderData -> setItemNav (htmlspecialchars(trim($itemNav ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setResponcePhp (htmlspecialchars(trim($responcePhp ),ENT_QUOTES));
				//$newObjetArrayRenderData -> setResponceAjax (htmlspecialchars(trim($responceAjax ),ENT_QUOTES));
				/* ----------------------- */
				//$newObjetArrayRenderData -> getTitre ()
				//$newObjetArrayRenderData -> getOnglet()
				//$newObjetArrayRenderData -> getFormulaire ()
				//$newObjetArrayRenderData -> getScriptJs ()
				//$newObjetArrayRenderData -> getSheetCss ()
				//$newObjetArrayRenderData -> getBaliseHidden()
				//$newObjetArrayRenderData -> getItemNav ()
				//$newObjetArrayRenderData -> getResponcePhp ()
				//$newObjetArrayRenderData -> getResponceAjax ()
				/* ----------------------- */
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
?>