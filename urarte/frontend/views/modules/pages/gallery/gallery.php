<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=gallery&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageGallery = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageGallery[0]->status_page != 0): ?>

    <?php 

        /*=============================================
        Traer las imagenes
        =============================================*/
        $select = "category_gallery,image_gallery,title_gallery";
        $url = CurlController::api()."galleries?linkTo=status_gallery&equalTo=1&linkTo_=bdelete_gallery&equalTo_=0&select=".$select;
        $method = "GET";
        $fields = array();
        $header = array();

        $dataGallery = CurlController::request($url, $method, $fields, $header)->results;

    ?>

    <?php if ($dataGallery != "Not Found"): ?>

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
                <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageGallery[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageGallery[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
            </picture>
            <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageGallery[0]->word_page)) ?></span></div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                                <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageGallery[0]->name_page)) ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
           <div class="spinner-border text-muted my-5"></div>

        </div>

        <!-- gallery start-->
        <section class="section gallery preloadFalse">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- filter panel start-->
                        <ul class="filter-panel">
                            <li class="filter-panel__item filter-panel__item--active" data-filter="*"><span>Todas</span></li>
                            <li class="filter-panel__item" data-filter=".category_1"><span>Proyectos</span></li>
                            <li class="filter-panel__item" data-filter=".category_2"><span>Eventos</span></li>
                            <li class="filter-panel__item" data-filter=".category_3"><span>Festivales</span></li>
                            <li class="filter-panel__item" data-filter=".category_4"><span>Otros</span></li>
                        </ul>
                        <!-- filter panel end-->
                    </div>
                </div>
            </div>

            <div class="row no-gutters gallery-masonry">

                <?php 

                    foreach ($dataGallery as $key => $value) {

                        $rand = rand(1,3);
                                            
                        echo '<div class="col-6 col-md-4 gallery-masonry__item category_'.$value->category_gallery.'">

                                <a class="gallery-masonry__img gallery-masonry__item--height-'.$rand.'" href="'.$backoffice.'views/img/gallery/'.$value->image_gallery.'" data-fancybox="gallery">

                                    <img class="img--bg" src="'.$backoffice.'views/img/gallery/'.$value->image_gallery.'" alt="'.$organization[0]->name_organization.'"/>
                                    <h6 class="gallery-masonry__description">'.$value->title_gallery.'</h6>
                                </a>

                            </div>';

                    }
                    
                ?>

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