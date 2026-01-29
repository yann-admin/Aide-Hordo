<?php
	/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
		/* via Z_ToolBox/CONSTRUCTOR/constructor_Array_Structure_Table.php VERSION: 1.05*/
  # Declaration and incrementing of variables 
  $title = (isset($ArrayRender) ? $ArrayRender->getTitrePage() : "Title En Dev");
  $form = (isset($ArrayRender) ? $ArrayRender->getForms() : "Forms En Dev");
?>
<!-- Add div class container 
	<div class="row justify-content-center "></div>-->
        <!-- <h1>je suis sur la page formualire login</h1> -->
		<?php ?>
		<!-- Add Title 
		<div class=" d-flex justify-content-center ">
			<h4 class="fst-italic"> <?=  $title; ?> </h4>
		</div>-->
		<!-- Add message if exist -->
		<!-- Text by App\js\module\controlEntryForm.js -->
		<!-- <div id='responce' class="d-flex justify-content-center alert text-center responce" role="alert"> </div>  -->
		<div class="d-flex justify-content-center" > </div>
		<!-- Add form -->
			<?= $form; ?>
		<br>
	