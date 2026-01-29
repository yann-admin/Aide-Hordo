<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* via Z_ToolBox/CONSTRUCTOR/constructor_Array_Structure_Table.php VERSION: 1.05*/
  # Declaration and incrementing of variables 
//   $title = (isset($ArrayRender) ? $ArrayRender->getTitrePage() : "Title En Dev");
//   $form = (isset($ArrayRender) ? $ArrayRender->getForms() : "Forms En Dev"); 
?>
<!-- HTML -->
 <div class="d-flex justify-content-center" > 
<div id="userMessage"> </div>
    <?= (isset($ArrayRender) ? $ArrayRender->getMessagePage() : "" ); ?>
    <!-- <h1> bonjour vous êtes sur la page d'accueil </h1>
    <p>Contenu ici !</p> -->
</div>    
