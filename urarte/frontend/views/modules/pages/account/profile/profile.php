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
				<!-- shop filter start-->
				<ul class="shop-filter">
					<li class="shop-filter__item shop-filter__item--active"><span>Opciones</span>
						<ul class="shop-filter__sub-list">
							<li><a href="#">Sort by latest</a></li>
							<li><a href="#">Sort by populirity</a></li>
							<li><a href="#">Sort by price: low to high</a></li>
							<li><a href="#">Sort by price: high to low</a></li>
							<li><a href="<?php echo $path ?>account&logout">Salir</a></li>
						</ul>
					</li>
				</ul>
				<!-- shop filter end		-->
			</div>
		</div>
		<div class="row align-items-end margin-bottom">
				<div class="col-lg-12">
					<div class="heading heading--primary">
						<h2 class="heading__title"><span>Hola</span> <span><?php echo $_SESSION["user"]->displayname_user ?></span></h2>
						<p class="no-margin-bottom">Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail, Canthigaster rostrata. Midshipman dartfish Modoc sucker, yellowtail kingfish </p>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-auto">

				<div class="upcoming-item">
						
					
						<div class="row align-items-center">
							<div class="col-lg-5 col-xl-4">
								<div class="upcoming-item__img"><img class="img--bg" src="img/projects/0001/logo/1.jpg" alt="img"/></div>
							</div>
							<div class="col-lg-7 col-xl-8">
								<div class="upcoming-item__description">
									<h6 class="upcoming-item__title"><a href="event-details.html">The Culture of India. Rebirth</a></h6>
									<p>Minnow snoek icefish velvet-belly shark, California halibut round stingray northern sea robin. Southern grayling trout-perch.</p>
									<div class="upcoming-item__details">
										<p>
											<svg class="icon">
												<use xlink:href="#clock"></use>
											</svg> <strong>September 30,</strong> 10:00 AM - <strong>October 31,</strong> 18:00 PM
										</p>
										<p>
											<svg class="icon">
												<use xlink:href="#placeholder"></use>
											</svg> <strong>Dark Spurt,</strong> San Francisco, CA 94528, USA
										</p>
										
									</div>

									<div class="upcoming-item__details">
										
										<button class="form__submit" data-toggle="modal" data-target="#changePassword">Cambiar contraseña</button>
									</div>
									
                                
                            
								</div>
							</div>


						</div>
					
				</div>

				<div class="tabs vertical-tabs">
					<ul class="vertical-tabs__header">
						<li><a href="#vertical-tabs__item-1"><span>Description </span></a></li>
						<li><a href="#vertical-tabs__item-2"><span>Products</span></a></li>
						<li><a href="#vertical-tabs__item-3"><span>Details</span></a></li>
						<li><a href="#vertical-tabs__item-4"><span>Gallery</span></a></li>
					</ul>
					<div class="vertical-tabs__content">
						<div class="vertical-tabs__item" id="vertical-tabs__item-1">
							<p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat porro facere, atque doloremque, sed voluptatibus quibusdam ipsam labore autem eveniet minima laborum sunt dignissimos consequuntur hic deleniti, accusantium qui modi!</strong></p>
							<p>African lungfish silverside, Red salmon rockfish grunion, garpike zebra danio king-of-the-salmon banjo catfish. Sea chub demoiselle whalefish zebra lionfish mud cat pelican eel. Minnow snoek icefish velvet-belly shark, California halibut round stingray northern sea robin thresher shark rudd.</p>
						</div>
						<div class="vertical-tabs__item table-responsive" id="vertical-tabs__item-2">
							<table class="table">
							  <tr>
							    <th>Company</th>
							    <th>Contact</th>
							    <th>Country</th>
							    <th>Country</th>
							    <th>Country</th>
							  </tr>
							  <tr>
							    <td>Alfreds Futterkiste</td>
							    <td>Maria Anders</td>
							    <td>Germany</td>
							    <td>Germany</td>
							    <td>Germany</td>
							  </tr>
							  <tr>
							    <td>Centro comercial Moctezuma</td>
							    <td>Francisco Chang</td>
							    <td>Mexico</td>
							    <td>Mexico</td>
							    <td>Mexico</td>
							  </tr>
							  <tr>
							    <td>Ernst Handel</td>
							    <td>Roland Mendel</td>
							    <td>Austria</td>
							    <td>Austria</td>
							    <td>Austria</td>
							  </tr>
							  <tr>
							    <td>Island Trading</td>
							    <td>Helen Bennett</td>
							    <td>UK</td>
							    <td>UK</td>
							    <td>UK</td>
							  </tr>
							  <tr>
							    <td>Laughing Bacchus Winecellars</td>
							    <td>Yoshi Tannamuri</td>
							    <td>Canada</td>
							    <td>Canada</td>
							    <td>Canada</td>
							  </tr>
							  <tr>
							    <td>Magazzini Alimentari Riuniti</td>
							    <td>Giovanni Rovelli</td>
							    <td>Italy</td>
							    <td>Italy</td>
							    <td>Italy</td>
							  </tr>
							</table>
						</div>
						<div class="vertical-tabs__item" id="vertical-tabs__item-3">
							<form class="form message-form" action="javascript:void(0);">
								<h6 class="form__title">Send Message</h6><span class="form__text">* The following info is required</span>
								<div class="row">
									<div class="col-lg-6">
										<input class="form__field" type="text" name="first-name" placeholder="First Name *" required="required"/>
									</div>
									<div class="col-lg-6">
										<input class="form__field" type="text" name="last-name" placeholder="Last Name *" required="required"/>
									</div>
									<div class="col-lg-6">
										<input class="form__field" type="email" name="email" placeholder="Email *" required="required"/>
									</div>
									<div class="col-lg-6">
										<input class="form__field" type="tel" name="phone-number" placeholder="Phone"/>
									</div>
									<div class="col-12">
										<textarea class="form__message form__field" name="message" placeholder="Message"></textarea>
									</div>
									<div class="col-12">
										<button class="form__submit" type="submit">Send Message</button>
									</div>
								</div>
							</form>
						</div>
						<div class="vertical-tabs__item" id="vertical-tabs__item-4">
							<p><strong>Thresher shark rudd African lungfish silverside, Red salmon rockfish grunion, garpike zebra danio king-of-the-salmon banjo catfish. Sea chub demoiselle whalefish zebra lionfish mud cat pelican eel.</strong></p>
							<p>Minnow snoek icefish velvet-belly shark, California halibut round stingray northern sea robin. Southern grayling trout-perch. Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail, Canthigaster rostrata. Midshipman dartfish Modoc sucker, yellowtail kingfish basslet. Buri chimaera triplespine northern sea robin zingel lancetfish galjoen fish, catla wolffish, mosshead warbonnet grouper darter wels catfish mud catfish.</p>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eos impedit, mollitia dicta facere reiciendis? Dolor laborum sunt dolore veniam qui nostrum ipsa praesentium! Voluptatem odit eius laudantium, quod animi, nam placeat laboriosam mollitia rem quis officia, tempora numquam nesciunt.</p>
							<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum ut, facere expedita velit aut numquam iusto. Molestias maiores laudantium similique. Modi error illum ab, qui ipsam vero? Asperiores, iste quis? Repellat quidem sunt amet explicabo ducimus esse dolorum ab impedit iure ad vel culpa ut repellendus, commodi nostrum! Voluptates accusantium atque quis? Molestiae, ut. Officia velit unde possimus eos mollitia tempore praesentium, dolorum illo ratione minima iusto vero cum quod perferendis expedita illum vel ipsa suscipit! Magni culpa at officiis molestiae a vel similique inventore, accusantium adipisci in sequi maiores harum quaerat debitis reprehenderit illum saepe quidem natus pariatur ducimus?</p>
							<p>African lungfish silverside, Red salmon rockfish grunion, garpike zebra danio king-of-the-salmon banjo catfish. Sea chub demoiselle whalefish zebra lionfish mud cat pelican eel. Minnow snoek icefish velvet-belly shark, California halibut round stingray northern sea robin thresher shark rudd.</p>
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