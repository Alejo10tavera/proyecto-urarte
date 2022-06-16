<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=about&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageAbout = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageAbout[0]->status_page != 0): ?>

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
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageAbout[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageAbout[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageAbout[0]->word_page)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageAbout[0]->name_page)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php 

        /*Primera sección*/

        $sectionAboutOne = CurlController::dataTemplates("about_section_one");
        $dataAboutOne = json_decode($sectionAboutOne[0]->text_template,true);
    
    ?>

    <div class="container-fluid preloadTrue">
    
       <!--  <div class="spinner-border text-muted my-5"></div> -->

       <div class="container">

           <div class="ph-item border-0">

                <div class="ph-col-6">

                   <div class="ph-picture"></div> 

                </div>

                <div class="ph-col-6">
                    
                    <div class="ph-row">
                        
                        <div class="ph-col-10"></div>  

                        <div class="ph-col-10 big"></div>  

                        <div class="ph-col-6 big"></div>  

                    </div>

                </div>
                
            </div>

        </div>

    </div>

    <section class="section about-us preloadFalse">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="img-box"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/about_layout-reverse.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                        <div class="img-box__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataAboutOne[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/></div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 offset-xl-1">
                    <div class="heading heading--primary"><span class="heading__pre-title"><?php echo $dataAboutOne[0]["title"] ?></span>
                        <h2 class="heading__title"> <span><?php echo $dataAboutOne[0]["description"] ?></span></h2>
                    </div>
                    <?php echo $sectionAboutOne[0]->html_template ?>
                </div>
            </div>
        </div>
    </section>

    <?php 

        /*Segunda sección*/

        $sectionAboutTwo = CurlController::dataTemplates("about_section_two");
        $dataAboutTwo = json_decode($sectionAboutTwo[0]->text_template,true);
    
    ?>

    <div class="container-fluid preloadTrue">
    
       <!--  <div class="spinner-border text-muted my-5"></div> -->

       <div class="container">

           <div class="ph-item border-0">

                <div class="ph-col-6">
                    
                    <div class="ph-row">
                        
                        <div class="ph-col-10"></div>  

                        <div class="ph-col-10 big"></div>  

                        <div class="ph-col-6 big"></div>  

                    </div>

                </div>

                <div class="ph-col-6">

                   <div class="ph-picture"></div> 

                </div>
                
            </div>

        </div>

    </div>

    <section class="section about-us about-us--style-2 no-padding-top preloadFalse">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php echo $sectionAboutTwo[0]->html_template ?>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-1">
                    <div class="about-us__text-aside"><?php echo $dataAboutTwo[0]["title"] ?></div>
                </div>
            </div>
        </div>
    </section>

    <?php 

        // Tercera sección

        $sectionAboutThree = CurlController::dataTemplates("about_section_three");
        $dataAboutThree = json_decode($sectionAboutThree[0]->text_template,true);
    
    ?>

    <div class="container-fluid preloadTrue">
    
       <!--  <div class="spinner-border text-muted my-5"></div> -->

       <div class="container">

           <div class="ph-item border-0">

                <div class="ph-col-6">
                    
                    <div class="ph-row">
                        
                        <div class="ph-col-10"></div>  

                        <div class="ph-col-10 big"></div>  

                        <div class="ph-col-6 big"></div>  

                    </div>

                </div>

                <div class="ph-col-6">

                   <div class="ph-picture"></div> 

                </div>
                
            </div>

        </div>

    </div>

    <section class="section about-us about-us--style-2 no-padding-top preloadFalse">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5 offset-xl-1">
                    <div class="about-us__text-aside"><?php echo $dataAboutThree[0]["title"] ?></div>
                </div>
                <div class="col-lg-6">
                    <?php echo $sectionAboutThree[0]->html_template ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php 

        // Seccion video

        $sectionAboutVideo = CurlController::dataTemplates("about_section_video");
        $dataAboutVideo = json_decode($sectionAboutVideo[0]->text_template,true);
    
    ?>

    <?php if ($dataAboutVideo[0]["status"] != 0): ?>

        <div class="container-fluid preloadTrue">
    
           <!--  <div class="spinner-border text-muted my-5"></div> -->

           <div class="container">

               <div class="ph-item border-0">

                    <div class="ph-col-12">

                       <div class="ph-picture"></div> 

                    </div>
                    
                </div>

            </div>

        </div>

        <section class="section video-block no-padding-top preloadFalse">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-frame"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataAboutVideo[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/><a class="video-trigger video-frame__trigger" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"><span class="video-frame__icon"><i class="fa fa-play" aria-hidden="true"></i></span><span class="video-frame__text">Watch our video</span></a><img class="video-frame__img-layout" src="<?php echo $backoffice ?>views/img/template/video_frame-layout.png" alt="<?php echo $organization[0]->name_organization ?>"/></div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php endif ?>

    

    <!-- <section class="section statistics no-padding-top">
        <div class="container">
            <div class="row margin-bottom">
                <div class="col-12">
                    <div class="heading heading--primary heading--center"><span class="heading__pre-title">What we Do</span>
                        <h2 class="heading__title no-margin-bottom"><span>Our</span> <span>Statistics</span></h2>
                    </div>
                </div>
            </div>
            <div class="row offset-margin">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="img/icon_1.png" alt="img"/><span class="js-counter">20</span></div>
                        <div class="icon-item__text">
                            <p>Years of Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="img/icon_2.png" alt="img"/><span class="js-counter">32</span></div>
                        <div class="icon-item__text">
                            <p>Country</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="img/icon_3.png" alt="img"/><span class="js-counter">200 </span><span>+</span></div>
                        <div class="icon-item__text">
                            <p>Thousand People Helped</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="img/icon_4.png" alt="img"/><span class="js-counter">65 </span><span>b</span></div>
                        <div class="icon-item__text">
                            <p>Dollars We Collected       </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Equipo-->

    <?php 

        $select = "*";
        $url = CurlController::api()."teams?linkTo=status_team&equalTo=1&linkTo_=bdelete_team&equalTo_=0&orderBy=id_team&orderMode=ASC&startAt=0&endAt=8&select=".$select;
        $method = "GET";
        $fields = array();
        $header = array();

        $dataTeam = CurlController::request($url, $method, $fields, $header)->results; 
        $dataTeamSocial = json_decode($dataTeam[0]->social_team,true);

    ?>

    <div class="container-fluid preloadTrue">

        <?php 

            $blocks = [0,1];

        ?>

        <?php foreach ($blocks as $key => $value): ?>

            <!--=====================================
            Preload
            ======================================-->           
                
            <div class="container">

               <div class="ph-item border-0">

                    <div class="ph-col-4">

                       <div class="ph-picture"></div> 

                        <div class="ph-row">
                            
                            <div class="ph-col-12"></div>  

                            <div class="ph-col-12 big"></div>  

                            <div class="ph-col-12 big"></div>  

                        </div>

                    </div>

                    <div class="ph-col-4">

                       <div class="ph-picture"></div> 

                       <div class="ph-row">
                            
                            <div class="ph-col-12"></div>  

                            <div class="ph-col-12 big"></div>  

                            <div class="ph-col-12 big"></div>  

                        </div>

                    </div>

                    <div class="ph-col-4">

                       <div class="ph-picture"></div> 

                       <div class="ph-row">
                            
                            <div class="ph-col-12"></div>  

                            <div class="ph-col-12 big"></div>  

                            <div class="ph-col-12 big"></div>  

                        </div>

                    </div>
                    
                </div>

            </div>

            
        <?php endforeach ?>

    </div>

    <section class="section team preloadFalse">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading heading--primary">
                        <h2 class="heading__title no-margin-bottom"><span>Nuestro</span> <span>equipo</span></h2>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">

                <?php 

                    foreach ($dataTeam as $key => $value) {
                        
                        echo '<div class="col-sm-6 col-lg-4 col-xl-3">
                                
                                <div class="team-item team-item--rounded">
                                    <ul class="team-item__socials">';

                                        foreach ($dataTeamSocial as $key => $value_) {

                                            if($value_['status'] != 0){

                                                echo '<li><a href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

                                            }

                                        }
                                        
                                    echo '</ul>
                                    <div class="team-item__img-holder"><img class="img--layout" src="'.$backoffice.'views/img/template/team.png" alt="'.$organization[0]->name_organization.'"/>
                                        <div class="team-item__img"><img class="img--bg" src="'.$backoffice.'views/img/team/'.$value->image_team.'" alt="'.$organization[0]->name_organization.'"/></div>
                                    </div>
                                    <div class="team-item__description">
                                        <div class="team-item__name"><a style="text-decoration:none" href="'.$path.$value->route_team.'">'.$value->name_team.'</a></div>
                                        <div class="team-item__position">'.$value->position_team.'</div>
                                    </div>
                                </div>
                                
                            </div>';

                    }

                ?>
              
                
            </div>

            <div class="row">
                <div class="col-12 text-center"><a class="button button--primary" href="<?php echo $path ?>teams">Ver más</a></div>
            </div>
        </div>
    </section>

    
<?php endif ?>

