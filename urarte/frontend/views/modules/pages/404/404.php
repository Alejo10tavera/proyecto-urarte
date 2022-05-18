<?php 

/*=============================================
sección 404
=============================================*/

$section404 = CurlController::dataTemplates("404_section");
$dataSection404 = json_decode($section404[0]->text_template,true);

?>

<img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataSection404[0]["imagen"] ?>" alt="<?php echo $organization[0]->name_organization ?>"/>
<section class="section error">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-6">
                <div class="align-container">
                    <div class="align-container__item">
                        <h1 class="error__title">404</h1>
                        <h3 class="error__subtitle"><?php echo $dataSection404[0]["title"] ?></h3>
                        <p class="error__text"><?php echo $dataSection404[0]["description"] ?></p><a class="button button--primary" href="/">Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>