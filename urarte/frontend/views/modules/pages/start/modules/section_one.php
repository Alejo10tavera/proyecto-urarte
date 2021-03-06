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

<div class="container-fluid preloadTrue">

	<div class="container">

		<div class="row">
            <div class="col-12 col-sm-6">

                <div class="ph-item border-0">
                    <div class="ph-col-12">
                        
                        <div class="ph-row">
                            <div class="ph-col-4"></div>
                            <div class="ph-col-8 empty"></div>
                            <div class="ph-col-12"></div>
                            <div class="ph-col-12"></div>
                        </div>
                        <div class="ph-picture"></div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6">

                <div class="ph-item border-0">
                    <div class="ph-col-12">
                        <div class="ph-picture"></div>
                        <div class="ph-row">
                            <div class="ph-col-4"></div>
                            <div class="ph-col-8 empty"></div>
                            <div class="ph-col-12"></div>
                            <div class="ph-col-12"></div>
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

	</div>
	
</div>

<section class="section about-us background--brown preloadFalse">
	<div class="container">
		<div class="row align-items-center">
			<!-- Primera seccion -->
			<div class="col-lg-6">
				<div class="heading heading--primary">
					<h2 class="heading__title"><span><?php echo $dataSectionOne[0]["title"] ?></span></h2>
				</div>
				<?php echo $sectionIndexOne[0]->html_template ?>

				<?php if ($dataSectionOne[0]["route"] != ""): ?>

					<a class="button button--primary" href="<?php echo $path.$dataSectionOne[0]["route"] ?>"><?php echo $dataSectionOne[0]["text"] ?></a>
					
				<?php endif ?>
				
			</div>
			<!-- Segunda seccion -->
			<div class="col-lg-6 col-xl-5 offset-xl-1">
				<div class="info-box"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionTwo[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h4 class="info-box__title"><?php echo $dataSectionTwo[0]["title"] ?></h4>
					<p><?php echo $dataSectionTwo[0]["description"] ?></p>

					<?php if ($dataSectionTwo[0]["route"] != ""): ?>

						<a class="info-box__link" href="<?php echo $path.$dataSectionTwo[0]["route"] ?>"><?php echo $dataSectionTwo[0]["text"] ?></a>
						
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
</section>