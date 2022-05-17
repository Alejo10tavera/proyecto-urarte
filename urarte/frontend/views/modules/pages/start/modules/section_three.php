<?php 

/*=============================================
Primera sección
=============================================*/

$sectionIndexFive = CurlController::dataTemplates("index_section_five");
$dataSectionFive = json_decode($sectionIndexFive[0]->text_template,true);

/*=============================================
Segunda sección
=============================================*/

$sectionIndexSix = CurlController::dataTemplates("index_section_six");
$dataSectionSix = json_decode($sectionIndexSix[0]->text_template,true);

?>
<section class="section no-padding-top no-padding-bottom">
	<div class="row no-gutters">
		<div class="col-xl-6">
			<div class="action-block">
				<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionFive[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h3 class="action-block__title"><?php echo $dataSectionFive[0]["title"] ?></h3>
					<p class="action-block__text"><?php echo $dataSectionFive[0]["description"] ?></p>

					<?php if ($dataSectionFive[0]["route"] != ""): ?>
						<a class="action-block__link button button--primary" href="<?php echo $dataSectionFive[0]["route"] ?>"><?php echo $dataSectionFive[0]["text"] ?></a>
					<?php endif ?>
					
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="action-block">
				<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionSix[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h3 class="action-block__title"><?php echo $dataSectionSix[0]["title"] ?></h3>
					<p class="action-block__text"><?php echo $dataSectionSix[0]["description"] ?></p>
<<<<<<< HEAD
					<?php if ($dataSectionSix[0]["route"] != ""): ?>
						<a class="action-block__link button button--primary" href="<?php echo $dataSectionSix[0]["route"] ?>"><?php echo $dataSectionSix[0]["text"] ?></a>
=======
					<?php if ($dataSectionFive[0]["route"] != ""): ?>
						<a class="action-block__link button button--primary" href="<?php echo $dataSectionFive[0]["route"] ?>"><?php echo $dataSectionFive[0]["text"] ?></a>
>>>>>>> 1f7e113619270afb96acb55c101dda1d1bca7326
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>