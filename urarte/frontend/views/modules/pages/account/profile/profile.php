<?php 

	if(!isset($_SESSION["user"])){

	    echo '<script>

	        window.location = "'.$path.'";

	    </script>'; 

	    return;

	}

?>

<section class="section elements">

	<div class="container">

		<div class="row align-items-baseline">

			<div class="col-5"><span class="shop__aside-trigger">Menú</span></div>

			<div class="col-7 text-right">
				
				<ul class="shop-filter">
					<li class="shop-filter__item shop-filter__item--active"><span>Opciones</span>
						<ul class="shop-filter__sub-list">
							<li><a href="#">Crear proyecto</a></li>
							<li><a href="#">Sort by populirity</a></li>
							<li><a href="#">Sort by price: low to high</a></li>
							<li><a href="#">Sort by price: high to low</a></li>
							<li><a href="<?php echo $path ?>account&logout">Salir</a></li>
						</ul>
					</li>
				</ul>
				
			</div>

		</div>

		<div class="row">

			<div class="col-auto">			

				<div class="tabs vertical-tabs">

					<ul class="vertical-tabs__header">
						<li><a href="#vertical-tabs__item-1"><span>Inicio</span></a></li>
						<li><a href="#vertical-tabs__item-2"><span>Datos</span></a></li>
						<li><a href="#vertical-tabs__item-3"><span>Donaciones</span></a></li>
						<li><a href="#vertical-tabs__item-4"><span>Mensajes</span></a></li>
						<li><a href="#vertical-tabs__item-5"><span>Cuenta</span></a></li>
					</ul>

					<div class="vertical-tabs__content">

						<div class="vertical-tabs__item" id="vertical-tabs__item-1">

							<div class="upcoming-item">						
					
								<div class="row align-items-center">
									
									<div class="col-12">

										<div class="upcoming-item__description">

											<h6 class="upcoming-item__title"><span>Hola,</span> <span><?php echo $_SESSION["user"]->displayname_user ?></span></h6>
											<p class="no-margin-bottom">Bienvenido a <strong><?php echo TemplateController::capitalize(strtolower($organization[0]->name_organization)) ?>,</strong> nos alegra tenerte con nosotros, este es tu panel administrativo. ¡Disfruta tu instancia!</p>

											<div class="upcoming-item__details">

												<p>
													
													<i class="fa fa-user" aria-hidden="true"></i>
													<strong>| Correo: </strong> <?php echo $_SESSION["user"]->email_user ?>

												</p>
												<p>
													<i class="fa fa-envelope" aria-hidden="true"></i>
													<strong>| Usuario: </strong> <?php echo $_SESSION["user"]->username_user ?>
												</p>
												
											</div>

											<div class="upcoming-item__details">
												
												<button class="form__submit" data-toggle="modal" data-target="#changePassword">Cambiar contraseña</button>

											</div>
												                                
										</div> 

									</div>

								</div>
							
							</div>							

						</div>

						<div class="vertical-tabs__item" id="vertical-tabs__item-2">

							<form class="form account-form sign-up-form needs-validation" novalidate method="post">

								<h6 class="form__title">Datos personales</h6>

								<div class="row">

									<div class="col-lg-12 form-group">
										<input class="form__field form-control" type="text" name="changeName" placeholder="Nombres" value="<?php echo $_SESSION["user"]->displayname_user ?>" required/>
										<div class="valid-feedback">Correcto.</div>
                                    	<div class="invalid-feedback">Por favor complete este campo.</div>
									</div>

									<div class="col-lg-6 form-group">
										<input class="form__field form-control" type="email" name="email" placeholder="Correo" value="<?php echo $_SESSION["user"]->email_user ?>" readonly/>
									</div>

									<div class="col-lg-6 form-group">
										<input class="form__field form-control" type="tel" name="changePhone" placeholder="Télefono" value="<?php echo $_SESSION["user"]->phone_user ?>" required/>
										<div class="valid-feedback">Correcto.</div>
                                    	<div class="invalid-feedback">Por favor complete este campo.</div>
									</div>

									<div class="col-lg-6 form-group">
										<input class="form__field form-control" type="text" name="changeCountry" placeholder="Pais" value="<?php echo $_SESSION["user"]->country_user ?>" required/>
										<div class="valid-feedback">Correcto.</div>
                                    	<div class="invalid-feedback">Por favor complete este campo.</div>
									</div>

									<div class="col-lg-6 form-group">
										<input class="form__field form-control" type="text" name="changeCity" placeholder="Ciudad" value="<?php echo $_SESSION["user"]->city_user ?>" required/>
										<div class="valid-feedback">Correcto.</div>
                                    	<div class="invalid-feedback">Por favor complete este campo.</div>
									</div>

									<div class="col-lg-12 form-group">
										<input class="form__field form-control" type="text" name="changeAddress" placeholder="Dirección" value="<?php echo $_SESSION["user"]->address_user ?>" required/>
										<div class="valid-feedback">Correcto.</div>
                                    	<div class="invalid-feedback">Por favor complete este campo.</div>
									</div>

									<div class="col-12">
										<button class="form__submit" type="submit">Actualizar datos</button>
									</div>

								</div>

							</form>

						</div>

						<div class="vertical-tabs__item" id="vertical-tabs__item-3">

							<table id="tableDonationUser" class="table tableDonationUser table-hover table-bordered table-striped dt-responsive" width="100%">
								<thead>

									<tr>
									    <th>Id</th>
									    <th>Comprobante</th>
									    <th>Valor</th>
									 </tr>

								</thead>

								<tbody>

									<tr>
										<td>1</td>
										<td>VI23423D</td>
										<td>20.000</td>
									</tr>
									<tr>
										<td>2</td>
										<td>VI23423D</td>
										<td>20.000</td>
									</tr>
									<tr>
										<td>3</td>
										<td>VI23423D</td>
										<td>20.000</td>
									</tr>
									<tr>
										<td>4</td>
										<td>VI23423D</td>
										<td>20.000</td>
									</tr>
									<tr>
										<td>5</td>
										<td>VI23423D</td>
										<td>20.000</td>
									</tr>
									
								</tbody>							  

							</table>

						</div>

						<div class="vertical-tabs__item" id="vertical-tabs__item-4">
							
							<table id="tableNotesUser" class="table tableNotesUser table-hover table-bordered table-striped dt-responsive" width="100%">
								<thead>

									<tr>
									    <th>Id</th>
									    <th>Proyecto</th>
									    <th>Titulo</th>
									 </tr>

								</thead>

								<tbody>

									<tr>
										<td>1</td>
										<td>Ikea</td>
										<td>Lorem dolor ipsum</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Ikea</td>
										<td>Lorem dolor ipsum</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Ikea</td>
										<td>Lorem dolor ipsum</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Ikea</td>
										<td>Lorem dolor ipsum</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Ikea</td>
										<td>Lorem dolor ipsum</td>
									</tr>

								</tbody>
							  
							</table>

						</div>
						
						<div class="vertical-tabs__item" id="vertical-tabs__item-5">

							<div class="upcoming-item">

								<div class="row align-items-center">

									<div class="col-lg-6 col-xl-6">

										<div class="upcoming-item__description">

											<h6 class="upcoming-item__title"><span>Inactivar</span> <span> cuenta</span></h6>
											<p class="no-margin-bottom">Si desea inactivar su cuenta, <strong><?php echo TemplateController::capitalize(strtolower($organization[0]->name_organization)) ?></strong> estara con las puertas abiertas para cuando desees volver. <b>Debes tener en cuenta que para activar de nuevo tu cuenta deberas comunicarte con nuestro grupo de trabajo.</b></p>
											

											<div class="upcoming-item__details">
												
												<button class="form__submit" data-toggle="modal" data-target="#changePassword">Inactivar cuenta</button>

											</div>
												                                
										</div> 

									</div>

									<div class="col-lg-6 col-xl-6">

										<div class="upcoming-item__description">

											<h6 class="upcoming-item__title"><span>Eliminar</span> <span> cuenta</span></h6>
											<p class="no-margin-bottom">Si desea eliminar su cuenta, <strong><?php echo TemplateController::capitalize(strtolower($organization[0]->name_organization)) ?></strong> te agradece por tu participación, te deseamos buenos exitos en tus nuevos proyectos.</p>
											
											<div class="upcoming-item__details">
												
												<button class="form__submit" data-toggle="modal" data-target="#changePassword">Eliminar cuenta</button>

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

<!--=====================================
Ventana modal para cambiar contraseña
======================================-->

<!-- The Modal -->
<div class="modal" id="changePassword">

    <div class="modal-dialog">

        <div class="modal-content">

        	<form method="post" class="ps-form--account ps-tab-root needs-validation" novalidate>

            	<!-- Modal Header -->
	            <div class="modal-header">
	                <h6 class="modal-title">Cambiar contraseña</h6>
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	            </div>

	            <!-- Modal body -->
	            <div class="modal-body">

                    <div class="form-group form-forgot">

                        <input class="form-control" type="password" placeholder="Password" pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}" onchange="validateJS(event, 'password')" name="changePassword" required>

                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Por favor, rellene este campo correctamente.</div>

                    </div>

	            </div>

	            <?php 

                    $change = new UsersController();
                    $change -> changePassword();

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

<script>
	$("#tableDonationUser, #tableNotesUser").DataTable({
		"deferRender": true,
		"retrieve": true,
		"processing": true,
		"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

		}

	});
</script>