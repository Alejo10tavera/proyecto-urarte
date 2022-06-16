<?php 

/*=============================================
Traer los datos del proyecto
=============================================*/
$select = "id_project,name_project,id_category_project,cover_project,phone_project,email_project,city_project,address_project,gallery_project,description_project,social_project,mission_project,vision_project,views_project,id_category,name_category";
$url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=route_project&equalTo=".$routesArray[1]."&linkTo_=status_project&equalTo_=1&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$infoDataProject = CurlController::request($url, $method, $fields, $header)->results;



?>

<?php if ($infoDataProject != "Not Found"): ?>

    <?php 

        /*=============================================
        Actualizar las vistas del proyecto
        =============================================*/

        $view = $infoDataProject[0]->views_project+1;

        $url = CurlController::api()."projects?id=".$infoDataProject[0]->id_project."&nameId=id_project&linkTo_=status_project&equalTo_=1&token=no&except=views_project";       
        $method = "PUT";
        $fields =  "views_project=".$view;
        $header = array();

        $updateViewsProject = CurlController::request($url, $method, $fields, $header);

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

    <section class="promo-primary promo-primary--elements preloadFalse">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/projects/<?php echo $infoDataProject[0]->id_category ?>/cover/<?php echo $infoDataProject[0]->cover_project ?>" media="(min-width: 992px)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/<?php echo $infoDataProject[0]->id_category ?>/cover/<?php echo $infoDataProject[0]->cover_project ?>" alt="<?php echo $infoDataProject[0]->name_project ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($infoDataProject[0]->name_category)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($infoDataProject[0]->name_project)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <section class="section elements preloadFalse">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <h4 class="elements__title"><?php echo TemplateController::capitalize(strtolower($infoDataProject[0]->name_project)) ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tabs horizontal-tabs cause-details-tabs">
                        <ul class="horizontal-tabs__header">
                            <li><a href="#horizontal-tabs__item-1"><span>Descripción</span></a></li>
                            <li><a href="#horizontal-tabs__item-2"><span>Información</span></a></li>
                            <li><a href="#horizontal-tabs__item-3"><span>Productos</span></a></li>
                            <li><a href="#horizontal-tabs__item-4"><span>Integrantes</span></a></li>
                            <li><a href="#horizontal-tabs__item-5"><span>Galeria</span></a></li>
                            <li><a href="#horizontal-tabs__item-6"><span>Donar</span></a></li>
                        </ul>
                        <div class="horizontal-tabs__content">                           

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-1">
                                <?php echo $infoDataProject[0]->description_project ?>
                            </div>

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-2">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-5">
                                            <div class="team-member__skills">
                                                <h4 class="team-member__title">Misión</h4>
                                                <p class="margin-bottom"><?php echo $infoDataProject[0]->mission_project ?></p>

                                                <h4 class="team-member__title">Visión</h4>
                                                <p class="margin-bottom"><?php echo $infoDataProject[0]->vision_project ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6 offset-xl-1">
                                            <div class="team-member__details">
                                                <h4 class="team-member__title">Datos de contacto</h4>
                                                <div class="team-member__details-item"><span>Teléfono:</span><span><a href="tel:<?php echo $infoDataProject[0]->phone_project ?>"><?php echo $infoDataProject[0]->phone_project ?></a></span></div>
                                                <div class="team-member__details-item"><span>Email:</span><span><a href="mailto:<?php echo $infoDataProject[0]->email_project ?>"><?php echo $infoDataProject[0]->email_project ?></a></span></div>
                                                <div class="team-member__details-item"><span>Ciudad:</span><span><?php echo $infoDataProject[0]->city_project ?></span></div>
                                                <div class="team-member__details-item"><span>Location:</span><span><?php echo $infoDataProject[0]->address_project ?></span></div>
                                                <div class="team-member__details-item">
                                                    <ul class="aside-socials no-margin-top">
                                                        <?php 

                                                            $infoDataProjectsSocial = json_decode($infoDataProject[0]->social_project,true);

                                                            foreach ($infoDataProjectsSocial as $key => $value_) {

                                                                if($value_['status'] != 0){

                                                                    echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

                                                                }

                                                            }
                                                            
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-3">

                                <div class="container">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row offset-30">

                                                <?php 

                                                    /*=============================================
                                                    Traer los productos del proyecto
                                                    =============================================*/
                                                    $select = "id_category_project,image_product,name_product,route_product,price_product,name_project";
                                                    $url = CurlController::api()."relations?rel=products,projects&type=product,project&linkTo=id_project_product&equalTo=".$infoDataProject[0]->id_project."&linkTo_=status_product&equalTo_=1&select=".$select;
                                                    $method = "GET";
                                                    $fields = array();
                                                    $header = array();

                                                    $infoProductProject = CurlController::request($url, $method, $fields, $header)->results;
                                                    
                                                    if($infoProductProject == "Not Found"){

                                                        echo '<div class="row align-items-end margin-bottom">
                                                            <div class="col-lg-12">
                                                                <div class="heading heading--primary">
                                                                    <h2 class="heading__title"><span>¡Lo sentimos!</span> </h2>
                                                                    <p class="no-margin-bottom">Actualmente este proyecto no cuenta con productos activos, estamos trabajando en mejorar constantemente </p>
                                                                </div>
                                                            </div>
                                                        </div>';

                                                    }else{

                                                        foreach ($infoProductProject as $key => $value) {
                                                            
                                                            echo '<div class="col-12 col-sm-6 col-md-3">
                                                                    <div class="shop-item">
                                                                        <div class="shop-item__img">
                                                                            <a class="shop-item__add" href="https://api.whatsapp.com/send?phone=57'.str_replace(' ', '',$infoDataProject[0]->phone_project).'&text=Hola,%20'.TemplateController::capitalize(strtolower($value->name_project)).'%20Estoy%20interesado%20en%20este%20producto%20'.TemplateController::capitalize(strtolower($value->name_product)).'" target="_blank">
                                                                            <svg class="icon">
                                                                                <use xlink:href="#bag"></use>
                                                                            </svg><span>Preguntar</span></a><img class="img--contain" src="'.$backoffice.'views/img/projects/'.$value->id_category_project.'/products/'.$value->image_product.'" alt="'.$value->name_project.'"/></div>
                                                                        <div class="shop-item__details">
                                                                            <h6 class="shop-item__name"><a href="'.$path.$value->route_product.'">'.TemplateController::capitalize(strtolower($value->name_product)).'</a></h6><span class="shop-item__price">$ '.number_format($value->price_product,0,",",".").'</span>
                                                                        </div>
                                                                    </div>
                                                                </div>';

                                                        }

                                                    }

                                                ?>

                                               
                                            </div>
                                            
                                        </div>
                                    </div>

                                    
                                </div>


                            </div>

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-4">

                                <div class="row offset-30">

                                    <?php 

                                        /*=============================================
                                        Traer los integrantes del proyecto
                                        =============================================*/
                                        $select = "name_member,position_member,image_member,id_category_project,name_project";
                                        $url = CurlController::api()."relations?rel=members,projects&type=member,project&linkTo=id_project_member&equalTo=".$infoDataProject[0]->id_project."&linkTo_=status_member&equalTo_=1&select=".$select;
                                        $method = "GET";
                                        $fields = array();
                                        $header = array();

                                        $infoMembersProject = CurlController::request($url, $method, $fields, $header)->results;

                                        if($infoMembersProject == "Not Found"){

                                            echo '<div class="row align-items-end margin-bottom">
                                                    <div class="col-lg-12">
                                                        <div class="heading heading--primary">
                                                            <h2 class="heading__title"><span>¡Lo sentimos!</span> </h2>
                                                            <p class="no-margin-bottom">Actualmente este proyecto no cuenta con integrantes activos, estamos trabajando en mejorar constantemente </p>
                                                        </div>
                                                    </div>
                                                </div>';

                                        }else{

                                            foreach ($infoMembersProject as $key => $value) {

                                                echo '<div class="col-md-6 col-xl-4">
                                        
                                                        <div class="donor-item">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-12">
                                                                    <div class="donor-item__info">
                                                                        <div class="donor-item__img"><img class="img--bg" src="'.$backoffice.'views/img/projects/'.$value->id_category_project.'/members/'.$value->image_member.'" alt="'.$value->name_project.'"/></div>
                                                                        <div class="donor-item__description">
                                                                            <div class="donor-item__name">'.TemplateController::capitalize(strtolower($value->name_member)).'</div>
                                                                            <div class="donor-item__date">'.TemplateController::capitalize(strtolower($value->position_member)).'</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>';
                                                
                                            }

                                        }                    
                                        
                                    ?>
                                    
                                </div>
                            </div>
                        

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-5">
                                <div class="gallery-simple">
                                    <div class="row offset-30">

                                        <?php 

                                            $infoGalleryProject = json_decode($infoDataProject[0]->gallery_project,true);                                    
                                            if ($infoGalleryProject != "") {

                                                foreach ($infoGalleryProject as $key => $value) {
                                                
                                                    echo '<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                                            <a class="gallery-simple__item" href="'.$backoffice.'views/img/projects/'.$infoDataProject[0]->id_category_project.'/gallery/'.$value.'" data-fancybox="simple-gallery">
                                                            <img class="img--bg" src="'.$backoffice.'views/img/projects/'.$infoDataProject[0]->id_category_project.'/gallery/'.$value.'" alt="'.$infoDataProject[0]->name_project.'"/></a>
                                                            </div>';
                                                    
                                                }

                                            }                                         

                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="horizontal-tabs__item" id="horizontal-tabs__item-6">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="donation-item">
                                                <div class="donation-item__body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="donation-item__title"><?php echo TemplateController::capitalize(strtolower($infoDataProject[0]->name_project)) ?></h5>
                                                        </div>
                                                    </div>
                                                    <form class="form donation-form" action="javascript:void(0);">
                                                        <div class="row align-items-baseline margin-bottom">
                                                            <div class="col-lg-5 col-xl-6">
                                                                <label class="form__label"><span class="form__icon">$</span>
                                                                    <input class="form__field form__input-number" type="number"/>
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-7 col-xl-6 text-lg-right">
                                                                <label class="form__radio-label"><span class="form__label-text">$ 10.000</span>
                                                                    <input class="form__input-radio" type="radio" name="value-select" value="100" checked="checked"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                                <label class="form__radio-label"><span class="form__label-text">$ 20.000</span>
                                                                    <input class="form__input-radio" type="radio" name="value-select" value="200"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                                <label class="form__radio-label"><span class="form__label-text">$ 50.000</span>
                                                                    <input class="form__input-radio" type="radio" name="value-select" value="500"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                                <label class="form__radio-label"><span class="form__label-text">$ 100.000</span>
                                                                    <input class="form__input-radio" type="radio" name="value-select" value="1000"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row margin-bottom">
                                                            <div class="col-12">
                                                                <h6 class="form__title">Método de pago</h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form__radio-label"><img class="form__label-img" src="<?php echo $backoffice ?>views/img/template/paypal.png" alt="paypal"/>
                                                                    <input class="form__input-radio" type="radio" name="method-select" value="paypal" checked="checked"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                                <label class="form__radio-label"><img class="form__label-img" src="<?php echo $backoffice ?>views/img/template/klarna.png" alt="klarna"/>
                                                                    <input class="form__input-radio" type="radio" name="method-select" value="klarna"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                                <label class="form__radio-label"><img class="form__label-img" src="<?php echo $backoffice ?>views/img/template/visa.png" alt="visa"/>
                                                                    <input class="form__input-radio" type="radio" name="method-select" value="visa"/><span class="form__radio-mask form__radio-mask"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h6 class="form__title">Información personal</h6>
                                                            </div>
                                                            <div class="col-lg-4 margin-30">
                                                                <input class="form__field" type="text" name="first-name" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-lg-4 margin-30">
                                                                <input class="form__field" type="text" name="last-name" placeholder="Last Name"/>
                                                            </div>
                                                            <div class="col-lg-4 margin-30">
                                                                <input class="form__field" type="email" name="email" placeholder="Email"/>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <button class="form__submit" type="submit">Donar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php else: ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">¡Lo sentimos!</h1>
            <p class="lead">No hay información para esta página, agradecemos tu compresión.</p>
        </div>
    </div>

<?php endif ?>