<section class="section background--brown">

    <div class="container">

        <!--=====================================
         Validar veracidad del correo electrónico
        ======================================-->

        <?php 

            if(isset($urlParams[2])){

                $verify = base64_decode($urlParams[2]);                  
                
                /*=============================================
                Validamos que el usuario si exista
                =============================================*/
                $url = CurlController::api()."users?linkTo=email_user&equalTo=".$verify."&linkTo_=status_user&equalTo_=1&select=id_user";
                $method = "GET";
                $fields = array();
                $header = array();

                $item = CurlController::request($url, $method, $fields, $header);  
                
                
                if(!empty($item)){
                    
                    if($item->status == 200){

                        /*=============================================
                        Actualizar el campo de verificación
                        =============================================*/
                        $url = CurlController::api()."users?id=".$item->results[0]->id_user."&nameId=id_user&token=no&except=verification_user&linkTo_=status_user&equalTo_=1";
                        $method = "PUT";
                        $fields = "verification_user=1";
                        $header = array();

                        $verificationUser = CurlController::request($url, $method, $fields, $header);   

                        if($verificationUser->status == 200){

                            echo '<script>

                                fncSweetAlert("success", "Su cuenta ha sido verificada con éxito, ahora puede iniciar sesión", "'.TemplateController::path().'account&login")

                            </script>';
                            
                        }

                    }else{

                        echo '<script>

                            fncSweetAlert("error", "Falla en la verificación, correo electrónico no encontrado.", "")

                        </script>';

                    }

                }else{

                    echo '<script>

                        fncSweetAlert("error", "Falla en la verificación, correo electrónico no encontrado.", "")

                    </script>';

                }

            }

        ?>


        <div class="row offset-margin">

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">

                <form class="form account-form sign-up-form needs-validation" novalidate method="post">

                    
                    <div class="form__fieldset">

                        <h6 class="form__title text-center">Iniciar sesión</h6>

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group ">

                                    <input class="form__field form-control" type="email" pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" onchange="validateJS(event,'email')" name="loginEmail" placeholder="Correo" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo.</div>
                                    
                                </div>

                                <div class="form-group ">

                                    <input class="form__field form-control" type="password" pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}" onchange="validateJS(event, 'password')" name="loginPassword" placeholder="Contraseña" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo.</div>
                                    
                                </div>

                            </div>

                            <div class="col-12 d-flex align-items-end justify-content-between flex-wrap">
                                <label class="form__checkbox-label">
                                    <span class="form__label-text">Recordarme</span>
                                    <input class="form__input-checkbox" type="checkbox" id="remember-me" name="size-select remember-me" onchange="remember(event)" value="Size XXL"/>
                                    <span class="form__checkbox-mask" style="border: 1px solid #2e2e45;"></span>
                                </label>
                                <a class="form__link" href="#resetPassword" data-toggle="modal">Recuperar contraseña</a>
                            </div>

                            

                            <div class="col-12 text-center">
                                <button type="submit" class="form__submit">Iniciar sesión</button>
                            </div>

                            <div class="col-12 text-center">
                            
                                <strong><a class="form__link" href="<?php echo $path ?>account&enrollment">Registrarse</a> si no tienes una cuenta.</strong>

                            </div>

                        </div>

                    </div>

                    <?php 

                        $login = new UsersController();
                        $login -> ctrLogin();

                    ?>

                </form>

            </div>

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>

        </div>

    </div>

</section>

<!--=====================================
Ventana modal para recuperar contraseña
======================================-->

<!-- The Modal -->
<div class="modal" id="resetPassword">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" class="ps-form--account ps-tab-root needs-validation" novalidate>

            <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">Recuperar contraseña</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-group">

                        <input class="form-control" type="email" placeholder="Correo electrónico" pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" onchange="validateJS(event,'email')" name="resetPassword" required>

                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Por favor, rellene este campo correctamente.</div>

                    </div>

                </div>

                <?php 

                    $reset = new UsersController();
                    $reset -> resetPassword();

                ?>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">Enviar</button>
                </div>

            </form>

        </div>

    </div>

</div>