<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=events&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageEvents = CurlController::request($url, $method, $fields, $header)->results;


?>

<?php if ($pageEvents[0]->status_page != 0): ?>

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
        $url = CurlController::api()."events?linkTo=process_event&equalTo=1&linkTo_=status_event&equalTo_=1&orderBy=id_event&orderMode=DESC&startAt=".$startAt."&endAt=".$endAt."&select=".$select;
        
        $method = "GET";
        $fields = array();
        $header = array();

        $dataEvents = CurlController::request($url, $method, $fields, $header)->results; 


    ?>

    <?php if ($dataEvents != "Not Found"): ?>

        <!-- Banner  -->
        <section class="promo-primary">
            <picture>
                <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageEvents[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageEvents[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
            </picture>
            <div class="promo-primary__description"> <span><?php echo $pageEvents[0]->word_page ?></span></div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                                <h1 class="promo-primary__title"><span><?php echo $pageEvents[0]->name_page ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- events inner start-->
        <section class="section events-inner"><img class="events-inner__bg" src="<?php echo $backoffice ?>views/img/template/events_inner-bg.png" alt="<?php echo $organization[0]->name_organization ?>"/>
            <div class="container">
                <div class="row offset-30">

                    <?php 

                        foreach ($dataEvents as $key => $value) {

                            $hoy = date('Y-m-d');                       

                            $details = json_decode($value->details_event,true); 

                            $originalDate = $details[0]["start"];                        
                            $timestamp = strtotime($originalDate); 
                            $newDate = date("Y-m-d", $timestamp );
                                                    
                            $date1 = new DateTime($hoy);
                            $date2 = new DateTime($newDate);
                            $diff = $date1->diff($date2);                        
                            
                            $venue = json_decode($value->venue_event,true);                         
                            
                            echo '<div class="col-xl-10 offset-xl-1">
                                    <div class="upcoming-item">
                                        <div class="upcoming-item__date"> Faltan <span> '. $diff->days.'</span><span> días</span></div>
                                        <div class="upcoming-item__body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 col-xl-4">
                                                    <div class="upcoming-item__img"><img class="img--bg" src="'.$backoffice.'views/img/events/post/'.$value->image_event.'" alt="img"/></div>
                                                </div>
                                                <div class="col-lg-7 col-xl-8">
                                                    <div class="upcoming-item__description">
                                                        <h6 class="upcoming-item__title"><a href="'.$path.$value->route_event.'">'.$value->name_event.'</a></h6>
                                                        <p>'.$value->headline_event.'</p>
                                                        <div class="upcoming-item__details">
                                                            <p>
                                                                <svg class="icon">
                                                                    <use xlink:href="#clock"></use>
                                                                </svg> <strong>'.$details[0]["start"].',</strong> '.$details[0]["time"].' - <strong>'.$details[1]["finish"].',</strong> '.$details[1]["time"].'
                                                            </p>
                                                            <p>
                                                                <svg class="icon">
                                                                    <use xlink:href="#placeholder"></use>
                                                                </svg> <strong>'.$venue[1]["city"].',</strong> '.$venue[0]["address"].'
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            
                        }

                    ?>

                    
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- pagination start-->
                        <?php 

                            $select = "id_event";
                            $url = CurlController::api()."events?linkTo=process_event&equalTo=1&linkTo_=status_event&equalTo_=1&orderBy=id_event&orderMode=ASC&select=".$select;
                            $method = "GET";
                            $fields = array();
                            $header = array();

                            $dataTotalEvents = CurlController::request($url, $method, $fields, $header)->total; 

                            if($dataTotalEvents != 0){
                                
                                $pageEvents = ceil($dataTotalEvents/6);
                                
                                if ($pageEvents > 2) {

                                    /*=============================================
                                    LOS BOTONES DE LAS PRIMERAS 2 PÁGINAS Y LA ÚLTIMA PÁG
                                    =============================================*/

                                    if(!isset($routesArray[2]) || $routesArray[2] == 1){                                    
                                        

                                        echo '<ul class="pagination">';
                                        
                                            for($i = 1; $i <= 2; $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                        echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>

                                               <li class="pagination__item" id="item'.$pageEvents.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageEvents.'"><span>'.$pageEvents.'</span></a></li>

                                               <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/2"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                        </ul>';

                                    }

                                    /*=============================================
                                    LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                                    =============================================*/

                                    else if($routesArray[2] != $pageEvents &&                                 
                                            $routesArray[2] != 1 &&
                                            $routesArray[2] <  ($pageEvents/2) &&
                                            $routesArray[2] < ($pageEvents-2)
                                            ){

                                            $numPagCurrent = $routesArray[2];

                                            echo '<ul class="pagination">
                                                  <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> ';
                                        
                                            for($i = $numPagCurrent; $i <= ($numPagCurrent+2); $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                            echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                                   <li class="pagination__item" id="item'.$pageEvents.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageEvents.'"><span>'.$pageEvents.'</span></a></li>
                                                   <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent+1).'"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                            </ul>';

                                    }

                                    /*=============================================
                                    LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                                    =============================================*/

                                    else if($routesArray[2] != $pageEvents && 
                                            $routesArray[2] != 1 &&
                                            $routesArray[2] >=  ($pageEvents/2) &&
                                            $routesArray[2] < ($pageEvents-2)
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
                                        
                                        for($i = ($pageEvents-2); $i <= $pageEvents; $i ++){

                                            echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                        echo ' </ul>';

                                    }

                                    
                                }else{

                                    echo '<ul class="pagination">';

                                        for($i = 1; $i <= $pageEvents; $i ++){

                                            echo '<li id="item'.$i.'" class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                        }

                                    echo '</ul>';

                                }

                            }
                                                    
                        ?>
                        <!-- pagination end-->
                    </div>
                </div>
            </div>
        </section>
        <!-- events inner end-->

    <?php else: ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">¡Lo sentimos!</h1>
                <p class="lead">Actualmente no contamos con información para esta página, agradecemos tu compresion. Nos encontramos trabajando para mejorar</p>
            </div>
        </div>
        
    <?php endif ?>

    

<?php endif ?>