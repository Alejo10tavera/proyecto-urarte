<?php 

    
    /*=============================================
    Traer los datos de la pagina
    =============================================*/
    $select = "*";
    $url = CurlController::api()."teams?linkTo=route_team&equalTo=".$routesArray[1]."&linkTo_=bdelete_team&equalTo_=0&select=".$select;
    $method = "GET";
    $fields = array();
    $header = array();

    $dataTeam = CurlController::request($url, $method, $fields, $header)->results;
        
    $contactTeam = json_decode($dataTeam[0]->contact_team,true);         
    $socialTeam = json_decode($dataTeam[0]->social_team,true);
        
?>

<!-- section start-->
<section class="section team-member no-padding-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-5">
                <div class="img-box"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/about_layout-reverse.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                    <div class="img-box__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/team/<?php echo $dataTeam[0]->image_team ?>" alt="<?php echo $organization[0]->name_organization ?>"/></div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 offset-xl-1">
                <div class="heading heading--primary"><span class="heading__pre-title"><?php echo $dataTeam[0]->position_team ?></span>
                    <h2 class="heading__title"><span><?php echo $dataTeam[0]->name_team ?></span></h2>
                    <?php echo $dataTeam[0]->description_team ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section team-member">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5">
                <div class="team-member__skills">
                    <h4 class="team-member__title">Habilidades</h4>
                    <p class="margin-bottom"><?php echo $dataTeam[0]->skill_team ?></p>
                    
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 offset-xl-1">
                <div class="team-member__details">
                    <h4 class="team-member__title">Contacto</h4>
                    <div class="team-member__details-item"><span>Phone:</span><span><a href="tel:<?php echo $contactTeam[1]["phone"] ?>"><?php echo $contactTeam[1]["phone"] ?></a></span></div>
                    <div class="team-member__details-item"><span>Email:</span><span><a href="mailto:<?php echo $contactTeam[0]["email"] ?>"><?php echo $contactTeam[0]["email"] ?></a></span></div>
                    <div class="team-member__details-item">
                        <ul class="aside-socials no-margin-top">
                            <?php 

                                foreach ($socialTeam as $key => $value_) {

                                        if($value_['status'] != 0){

                                            echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

                                        }

                                    }

                            ?>
                        </ul>
                    </div>

                    <?php if ($dataTeam[0]->link_team != ""): ?>

                        <a class="button button--primary" href="https://api.whatsapp.com/send?phone=<?php echo $dataTeam[0]->link_team ?>">Contactar</a>
                        
                    <?php endif ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end-->
