<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=categories&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageCategories = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageCategories[0]->status_page != 0): ?>

    <!-- Banner  -->
    <section class="promo-primary">
        <picture>
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageCategories[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageCategories[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo $pageCategories[0]->word_page ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo $pageCategories[0]->name_page ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 


        /*Llamado de páginación*/

        if (isset($routesArray[1])) {
            
            
            if (isset($routesArray[2])) {


                $startAt = ($routesArray[2] - 1)*6;
                $endAt = 6;        
                

            }else{

                $startAt = 0;                
                $endAt = 6;

            }     

        }else{

            
            $startAt = 0;            
            
            $endAt = 6;
            

        }


        $select = "*";
        $url = CurlController::api()."categories?linkTo=type_category&equalTo=1&linkTo_=status_category&equalTo_=1&orderBy=id_category&orderMode=ASC&startAt=".$startAt."&endAt=".$endAt."&select=".$select;
        
        $method = "GET";
        $fields = array();
        $header = array();

        $dataCategory = CurlController::request($url, $method, $fields, $header)->results; 
        
        
    ?>

    <!-- causes inner start-->
    <section class="section causes-inner">
        <div class="container">
            <div class="row offset-margin">

                <?php 

                    foreach ($dataCategory as $key => $value) {
                        
                        echo '<div class="col-md-8 offset-md-2 col-lg-12 offset-lg-0">
                                <div class="causes-item causes-item--style-3">
                                    <div class="causes-item__body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5 col-xl-4">
                                                <div class="causes-item__img"><img class="img--bg" src="'.$backoffice.'views/img/categories/'.$value->image_category.'" alt="'.$value->name_category.'"/></div>
                                            </div>
                                            <div class="col-lg-7 col-xl-8">
                                                <div class="causes-item__action">
                                                    <div class="causes-item__badge" style="background-color: '.$value->color_category.'">'.$value->id_category.'</div><a class="causes-item__link" href="'.$value->route_category.'">Proyectos</a>
                                                </div>
                                                <div class="causes-item__top">
                                                    <h6 class="causes-item__title"> <a href="'.$value->route_category.'">'.$value->name_category.'</a></h6>
                                                    <p>'.$value->description_category.'</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                    }

                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php 

                        $select = "id_category";
                        $url = CurlController::api()."categories?linkTo=type_category&equalTo=1&linkTo_=status_category&equalTo_=1&orderBy=id_category&orderMode=ASC&select=".$select;
                        $method = "GET";
                        $fields = array();
                        $header = array();

                        $dataTotalCategory = CurlController::request($url, $method, $fields, $header)->total; 

                        if($dataTotalCategory != 0){
                            
                            $pageCategories = ceil($dataTotalCategory/6);
                            
                            if ($pageCategories > 2) {

                                /*=============================================
                                LOS BOTONES DE LAS PRIMERAS 2 PÁGINAS Y LA ÚLTIMA PÁG
                                =============================================*/

                                if(!isset($routesArray[2]) || $routesArray[2] == 1){                                    
                                    

                                    echo '<ul class="pagination">';
                                    
                                        for($i = 1; $i <= 2; $i ++){

                                            echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                    echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>

                                           <li class="pagination__item" id="item'.$pageCategories.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageCategories.'"><span>'.$pageCategories.'</span></a></li>

                                           <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/2"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                    </ul>';

                                }

                                /*=============================================
                                LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                                =============================================*/

                                else if($routesArray[2] != $pageCategories &&                                 
                                        $routesArray[2] != 1 &&
                                        $routesArray[2] <  ($pageCategories/2) &&
                                        $routesArray[2] < ($pageCategories-2)
                                        ){

                                        $numPagCurrent = $routesArray[2];

                                        echo '<ul class="pagination">
                                              <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> ';
                                    
                                        for($i = $numPagCurrent; $i <= ($numPagCurrent+2); $i ++){

                                            echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                        echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                               <li class="pagination__item" id="item'.$pageCategories.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageCategories.'"><span>'.$pageCategories.'</span></a></li>
                                               <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent+1).'"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                        </ul>';

                                }

                                /*=============================================
                                LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                                =============================================*/

                                else if($routesArray[2] != $pageCategories && 
                                        $routesArray[2] != 1 &&
                                        $routesArray[2] >=  ($pageCategories/2) &&
                                        $routesArray[2] < ($pageCategories-2)
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
                                    
                                    for($i = ($pageCategories-2); $i <= $pageCategories; $i ++){

                                        echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                    }

                                    echo ' </ul>';

                                }

                                
                            }else{

                                echo '<ul class="pagination">';

                                    for($i = 1; $i <= $pageCategories; $i ++){

                                        echo '<li id="item'.$i.'" class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                    }

                                echo '</ul>';

                            }

                        }
                                                
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- causes inner end-->

<?php endif ?>
