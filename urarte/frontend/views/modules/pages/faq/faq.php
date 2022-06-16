<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=faq&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageFaq = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageFaq[0]->status_page != 0): ?>

    <?php 

        /*=============================================
        Traer las preguntas
        =============================================*/
        $select = "name_question,response_question";
        $url = CurlController::api()."questions?linkTo=approved_question&equalTo=1&linkTo_=status_question&equalTo_=1&select=".$select;
        $method = "GET";
        $fields = array();
        $header = array();

        $dataQuestion = CurlController::request($url, $method, $fields, $header)->results;

    ?>

    <?php if ($dataQuestion != "Not Found"): ?>

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
                <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageFaq[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageFaq[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
            </picture>
            <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageFaq[0]->word_page)) ?></span></div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                                <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageFaq[0]->name_page)) ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
           <div class="spinner-border text-muted my-5"></div>

        </div>

        <!-- faq start-->
        <section class="section faq preloadFalse">
            <div class="container">
                <div class="row margin-bottom">
                    <div class="col-12">
                        <div class="heading heading--primary"><span class="heading__pre-title">Faq</span>
                            <h2 class="heading__title no-margin-bottom"><span>Preguntas</span> <span>generales</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-xl-9">

                        <?php 

                            
                            foreach ($dataQuestion as $key => $value) {

                                echo '<div class="accordion accordion--primary">
                                        <div class="accordion__title-block">
                                            <h6 class="accordion__title">'.$value->name_question.'</h6><span class="accordion__close"></span>
                                        </div>
                                        <div class="accordion__text-block">
                                            <p>'.$value->response_question.'</p>
                                        </div>
                                    </div>';
                                
                            }

                        ?>

                        
                       
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="faq-aside"><img class="img--bg" style="filter: brightness(50%)" src="<?php echo $backoffice ?>views/img/template/faq.jpg" alt="<?php echo $organization[0]->name_organization ?>"/>
                            
                            <p>¿Tienes una pregunta puedes?</p><a class="faq-aside__link" href="#">Preguntar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else: ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">¡Lo sentimos!</h1>
                <p class="lead">Actualmente no contamos con información para esta página, agradecemos tu compresion. Nos encontramos trabajando para mejorar</p>
            </div>
        </div>
        
    <?php endif ?>
    
<?php endif ?>