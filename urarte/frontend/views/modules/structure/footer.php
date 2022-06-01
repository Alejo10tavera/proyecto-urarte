<footer class="footer footer--front_3">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-logo"><a class="footer-logo__link" href="/"><img class="footer-logo__img" src="<?php echo $backoffice ?>views/img/template/<?php echo $organization[0]->logowhite_organization ?>" alt="<?php echo $organization[0]->name_organization ?>"/></a></div>
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

								echo '<li class="footer-socials__item"><a class="footer-socials__link" target="_blank" href="'.$value["url"].'"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

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
						<li class="footer-menu__item footer-menu__item--active"><a class="footer-menu__link" href="/">Inicio</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>about">Acerca de</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>donors">Donadores</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>teams">Equipo</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>projects">Proyectos</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>events">Eventos</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>categories">Categorías</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>blogs">Blog</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>gallery">Galeria</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>faq">FAQ</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>documents">Documentos</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>informations">Información</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>contact">Contacto</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>donate">Donar</a></li>
						<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo $path ?>urarte">Urarte</a></li>
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
						<input class="footer__form-input" type="email" placeholder="Ingrese su E-mail"/>
						<button class="footer__form-submit button button--primary" type="submit">Subscribe</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>