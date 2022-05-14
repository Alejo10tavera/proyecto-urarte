<?php 

/*=============================================
Primera sección
=============================================*/

$sectionOne = CurlController::dataTemplates("index_section_one");
$dataOne = json_decode($sectionOne[0]->text_template,true);

/*=============================================
Segunda sección
=============================================*/

$sectionTwo = CurlController::dataTemplates("index_section_two");
$dataTwo = json_decode($sectionTwo[0]->text_template,true);

?>

<section class="section about-us background--brown">
	<div class="container">
		<div class="row align-items-center">
			<!-- Primera seccion -->
			<div class="col-lg-6">
				<div class="heading heading--primary">
					<h2 class="heading__title"><span><?php echo $dataOne[0]["title"] ?></span></h2>
				</div>
				<?php echo $sectionOne[0]->html_template ?><a class="button button--primary" href="<?php echo $dataOne[0]["route"] ?>"><?php echo $dataOne[0]["text"] ?></a>
			</div>
			<!-- Segunda seccion -->
			<div class="col-lg-6 col-xl-5 offset-xl-1">
				<div class="info-box"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataTwo[0]["imagen"] ?>" alt="img"/>
					<h4 class="info-box__title"><?php echo $dataTwo[0]["title"] ?></h4>
					<p><?php echo $dataTwo[0]["description"] ?></p><a class="info-box__link" href="<?php echo $dataTwo[0]["route"] ?>"><?php echo $dataTwo[0]["text"] ?></a>
				</div>
			</div>
		</div>
	</div>
</section>