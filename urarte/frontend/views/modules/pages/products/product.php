<?php 

/*=============================================
Traer los datos del proyecto
=============================================*/
$select = "id_product,id_project_product,name_product,route_product,description_product,gallery_product,details_product,price_product,views_project,id_project,name_project,id_category_project,cover_project,phone_project";
$url = CurlController::api()."relations?rel=products,projects&type=product,project&linkTo=route_product&equalTo=".$routesArray[1]."&linkTo_=status_product&equalTo_=1&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$infoDataProduct = CurlController::request($url, $method, $fields, $header)->results;

/*=============================================
Actualizar las vistas del producto
=============================================*/

$view = $infoDataProduct[0]->views_project+1;

$url = CurlController::api()."products?id=".$infoDataProduct[0]->id_product."&nameId=id_product&linkTo_=status_product&equalTo_=1&token=no&except=views_product";       
$method = "PUT";
$fields =  "views_product=".$view;
$header = array();

$updateViewsProduct = CurlController::request($url, $method, $fields, $header);

?>    

<?php if ($infoDataProduct != "Not Found"): ?>

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

    <section class="promo-primary promo-primary--elements preloadFalse">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/projects/<?php echo $infoDataProduct[0]->id_category_project ?>/cover/<?php echo $infoDataProduct[0]->cover_project ?>" media="(min-width: 992px)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/<?php echo $infoDataProduct[0]->id_category_project ?>/cover/<?php echo $infoDataProduct[0]->cover_project ?>" alt="<?php echo $infoDataProduct[0]->name_project ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($infoDataProduct[0]->name_project)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($infoDataProduct[0]->name_product)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <!-- shop product start-->
    <section class="section shop-product background--brown preloadFalse">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0">
                    <!-- dual slider start-->
                    <div class="dual-slider">
                        <div class="main-slider">
                            <?php 

                                $infoGalleryProduct = json_decode($infoDataProduct[0]->gallery_product,true);

                                if ($infoGalleryProduct != "") {

                                    foreach ($infoGalleryProduct as $key => $value) { 
                                        
                                        echo '<div class="main-slider__item">
                                                <div class="main-slider__img"><img class="img--contain" src="'.$backoffice.'views/img/projects/'.$infoDataProduct[0]->id_category_project.'/products/gallery/'.$value.'" alt="'.$infoDataProduct[0]->name_project.'"/></div>
                                            </div>';

                                    }

                                }

                            ?>
                            
                        </div>

                        <?php if ($infoGalleryProduct != ""): ?>

                            <div class="nav-slider">

                                <?php 

                                    foreach ($infoGalleryProduct as $key => $value) { 

                                        echo '<div class="nav-slider__item">
                                                <div class="nav-slider__img"><img class="img--contain" src="'.$backoffice.'views/img/projects/'.$infoDataProduct[0]->id_category_project.'/products/gallery/'.$value.'" alt="'.$infoDataProduct[0]->name_project.'"/></div>
                                            </div>';

                                    }

                                ?>
                                
                            </div>
                            
                        <?php endif ?>

                    </div>
                    <!-- dual slider end-->
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-1">
                    <div class="shop-product__top">
                        <h3 class="shop-product__name"><?php echo TemplateController::capitalize(strtolower($infoDataProduct[0]->name_product)) ?></h3>
                        <h4 class="shop-product__price">$ <?php echo number_format($infoDataProduct[0]->price_product,0,",",".") ?></h4>
                    </div>
                    <div class="shop-product__description">
                        <h6 class="shop-product__title">Descripción</h6>
                        <p><?php echo $infoDataProduct[0]->description_product ?></p>
                        <ul class="shop-product__list">
                            <?php 

                                $infoDetailsProduct = json_decode($infoDataProduct[0]->details_product,true);

                                if ($infoDetailsProduct != "") {

                                    foreach ($infoDetailsProduct as $key => $value) {
                                    
                                        echo '<li>'.$value["title"].': '.$value["value"].'</li>';

                                    }

                                }

                            ?>
                            
                        </ul>
                        <form class="form product-form" action="javascript:void(0);" autocomplete="off">
                            <div class="form__wrapper">

                                <?php 

                                    echo '<a class="button causes-item__button button--primary" href="https://api.whatsapp.com/send?phone=57'.str_replace(' ', '',$infoDataProduct[0]->phone_project).'&text=Hola,%20'.$infoDataProduct[0]->name_project.'%20Estoy%20interesado%20en%20este%20producto%20'.$infoDataProduct[0]->name_product.'" target="_blank">Preguntar</a>';

                                ?>
                                
                                    
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop product end-->
    <?php 

        /*=============================================
        Traer los proyectos relacionados
        =============================================*/
        $select = "id_category_project,image_product,name_product,route_product,price_product,name_project";
        $url = CurlController::api()."relations?rel=products,projects&type=product,project&linkTo=id_project_product&equalTo=".$infoDataProduct[0]->id_project."&linkTo_=status_product&equalTo_=1&select=".$select;
        $method = "GET";
        $fields = array();
        $header = array();

        $productsRelated = CurlController::request($url, $method, $fields, $header)->results;

    ?>

    <?php if ($productsRelated != "Not Found"): ?>

        <div class="container-fluid preloadTrue">

            <?php 

                $blocks = [0];

            ?>

            <?php foreach ($blocks as $key => $value): ?>

                <div class="container">

                    <div class="row">
                        <div class="col-12 col-sm-3">

                            <div class="ph-item border-0">
                                <div class="ph-col-12">
                                    <div class="ph-picture"></div>
                                    <div class="ph-row">
                                        <div class="ph-col-4"></div>
                                        <div class="ph-col-8 empty"></div>
                                        <div class="ph-col-12"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-3">

                            <div class="ph-item border-0">
                                <div class="ph-col-12">
                                    <div class="ph-picture"></div>
                                    <div class="ph-row">
                                        <div class="ph-col-4"></div>
                                        <div class="ph-col-8 empty"></div>
                                        <div class="ph-col-12"></div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-12 col-sm-3">

                            <div class="ph-item border-0">
                                <div class="ph-col-12">
                                    <div class="ph-picture"></div>
                                    <div class="ph-row">
                                        <div class="ph-col-4"></div>
                                        <div class="ph-col-8 empty"></div>
                                        <div class="ph-col-12"></div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-12 col-sm-3">

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
                
            <?php endforeach ?>
            
        </div>

        <section class="section background--brown preloadFalse">
            <div class="container">
                <div class="row align-items-end margin-bottom">
                    <div class="col-md-7 col-lg-8">
                        <div class="heading heading--primary">
                            <h2 class="heading__title no-margin-bottom"><span>Productos</span> <span>relacionados</span></h2>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 text-md-right">
                        <!-- slider nav start-->
                        <div class="slider__nav related-slider__nav">
                            <div class="slider__arrows">
                                <div class="slider__prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                                <div class="slider__next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <!-- slider nav end-->
                    </div>
                </div>
                <div class="row offset-margin">
                    <div class="col-12">
                        <div class="related-slider">

                            <?php 

                                foreach ($productsRelated as $key => $value) {

                                    echo '<div class="related-slider__item">
                                            <div class="shop-item">
                                                <div class="shop-item__img">
                                                    <a class="shop-item__add" href="https://api.whatsapp.com/send?phone=57'.str_replace(' ', '',$infoDataProduct[0]->phone_project).'&text=Hola,%20'.TemplateController::capitalize(strtolower($value->name_project)).'%20Estoy%20interesado%20en%20este%20producto%20'.TemplateController::capitalize(strtolower($value->name_product)).'" target="_blank">
                                                    <svg class="icon">
                                                        <use xlink:href="#bag"></use>
                                                    </svg><span>Preguntar</span></a><img class="img--contain" src="'.$backoffice.'views/img/projects/'.$value->id_category_project.'/products/'.$value->image_product.'" alt="'.$value->name_project.'"/></div>
                                                <div class="shop-item__details">
                                                    <h6 class="shop-item__name"><a href="'.$path.$value->route_product.'">'.TemplateController::capitalize(strtolower($value->name_product)).'</a></h6><span class="shop-item__price">$ '.number_format($value->price_product,0,",",".").'</span>
                                                </div>
                                            </div>
                                        </div>';

                                }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>



    <?php endif ?>

<?php else: ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">¡Lo sentimos!</h1>
            <p class="lead">No hay información para esta página, agradecemos tu compresión.</p>
        </div>
    </div>

<?php endif ?>