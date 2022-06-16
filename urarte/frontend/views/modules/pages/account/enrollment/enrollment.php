<section class="section background--brown">
    <div class="container">
        <div class="row offset-margin">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                <form class="form account-form sign-up-form needs-validation" novalidate method="post">
                    <div class="form__fieldset">
                        <h6 class="form__title text-center">Crear cuenta</h6>
                        <div class="row">
                            <input type="hidden" value="<?php  echo CurlController::api() ?>" id="urlApi">
                            <div class="col-12">

                                <div class="form-group ">

                                    <input class="form__field form-control" type="text" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event, 'text')" name="regFirstName" placeholder="Nombres" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group ">

                                    <input class="form__field form-control" type="text" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event, 'text')" name="regLastName" placeholder="Apellidos" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group ">

                                    <input class="form__field form-control" type="email" pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}" onchange="validateEmailRepeat(event)" name="regEmail" placeholder="Correo" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo correctamente.</div>
                                    
                                </div>

                                <div class="form-group ">

                                    <input class="form__field form-control" type="password" pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}" onchange="validateJS(event, 'password')" name="regPassword" placeholder="Contraseña" required/>

                                    <div class="valid-feedback">Correcto.</div>
                                    <div class="invalid-feedback">Por favor complete este campo correctamente.</div>
                                    
                                </div>

                            </div>

                            <?php 

                                $register = new UsersController();
                                $register -> ctrRegister();

                            ?>

                            <div class="col-12"><strong><a class="form__link" href="#">Términos y condiciones</a></strong></div>

                            <div class="col-12 text-center">
                                <button type="submit" class="form__submit">Crear cuenta</button>
                            </div>
                            <div class="col-12 text-center"><strong><a class="form__link" href="<?php echo $path ?>account&login">Inicia sesión</a> si ya tienes cuenta</strong></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-0 col-xl-4 margin-bottom">
                
            </div>
        </div>
    </div>
</section>