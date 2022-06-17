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

                            echo '<div class="alert alert-success text-center">Your account has been verified successfully, you can now login</div>';
                            
                        }

                    }else{

                        echo '<div class="alert alert-danger text-center">Falla en la verificación, correo electrónico no encontrado.</div>';

                    }

                }else{

                    echo '<div class="alert alert-danger text-center">Falla en la verificación, correo electrónico no encontrado.</div>';

                }

            }

        ?>


        <div class="row offset-margin">

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">

                <form class="form account-form sign-up-form needs-validation" novalidate method="post">

                    <?php 

                        $login = new UsersController();
                        $login -> ctrLogin();

                    ?>

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
                                    <input class="form__input-checkbox" type="checkbox" name="size-select" value="Size XXL"/>
                                    <span class="form__checkbox-mask"></span>
                                </label>
                                <a class="form__link" href="#">Recuperar contraseña</a>
                            </div>

                            

                            <div class="col-12 text-center">
                                <button type="submit" class="form__submit">Iniciar sesión</button>
                            </div>

                            <div class="col-12 text-center">
                            
                                <strong><a class="form__link" href="<?php echo $path ?>account&enrollment">Registrarse</a> si no tienes una cuenta.</strong>

                            </div>

                        </div>

                    </div>



                </form>

            </div>

            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>

        </div>

    </div>

</section>