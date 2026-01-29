<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
    
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
	    namespace App\Entities;
	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */

	/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 

    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class UserInformation {
            /* ▂ ▅ Attributs ▅ ▂ */
				private $type_;
                private $textInfo_ ;
                private $resulat_ ;
            /* ▂▂▂▂▂▂▂▂▂▂▂ */

            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */

			    /*▂ ▅ ▆ █ construct █ ▆ ▅ ▂ */
				    # @ objUserInformation($type='', $textInfo='')
					public function __construct($type='', $textInfo=''){
						$this -> type_ = $type;
						$this -> textInfo_ = $textInfo;
					}
				/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /*▂ ▅ ▆ █ Setters █ ▆ ▅ ▂ */
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂  */

                /* ▂ ▅ ▆ █ Getters █ ▆ ▅ ▂ */
                    public function getPrimary(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-primary mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_; 
                    }

                    public function getSecondary(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-primary mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_; 
                    }

                    public function getSuccess(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-success mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_; 
                    }

                    public function getDanger(){ 
                        $this -> resulat_="";
                        $this -> resulat_='<p class="alert alert-danger mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_;
                    }

                    public function getWarnning(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-warning mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_;
                    }

                    public function getInfo(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-info mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_;
                    }

                    public function getLight(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-light mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_;
                    }

                    public function getDark(){ 
                        $this -> resulat_='';
                        $this -> resulat_='<p class="alert alert-dark mb-2 p-0" role="alert">'. $this -> textInfo_ . '</p>';
                        return $this -> resulat_;
                    }
                /* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */
            /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ 
        };
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */  
?>