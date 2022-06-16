<?php 

/*=============================================
Traer los datos del evento
=============================================*/
$select = "*";
$url = CurlController::api()."events?linkTo=route_event&equalTo=".$routesArray[1]."&linkTo_=status_event&equalTo_=1&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$dataEvent = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($dataEvent != "Not Found"): ?>

    <?php 

        $hoy = date('Y-m-d');                       

        $details = json_decode($dataEvent[0]->details_event,true); 

        $organizer = json_decode($dataEvent[0]->organizer_event,true); 

        $venue = json_decode($dataEvent[0]->venue_event,true);   

    ?>

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
    
    <section class="promo-primary preloadFalse">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/events/cover/<?php echo $dataEvent[0]->cover_event ?>" style="filter: brightness(50%)" media="(min-width: 992px)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/events/cover/<?php echo $dataEvent[0]->cover_event ?>" style="filter: brightness(50%)" alt="<?php echo $dataEvent[0]->name_event ?>"/>
        </picture>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($dataEvent[0]->name_event)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <!-- article start-->
    <section class="section article preloadFalse"><img class="article__bg" src="<?php echo $backoffice ?>views/img/template/events_inner-bg.png" alt="<?php echo $organization[0]->name_organization ?>"/>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="article__img"><img src="<?php echo $backoffice ?>views/img/events/post/<?php echo $dataEvent[0]->image_event ?>" alt="<?php echo $dataEvent[0]->name_event ?>"/></div>

                    <?php echo $dataEvent[0]->description_event ?>

                    <div class="article-information">
                        <div class="row offset-30">
                            <div class="col-sm-6 col-lg-4">
                                <div class="article-information__item" style="background: #32C876;">
                                    <h6 class="article-information__title">Detalles</h6>
                                    <div class="article-information__details">
                                        <div class="article-information__details-item"><span>Inicio:</span><span><?php echo $details[0]["start"] ?></span></div>
                                        <div class="article-information__details-item"><span>Final:</span><span><?php echo $details[1]["finish"] ?></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="article-information__item" style="background: #F76588;">
                                    <h6 class="article-information__title">Organizador</h6>
                                    <div class="article-information__details">
                                        <div class="article-information__details-item"><span>Télefono:</span><a href="tel:<?php echo $organizer[0]["phone"] ?>"><?php echo $organizer[0]["phone"] ?></a></div>
                                        <div class="article-information__details-item"><span>Correo:</span><a href="<?php echo $organizer[1]["email"] ?>"><?php echo $organizer[1]["email"] ?></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="article-information__item" style="background: #49C2DF;">
                                    <h6 class="article-information__title">Dirección</h6>
                                    <div class="article-information__details">
                                        <div class="article-information__details-item"><span><?php echo $venue[1]["city"] ?>,</span><span><?php echo $venue[0]["address"] ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- article end-->
<?php else: ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">¡Lo sentimos!</h1>
            <p class="lead">No hay información para esta página, agradecemos tu compresión.</p>
        </div>
    </div>

<?php endif ?>
    