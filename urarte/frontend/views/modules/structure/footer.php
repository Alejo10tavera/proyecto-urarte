<footer class="footer footer--front_3">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-logo"><a class="footer-logo__link" href="<?php $path ?>"><img class="footer-logo__img" src="<?php echo $backoffice ?>views/img/template/<?php echo $organization[0]->logowhite_organization ?>" alt="<?php echo $organization[0]->name_organization ?>"/></a></div>
				<div class="footer-contacts">
					<p class="footer-contacts__address"><?php echo $organization[0]->address_organization ?></p>
					<p class="footer-contacts__phone">Télefono: <a href="tel:+57 <?php echo $organization[0]->phone_organization ?>"><?php echo $organization[0]->phone_organization ?></a></p>
					<p class="footer-contacts__mail">Email: <a href="mailto:<?php echo $organization[0]->email_organization ?>"><?php echo $organization[0]->email_organization ?></a></p>
				</div>
				<!-- footer socials start-->
				<ul class="footer-socials">

					<?php 

						foreach($dataSocial as $key => $value){

							if($value['status'] != 0){

								echo '<li class="footer-socials__item"><a class="footer-socials__link" href="'.$value["url"].'"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

							}

						}

					?>

				</ul>
				<!-- footer socials end-->
			</div>
			<div class="col-lg-8">
				<!-- footer nav start-->
				<nav>
					<ul class="footer-menu">
						<li class="footer-menu__item footer-menu__item--active"><a class="footer-menu__link" href="#">Home Page</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Blog & News</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Donations</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Clean Water</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">About Us</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Contact Us</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Animals</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Madicine</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Pages</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Elements</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Children</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Food</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Causes</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Documentation</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Old People</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="#">Documentation</a></li>
					</ul>
				</nav>
				<!-- footer nav end-->
			</div>
		</div>
	</div>
	<div class="footer__lower">
		<div class="container">
			<div class="row align-items-baseline">
				<div class="col-md-6 col-xl-7">
					<p class="footer-copyright">© <?php echo date('Y') ?> <?php echo $organization[0]->name_organization ?> Todos los derechos reservados</p>
				</div>
				<div class="col-md-6 col-xl-5">
					<div class="footer__form">
						<input class="footer__form-input" type="email" placeholder="Enter your E-mail"/>
						<button class="footer__form-submit button button--primary" type="submit">Subscribe</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>