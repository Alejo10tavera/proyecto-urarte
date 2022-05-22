<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=donors&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageDonor = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageDonor[0]->status_page != 0): ?>

    <section class="promo-primary">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageDonor[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageDonor[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo $pageDonor[0]->word_page ?></span></div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                                <h1 class="promo-primary__title"><span><?php echo $pageDonor[0]->name_page ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php 

        /*Primera sección*/

        $sectionDonorOne = CurlController::dataTemplates("donors_section_one");
        $dataDonorOne = json_decode($sectionDonorOne[0]->text_template,true);
    
    ?>

    <section class="section donors-inner"><img class="donors-inner__bg" src="<?php echo $backoffice ?>views/img/template/donors_inner.png" alt="<?php echo $organization[0]->name_organization ?>"/>
        <div class="container">
            <div class="row margin-bottom">
                <div class="col-12">
                    <div class="heading heading--primary heading--center"><span class="heading__pre-title">Donadores</span>
                        <h2 class="heading__title"><span><?php echo $dataDonorOne[0]["title"] ?></span></h2>
                        <p><?php echo $dataDonorOne[0]["description"] ?></p>
                    </div>
                </div>
            </div>

            <?php 

                $randomStart = rand(0,16);
                $select = "*";
                $url = CurlController::api()."donations?linkTo=status_donation&equalTo=1&linkTo_=bdelete_donation&equalTo_=0&orderBy=id_donation&orderMode=ASC&startAt=0&endAt=".$randomStart."&select=".$select;
                $method = "GET";
                $fields = array();
                $header = array();

                $dataDonation = CurlController::request($url, $method, $fields, $header)->results; 
                

            ?>

            <div class="row">
                <div class="col-12">
                    <ul class="donors-list">

                        <?php 

                            foreach ($dataDonation as $key => $value) {

                                echo '<li class="donors-list__item"><a class="donors-list__link">'.$value->person_donation.'</a></li>';

                            }

                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <?php 

        /*Segunda sección*/

        $sectionDonorTwo = CurlController::dataTemplates("donors_section_two");
        $dataDonorTwo = json_decode($sectionDonorTwo[0]->text_template,true);
    
    ?>

    <section class="section info no-padding-top">
        <div class="container">
            <div class="row align-items-start margin-bottom">
                <div class="col-xl-12">
                    <div class="heading heading--primary">
                        <h2 class="heading__title"><span><?php echo $dataDonorTwo[0]["title"] ?></span></h2>
                        <p><?php echo $dataDonorTwo[0]["description"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="info__img"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/info_img-layout.png" alt="<?php echo $organization[0]->name_organization ?>"/><img src="<?php echo $backoffice ?>views/img/template/<?php echo $dataDonorTwo[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/></div>
                </div>
            </div>
        </div>
    </section>

    <?php 

        /*Tercera sección */

        $sectionDonorThree = CurlController::dataTemplates("donors_section_three");
        $dataDonorThree = json_decode($sectionDonorThree[0]->text_template,true);
        
    ?>        

    <section class="section no-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="info-banner"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/info-banner_layout.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                        <div class="row margin-bottom">
                            <div class="col-12">
                                <div class="heading heading--primary heading--center">
                                    <h2 class="heading__title no-margin-bottom"><span><?php echo $dataDonorThree[0]["title"] ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="info-banner__img"><img src="<?php echo $backoffice ?>views/img/template/<?php echo $dataDonorThree[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/></div>
                            </div>
                            <div class="col-lg-6">
                                <?php echo $sectionDonorThree[0]->html_template ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php 

        /*Cuarta sección */

        $sectionDonorFour = CurlController::dataTemplates("donors_section_four");
        $dataDonorFour = json_decode($sectionDonorFour[0]->text_template,true);
        
        
    ?>    

    <section class="section text-section text-section--style-2"><img class="text-section__bg-left" src="<?php echo $backoffice ?>views/img/template/text-section_left.png" alt="<?php echo $organization[0]->name_organization ?>"/><img class="text-section__bg-right" src="<?php echo $backoffice ?>views/img/template/text-section_right.png" alt="<?php echo $organization[0]->name_organization ?>"/>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-section__heading"><?php echo $dataDonorFour[0]["word"] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-4">
                    <h3 class="text-section__title"><?php echo $dataDonorFour[0]["title"] ?></h3>
                    <p><?php echo $dataDonorFour[0]["description"] ?></p>
                </div>
            </div>
        </div>
    </section>
    
<?php endif ?>

