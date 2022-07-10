<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=volunteer&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageVolunteer = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageVolunteer[0]->status_page != 0): ?>

    <div class="container-fluid preloadTrue">
    
       <!--  <div class="spinner-border text-muted my-5"></div> -->

       <div class="container">

           <div class="ph-item border-0">

                <div class="ph-col-4">
                    
                    <div class="ph-row">
                        
                        <div class="ph-col-10"></div>  

                        <div class="ph-col-10 big"></div>  

                        <div class="ph-col-6 big"></div>  

                    </div>

                </div>

                <div class="ph-col-8">

                   <div class="ph-picture"></div> 

                </div>
                
            </div>

        </div>

    </div>

    <!-- Banner  -->
    <section class="promo-primary preloadFalse">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageVolunteer[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageVolunteer[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageVolunteer[0]->word_page)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageVolunteer[0]->name_page)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <?php 

    /*=============================================
    Seccion uno voluntarios
    =============================================*/

    $sectionVolunteerOne = CurlController::dataTemplates("volunteer_section_one");
    $dataSectionVolunteerOne = json_decode($sectionVolunteerOne[0]->text_template,true);

    ?>

    <!-- section start-->
    <section class="section preloadFalse">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="img-box"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/about_layout-reverse.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                        <div class="img-box__img">
                            <img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionVolunteerOne[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 offset-xl-1">
                    <div class="heading heading--primary">
                        <h2 class="heading__title"><span><?php echo $dataSectionVolunteerOne[0]["title"] ?></span></h2>
                    </div>
                    
                    <?php echo $sectionVolunteerOne[0]->html_template ?>

                </div>
            </div>
        </div>
    </section>
    <!-- section end-->

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <?php 

    /*=============================================
    Seccion dos voluntarios
    =============================================*/

    $sectionVolunteerTwo = CurlController::dataTemplates("volunteer_section_two");
    $dataSectionVolunteerTwo = json_decode($sectionVolunteerTwo[0]->text_template,true);

    ?>

    <!-- section start-->
    <section class="section forms-section no-padding-top no-padding-bottom preloadFalse">
        <div class="container">
            <div class="row margin-bottom">
                <div class="col-lg-6">
                    <div class="heading heading--primary"><span class="heading__pre-title">Hazte voluntario</span>
                        <h2 class="heading__title"><span>Complete</span> <span>el formulario</span></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p><?php echo $dataSectionVolunteerTwo[0]["description"] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- user form start-->                    
                    <form class="form user-form needs-validation" novalidate method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form__field" type="text" name="first-name" placeholder="First Name"/>
                                <input class="form__field" type="email" name="email" placeholder="E-mail"/>
                                <input class="form__field" type="tel" name="phone-number" placeholder="Phone Number"/>
                                <input class="form__field" type="number" name="date-of-birth" placeholder="Date of Birth"/>
                                <input class="form__field" type="tel" name="adress" placeholder="Adress"/>
                            </div>
                            <div class="col-lg-6">
                                <textarea class="form__field form__message" name="message" placeholder="About Occupation"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="form__submit" type="submit">Enviar   </button>
                            </div>
                        </div>
                    </form>
                    <!-- user form end-->
                </div>
            </div>
        </div>
        <img class="forms-section__bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSectionVolunteerTwo[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
    </section>

<?php endif ?>

    