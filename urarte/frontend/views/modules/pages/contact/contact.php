<?php 

/*=============================================
Traer los datos de la pagina
=============================================*/
$select = "name_page,word_page,image_page,status_page";
$url = CurlController::api()."pages?linkTo=route_page&equalTo=contact&linkTo_=bdelete_page&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$pageContact = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($pageContact[0]->status_page != 0): ?>

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
            <source srcset="<?php echo $backoffice ?>views/img/pages/<?php echo $pageContact[0]->image_page ?>" media="(min-width: 992px)" style="filter: brightness(50%)"/><img class="img--bg" src="<?php echo $backoffice ?>views/img/pages/<?php echo $pageContact[0]->image_page ?>" alt="<?php echo $organization[0]->name_organization ?>" style="filter: brightness(50%)"/>
        </picture>
        <div class="promo-primary__description"> <span><?php echo TemplateController::capitalize(strtolower($pageContact[0]->word_page)) ?></span></div>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="align-container">
                        <div class="align-container__item"><span class="promo-primary__pre-title"><?php echo $organization[0]->name_organization ?></span>
                            <h1 class="promo-primary__title"><span><?php echo TemplateController::capitalize(strtolower($pageContact[0]->name_page)) ?></span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <!-- section start-->
    <section class="section contacts preloadFalse">
        <div class="container">
            <div class="row offset-margin">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/icon_1-1.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                            <svg class="icon icon-item__icon icon--red">
                                <use xlink:href="#location-pin"></use>
                            </svg>
                        </div>
                        <div class="icon-item__text">
                            <p>Dirección: <?php echo $organization[0]->address_organization ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/icon_2-2.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                            <svg class="icon icon-item__icon icon--orange">
                                <use xlink:href="#phone-call"></use>
                            </svg>
                        </div>
                        <div class="icon-item__text">
                            <p>Teléfono: <a class="icon-item__link" href="tel:<?php echo $organization[0]->phone_organization ?>"><?php echo $organization[0]->phone_organization ?></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/icon_3-3.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                            <svg class="icon icon-item__icon icon--green">
                                <use xlink:href="#envelope"></use>
                            </svg>
                        </div>
                        <div class="icon-item__text">
                            <p>Email: <a class="icon-item__link" href="mailto:<?php echo $organization[0]->email_organization ?>"><?php echo $organization[0]->email_organization ?></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-item">
                        <div class="icon-item__img"><img class="img--layout" src="<?php echo $backoffice ?>views/img/template/icon_4-4.png" alt="<?php echo $organization[0]->name_organization ?>"/>
                            <svg class="icon icon-item__icon icon--blue">
                                <use xlink:href="#share"></use>
                            </svg>
                        </div>
                        <div class="icon-item__text">
                            <!-- socials start-->
                            <ul class="socials">

                                <?php 

                                    foreach($dataSocial as $key => $value){

                                        if($value['status'] != 0){

                                            echo '<li class="socials__item"><a class="socials__link" target="_blank" href="'.$value["url"].'"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

                                        }

                                    }

                                ?>
                                
                            </ul>
                            <!-- socials end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end-->

    <div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
       <div class="spinner-border text-muted my-5"></div>

    </div>

    <!-- contacts start-->
    <section class="section contacts no-padding-top preloadFalse">
        <div class="contacts-wrapper">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-6">
                        <form class="form account-form sign-up-form needs-validation" novalidate method="post">
                            <h6 class="form__title">Enviar un mensaje</h6><span class="form__text">* Elementos requeridos</span>
                            <div class="row">

                                <div class="form-group col-lg-6">

                                    <input class="form__field form-control" type="text" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event, 'text')" name="contFirstName" placeholder="Nombres" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group col-lg-6">

                                    <input class="form__field form-control" type="text" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event, 'text')" name="contLastName" placeholder="Apellidos" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group col-lg-6">

                                    <input class="form__field form-control" type="email" pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" onchange="validateJS(event,'email')" name="contEmail" placeholder="Correo" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group col-lg-6">

                                    <input class="form__field form-control" type="text" pattern="[-\\(\\)\\0-9 ]{1,}"onchange="validateJS(event, 'phone')" name="contPhone" placeholder="Télefono" required>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="col-12">

                                    <textarea class="form__message form__field form-control" rows="7" pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}' onchange="validateJS(event, 'paragraphs')"  name="contMessage" placeholder="Ingrese aquí su mensaje" required></textarea>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Complete este campo correctamente.</div>

                                </div>

                                <div class="col-12">
                                    <button class="form__submit" type="submit">Enviar</button>
                                </div>

                                <?php 

                                    $newMessage = new GeneralController();
                                    $newMessage -> ctrNewMessage();

                                ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <iframe class="contacts-wrapper__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.792614704294!2d-76.18091077298678!3d6.896804920263128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4575e3a0825c13%3A0x5aabc05bccaf90b8!2sUramita%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1654054369626!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- contacts end-->

<?php endif ?>