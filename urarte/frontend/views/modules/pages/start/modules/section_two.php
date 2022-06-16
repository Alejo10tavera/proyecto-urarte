<?php 

/*=============================================
Seccion proyecto de vida
=============================================*/

$sectionIndexFour = CurlController::dataTemplates("index_section_four");
$dataSectionFour = json_decode($sectionIndexFour[0]->text_template,true);

?>

<div class="container-fluid preloadTrue">

	<div class="container">

		<div class="ph-item border-0">

		    <div class="ph-col-12">
		        <div class="ph-picture"></div>
		        <div class="ph-row">
		            <div class="ph-col-6 big"></div>
		            <div class="ph-col-4 empty big"></div>
		            <div class="ph-col-2 big"></div>
		            <div class="ph-col-4"></div>
		            <div class="ph-col-8 empty"></div>
		            <div class="ph-col-6"></div>
		            <div class="ph-col-6 empty"></div>
		            <div class="ph-col-12"></div>
		        </div>
		    </div>

		</div>

	</div>

</div>

<section class="section text-section text-section--front_2 no-padding-bottom preloadFalse"><img class="text-section__bg" src="<?php echo $backoffice ?>views/img/template/text-section_2.png" alt="<?php echo $organization[0]->name_organization ?>"/>
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="text-section__heading"><?php echo $dataSectionFour[0]["word"] ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-4">

				<h3 class="text-section__title"><?php echo $dataSectionFour[0]["title"] ?></h3>

				<p><?php echo $dataSectionFour[0]["description"] ?></p>
				
			</div>
		</div>
	</div>
</section>