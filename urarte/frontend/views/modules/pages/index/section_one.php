<?php 

/*=============================================
Primera sección
=============================================*/

$sectionIndexOne = CurlController::dataTemplates("index_section_one");
$dataSectionOne = json_decode($sectionIndexOne[0]->text_template,true);

/*=============================================
Segunda sección
=============================================*/

$sectionIndexTwo = CurlController::dataTemplates("index_section_two");
$dataSectionTwo = json_decode($sectionIndexTwo[0]->text_template,true);

?>

<section class="section about-us background--brown">
	<div class="container">
		<div class="row align-items-center">
			<!-- Primera seccion -->
			<div class="col-lg-6">
				<div class="heading heading--primary">
					<h2 class="heading__title"><span><?php echo $dataSectionOne[0]["title"] ?></span></h2>
				</div>
				<?php echo $sectionIndexOne[0]->html_template ?>

				<?php if ($dataSectionOne[0]["route"] != ""): ?>

					<a class="button button--primary" href="<?php echo $dataSectionOne[0]["route"] ?>"><?php echo $dataSectionOne[0]["text"] ?></a>
					
				<?php endif ?>
				
			</div>
			<!-- Segunda seccion -->
			<div class="col-lg-6 col-xl-5 offset-xl-1">
				<div class="info-box"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionTwo[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h4 class="info-box__title"><?php echo $dataSectionTwo[0]["title"] ?></h4>
					<p><?php echo $dataSectionTwo[0]["description"] ?></p>

					<?php if ($dataSectionTwo[0]["route"] != ""): ?>

						<a class="info-box__link" href="<?php echo $dataSectionTwo[0]["route"] ?>"><?php echo $dataSectionTwo[0]["text"] ?></a>
						
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
</section>