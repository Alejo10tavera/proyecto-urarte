<?php 

/*=============================================
Seccion proyecto de vida
=============================================*/

$sectionIndexFour = CurlController::dataTemplates("index_section_four");
$dataSectionFour = json_decode($sectionIndexFour[0]->text_template,true);

?>

<section class="section text-section text-section--front_2 no-padding-bottom"><img class="text-section__bg" src="<?php echo $backoffice ?>views/img/template/text-section_2.png" alt="<?php echo $organization[0]->name_organization ?>"/>
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

				<?php if ($dataSectionFour[0]["route"] != ""): ?>

					<a class="button button--primary" href="<?php echo $path.$dataSectionFour[0]["route"] ?>"><?php echo $dataSectionFour[0]["text"] ?></a>
					
				<?php endif ?>

			</div>
		</div>
	</div>
</section>