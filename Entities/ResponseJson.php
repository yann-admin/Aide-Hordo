<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
    
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
	    namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */

	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class ResponseJson {
            /* ▂ ▅ Attributs ▅ ▂ */
				private $status_;
                private $divInfo_ ;
				private $data_;
				private $redirect_;
                private $responseJson_;
            /* ▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */

			    /*▂ ▅ ▆ █ construct █ ▆ ▅ ▂ */
				    # @ objResponseJson($status='', $divtInfo='', $data='', $redirect='')
					public function __construct($status='', $divInfo='', $data='', $redirect=''){
						$this -> status_ = $status;
						$this -> divInfo_ = $divInfo;
						$this -> data_ =  $data;
						$this -> redirect_ = $redirect;

                        $responseJson = ["status"=>$status, "divInfo"=>$divInfo, "data"=>$data, "redirect"=>$redirect];
                        $this -> responseJson_ = json_encode( $responseJson, JSON_UNESCAPED_SLASHES  );

					}
				/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /*▂ ▅ ▆ █ Setters █ ▆ ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ ▆ █ Getters █ ▆ ▅ ▂ */
                    public function getResponse(){ return $this -> responseJson_; }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>
