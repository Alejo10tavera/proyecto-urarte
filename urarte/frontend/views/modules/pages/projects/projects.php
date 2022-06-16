<?php 

    /*=============================================
    Traer los datos de la pagina
    =============================================*/
    $select = "name_page,word_page,image_page,status_page";
    $url = CurlController::api()."pages?linkTo=route_page&equalTo=projects&linkTo_=bdelete_page&equalTo_=0&select=".$select;
    $method = "GET";
    $fields = array();
    $header = array();

    $pageProjects = CurlController::request($url, $method, $fields, $header)->results;
    
?>

<?php if ($pageProjects[0]->status_page != 0): ?>

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
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageProjects[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageProjects[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageProjects[0]->word_page)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageProjects[0]->name_page)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue">

        <?php 

            $blocks = [0,1];

        ?>

        <?php foreach ($blocks as $key => $value): ?>

            <div class="container">

                <div class="row">
                    <div class="col-12 col-sm-4">

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
                    <div class="col-12 col-sm-4">

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
                    <div class="col-12 col-sm-4">

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

    <!-- causes inner start-->
    <section class="section causes-inner preloadFalse">
        <div class="container">

            <div class="row align-items-end margin-bottom">
                <div class="col-lg-12">
                    <div class="heading heading--primary">
                        <h2 class="heading__title"><span>Proyectos</span> <span>Urarte</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-baseline">
                <div class="col-5"><span class="shop__aside-trigger">Filtros</span></div>
                <div class="col-7 text-right">
                    <!-- shop filter start-->
                    <ul class="shop-filter">
                        <li class="shop-filter__item shop-filter__item--active"><span>Ordenar</span>
                            <ul class="shop-filter__sub-list">
                                <?php
                    
                                    echo '<li><a href="'.$path.$urlParams[0].'/1/recientes">Más reciente</a></li>
                                          <li><a href="'.$path.$urlParams[0].'/1/antiguos">Más antiguo</a></li>';

                                ?>
                            </ul>
                        </li>
                    </ul>
                    <!-- shop filter end        -->
                </div>
            </div>

            <div class="row offset-margin">

                <?php 

                    /*Llamado de páginación*/

                    if (isset($routesArray[1])) {                            
                        
                        if (isset($routesArray[2])) {
                            
                            if(isset($routesArray[3])){

                                if($routesArray[3] == "antiguos"){

                                    $orderMode = "ASC";

                                }else{

                                    $orderMode = "DESC";

                                }
                                
                            }else{

                                $orderMode = "DESC";
                                
                            }
                            
                            
                            $startAt = ($routesArray[2] - 1)*6;
                            $endAt = 6;        

                        }else{

                            $orderMode = "DESC";
                            $startAt = 0;                
                            $endAt = 6;

                        }     

                    }else{
                        
                        $orderMode = "ASC";
                        $startAt = 0;           
                        $endAt = 6;            

                    }

                    if($routesArray[1] == "projects"){

                        $select = "*";
                        $url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=status_project&equalTo=1&linkTo_=bdelete_project&equalTo_=0&orderBy=id_project&orderMode=".$orderMode."&startAt=".$startAt."&endAt=".$endAt."&select=".$select;
                        
                    }else{

                        $select = "*";
                        $url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=route_category&equalTo=".$routesArray[1]."&linkTo_=status_project&equalTo_=1&orderBy=id_project&orderMode=".$orderMode."&startAt=".$startAt."&endAt=".$endAt."&select=".$select;

                    }
                    
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $dataProjects = CurlController::request($url, $method, $fields, $header)->results;
                                     
                                            
                    if($dataProjects == "Not Found"){

                        echo '<div class="row align-items-end margin-bottom">
                                <div class="col-lg-12">
                                    <div class="heading heading--primary">
                                        <h2 class="heading__title"><span>¡Lo sentimos!</span> </h2>
                                        <p class="no-margin-bottom">Actualmente no contamos con proyectos para mostrar, estamos trabajando en mejorar constantemente </p>
                                    </div>
                                </div>
                            </div>';

                    }else{
                    
                        if($routesArray[1] != "projects"){
                        
                            /*=============================================
                            Actualizar las vistas de categorías
                            =============================================*/

                            $view = $dataProjects[0]->views_category+1;
                            
                            $url = CurlController::api()."categories?id=".$dataProjects[0]->id_category."&nameId=id_category&linkTo_=status_category&equalTo_=1&token=no&except=views_category";       
                            $method = "PUT";
                            $fields =  "views_category=".$view;
                            $header = array();

                            $updateViewsCategory = CurlController::request($url, $method, $fields, $header);

                        }

                        $dataProjectsSocial = json_decode($dataProjects[0]->social_project,true); 

                        foreach ($dataProjects as $key => $value) {

                            echo '<div class="col-md-6 col-lg-4">
                                <div class="causes-item causes-item--primary">
                                    <div class="causes-item__body">
                                        <div class="causes-item__top">
                                            <h6 class="causes-item__title"> <a href="'.$path.$value->route_project.'">'.TemplateController::capitalize(strtolower($value->name_project)).'</a></h6>
                                            <p>'.$value->headline_project.'</p>
                                        </div>
                                        <div class="causes-item__img">
                                            <div class="causes-item__badge" style="background-color: '.$value->color_category.'">'.TemplateController::capitalize(strtolower($value->name_category)).'</div><img class="img--bg" src="'.$backoffice.'views/img/projects/'.$value->id_category.'/logo/'.$value->logo_project.'" alt="'.$value->name_project.'"/>
                                        </div>
                                        <div class="causes-item__lower">
                                            <div class="causes-item__details-holder">
                                                <ul class="aside-socials">';

                                                    foreach ($dataProjectsSocial as $key => $value_) {

                                                        if($value_['status'] != 0){

                                                            echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

                                                        }

                                                    }
                                                echo '</ul>
                                            </div>
                                            <div class="causes-item__details-holder">
                                                <div class="causes-item__details-item"><span>Productos: </span><span>'.$value->product_project.'</span></div>
                                                <div class="causes-item__details-item text-right"><span>Visitas: </span><span> '.$value->views_project.'</span></div>
                                            </div>
                                        </div>
                                    </div><a class="button causes-item__button button--primary" href="'.$path.$value->route_project.'">Ver más</a>
                                </div>
                            </div>';

                        }

                    }

                ?>

            </div>
        </div>

        <!-- Paginación -->

        <?php if ($dataProjects != "Not Found"): ?>

            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <?php 

                            if($routesArray[1] == "projects"){

                                $select = "*";
                               $url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=status_project&equalTo=1&linkTo_=bdelete_project&equalTo_=0&select=".$select;

                            }else{

                                $select = "*";
                                $url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=route_category&equalTo=".$routesArray[1]."&linkTo_=status_project&equalTo_=1&orderBy=id_project&orderMode=DESC&select=".$select;

                            }

                            $method = "GET";
                            $fields = array();
                            $header = array();

                            $dataTotalProject = CurlController::request($url, $method, $fields, $header)->total; 

                            if($dataTotalProject != 0){
                                
                                $pageProjects = ceil($dataTotalProject/6);
                                
                                if ($pageProjects > 2) {

                                    /*=============================================
                                    LOS BOTONES DE LAS PRIMERAS 2 PÁGINAS Y LA ÚLTIMA PÁG
                                    =============================================*/

                                    if(!isset($routesArray[2]) || $routesArray[2] == 1){                                    
                                        

                                        echo '<ul class="pagination">';
                                        
                                            for($i = 1; $i <= 2; $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                        echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>

                                               <li class="pagination__item" id="item'.$pageProjects.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageProjects.'"><span>'.$pageProjects.'</span></a></li>

                                               <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/2"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                        </ul>';

                                    }

                                    /*=============================================
                                    LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                                    =============================================*/

                                    else if($routesArray[2] != $pageProjects &&                                 
                                            $routesArray[2] != 1 &&
                                            $routesArray[2] <  ($pageProjects/2) &&
                                            $routesArray[2] < ($pageProjects-2)
                                            ){

                                            $numPagCurrent = $routesArray[2];

                                            echo '<ul class="pagination">
                                                  <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> ';
                                        
                                            for($i = $numPagCurrent; $i <= ($numPagCurrent+2); $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                            echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                                   <li class="pagination__item" id="item'.$pageProjects.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageProjects.'"><span>'.$pageProjects.'</span></a></li>
                                                   <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent+1).'"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                            </ul>';

                                    }

                                    /*=============================================
                                    LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                                    =============================================*/

                                    else if($routesArray[2] != $pageProjects && 
                                            $routesArray[2] != 1 &&
                                            $routesArray[2] >=  ($pageProjects/2) &&
                                            $routesArray[2] < ($pageProjects-2)
                                            ){

                                            $numPagCurrent = $routesArray[2];
                                        
                                            echo '<ul class="pagination">
                                               <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> 
                                               <li class="pagination__item" id="item1"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/1"><span>1</span></a></li>
                                               <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                            ';
                                        
                                            for($i = $numPagCurrent; $i <= ($numPagCurrent+2); $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                            echo '  <li class="pagination__item pagination__item--next"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent+1).'"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>
                                                </ul>';
                                    }

                                    /*=============================================
                                    LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
                                    =============================================*/

                                    else{

                                       $numPagCurrent = $routesArray[2];

                                        echo '<ul class="pagination">

                                               <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> 

                                               <li class="pagination__item" id="item1"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/1"><span>1</span></a></li>

                                               <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                            ';
                                        
                                        for($i = ($pageProjects-2); $i <= $pageProjects; $i ++){

                                            echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                        echo ' </ul>';

                                    }

                                    
                                }else{

                                    echo '<ul class="pagination">';

                                        for($i = 1; $i <= $pageProjects; $i ++){

                                            echo '<li id="item'.$i.'" class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                    echo '</ul>';

                                }

                            }
                                                    
                        ?>
                    </div>
                </div>
            </div>
            
        <?php endif ?>

            

    </section>
    <!-- causes inner end-->
    
<?php endif ?>