<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=teams&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageTeams = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageTeams[0]->status_page != 0): ?>

    <?php 

        /*Llamado de páginación*/

        if (isset($routesArray[1])) {
                        
            if (isset($routesArray[2])) {

                $startAt = ($routesArray[2] - 1)*12;
                $endAt = 12;        
                
            }else{

                $startAt = 0;                
                $endAt = 12;

            }     

        }else{
        
            $startAt = 0;        
            $endAt = 12;
            
        }

        $select = "image_team,name_team,route_team,position_team,social_team";
        $url = CurlController::api()."teams?linkTo=status_team&equalTo=1&linkTo_=bdelete_team&equalTo_=0&orderBy=type_team&orderMode=ASC&startAt=".$startAt."&endAt=".$endAt."&select=".$select;
        $method = "GET";
        $fields = array();
        $header = array();

        $dataTeams = CurlController::request($url, $method, $fields, $header)->results; 
        $dataTeamsSocial = json_decode($dataTeams[0]->social_team,true);

    ?>

    <?php if ($dataTeams != "Not Found"): ?>

        <!-- Banner  -->
        <section class="promo-primary">
            <picture>
                <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageTeams[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageTeams[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
            </picture>
            <div class="promo-primary__description"> <span><?php echo $pageTeams[0]->word_page ?></span></div>
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <div class="align-container">
                            <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                                <h1 class="promo-primary__title"><span><?php echo $pageTeams[0]->name_page ?></span></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section elements">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <h4 class="elements__title">Nuestro equipo de trabajo</h4>
                    </div>
                </div>
                <div class="row offset-margin">

                    <?php 

                        foreach ($dataTeams as $key => $value) {
                            
                            echo '<div class="col-sm-6 col-lg-4 col-xl-3">
                                    <!-- item start-->
                                    <div class="team-item team-item--primary">
                                        <div class="team-item__img">
                                            <ul class="team-item__socials">';

                                                foreach ($dataTeamsSocial as $key => $value_) {

                                                    if($value_['status'] != 0){

                                                        echo '<li><a href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

                                                    }

                                                }
                                            echo '</ul>
                                            <img class="img--bg" src="'.$backoffice.'views/img/team/'.$value->image_team.'" alt="'.$organization[0]->name_organization.'"/>
                                        </div>
                                        <div class="team-item__description">
                                            <div class="team-item__name"><a style="text-decoration:none" href="'.$path.$value->route_team.'">'.$value->name_team.'</a></div>
                                            <div class="team-item__position">'.$value->position_team.'</div>
                                        </div>
                                    </div>
                                    <!-- item end-->
                                </div>';

                        }

                    ?>

                </div><br><br><br>

                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <?php 

                                $select = "id_team";
                                $url = CurlController::api()."teams?linkTo=status_team&equalTo=1&linkTo_=bdelete_team&equalTo_=0&orderBy=id_team&orderMode=ASC&select=".$select;
                                $method = "GET";
                                $fields = array();
                                $header = array();

                                $dataTotalTeam = CurlController::request($url, $method, $fields, $header)->total;

                                if($dataTotalTeam != 0){

                                    $pageTeams = ceil($dataTotalTeam/12);

                                    if ($pageTeams > 4) {

                                        /*=============================================
                                        LOS BOTONES DE LAS PRIMERAS 2 PÁGINAS Y LA ÚLTIMA PÁG
                                        =============================================*/

                                        if(!isset($routesArray[2]) || $routesArray[2] == 1){                                    
                                            

                                            echo '<ul class="pagination">';
                                            
                                                for($i = 1; $i <= 2; $i ++){

                                                    echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                                }

                                            echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>

                                                   <li class="pagination__item" id="item'.$pageTeams.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageTeams.'"><span>'.$pageTeams.'</span></a></li>

                                                   <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/2"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                            </ul>';

                                        }

                                        /*=============================================
                                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                                        =============================================*/

                                        else if($routesArray[2] != $pageTeams &&                                 
                                                $routesArray[2] != 1 &&
                                                $routesArray[2] <  ($pageTeams/2) &&
                                                $routesArray[2] < ($pageTeams-2)
                                                ){

                                                $numPagCurrent = $routesArray[2];

                                                echo '<ul class="pagination">
                                                      <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent-1).'"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></a></li> ';
                                            
                                                for($i = $numPagCurrent; $i <= ($numPagCurrent+2); $i ++){

                                                    echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                                }

                                                echo ' <li class="pagination__item pagination__item--disabled"><a>...</a></li>
                                                       <li class="pagination__item" id="item'.$pageTeams.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$pageTeams.'"><span>'.$pageTeams.'</span></a></li>
                                                       <li class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.($numPagCurrent+1).'"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>

                                                </ul>';

                                        }

                                        /*=============================================
                                        LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                                        =============================================*/

                                        else if($routesArray[2] != $pageTeams && 
                                                $routesArray[2] != 1 &&
                                                $routesArray[2] >=  ($pageTeams/2) &&
                                                $routesArray[2] < ($pageTeams-2)
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
                                            
                                            for($i = ($pageTeams-2); $i <= $pageTeams; $i ++){

                                                echo '<li class="pagination__item" id="item'.$i.'"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                            echo ' </ul>';

                                        }

                                        
                                    }else{

                                        echo '<ul class="pagination">';

                                            for($i = 1; $i <= $pageTeams; $i ++){

                                                echo '<li id="item'.$i.'" class="pagination__item"><a style="text-decoration:none" href="'.$path.$urlParams[0].'/'.$i.'"><span>'.$i.'</span></a></li>';

                                            }

                                        echo '</ul>';

                                    }

                                }                        

                            ?>

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
