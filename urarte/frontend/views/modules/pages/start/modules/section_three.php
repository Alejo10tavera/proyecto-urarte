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

<div class="container-fluid preloadTrue">

	<div class="container">

		<div class="row">
            <div class="col-12 col-sm-6">

                <div class="ph-item border-0">
                    <div class="ph-col-12">
                        
                        
                        <div class="ph-picture"></div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6">

                <div class="ph-item border-0">
                    <div class="ph-col-12">
                        <div class="ph-picture"></div>
                        
                    </div>
                    
                </div>

            </div>

        </div>

	</div>
	
</div>

<section class="section no-padding-top no-padding-bottom preloadFalse">
	<div class="row no-gutters">
		<div class="col-xl-6">
			<div class="action-block">
				<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionFive[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h3 class="action-block__title"><?php echo $dataSectionFive[0]["title"] ?></h3>
					<p class="action-block__text"><?php echo $dataSectionFive[0]["description"] ?></p>

					<?php if ($dataSectionFive[0]["route"] != ""): ?>
						<a class="action-block__link button button--primary" href="<?php echo $path.$dataSectionFive[0]["route"] ?>"><?php echo $dataSectionFive[0]["text"] ?></a>
					<?php endif ?>
					
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="action-block">
				<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionSix[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
					<h3 class="action-block__title"><?php echo $dataSectionSix[0]["title"] ?></h3>
					<p class="action-block__text"><?php echo $dataSectionSix[0]["description"] ?></p>
					<?php if ($dataSectionSix[0]["route"] != ""): ?>
						<a class="action-block__link button button--primary" href="<?php echo $path.$dataSectionSix[0]["route"] ?>"><?php echo $dataSectionSix[0]["text"] ?></a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>