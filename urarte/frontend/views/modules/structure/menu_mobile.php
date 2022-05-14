<div class="aside-dropdown">
	<div class="aside-dropdown__inner"><span class="aside-dropdown__close">
		<svg class="icon">
			<use xlink:href="#close"></use>
		</svg></span>
	<div class="aside-dropdown__item d-lg-none d-block">

		<ul class="aside-menu">

			<li class="aside-menu__item aside-menu__item--has-child"><a class="aside-menu__link" href="<?php echo $path ?>"><span>Inicio</span></a></li>
			
			<li class="aside-menu__item aside-menu__item--has-child main-menu__item--active"><a class="aside-menu__link" href="javascript:void(0);"><span>Páginas</span></a>
				<!-- sub menu start-->
				<ul class="aside-menu__sub-list">
					<li><a href="about.html"><span>About</span></a></li>
					<li><a href="typography.html"> <span>Typography</span></a></li>
					<li><a href="donors.html"><span>Donors & Partners</span></a></li>
					<li><a href="volunteer.html"><span>Become a Volunteer</span></a></li>
					<li><a href="events.html"><span>Events</span></a></li>
					<li><a href="event-details.html"><span>Event Details</span></a></li>
					<li><a href="stories.html"><span>Stories</span></a></li>
					<li><a href="story-details.html"><span>Story Details</span></a></li>
					<li><a href="blog.html"><span>Blog</span></a></li>
					<li><a href="blog-post.html"><span>Blog Post</span></a></li>
					<li><a href="gallery.html"><span>Gallery</span></a></li>
					<li><a href="pricing.html"><span>Pricing Plans</span></a></li>
					<li><a href="faq.html"><span>FAQ</span></a></li>
					<li><a href="404.html"><span>404 Page</span></a></li>
				</ul>
				<!-- sub menu end-->
			</li>

			<li class="aside-menu__item aside-menu__item--has-child"><a class="aside-menu__link" href="projects"><span>Proyectos</span></a></li>

			<li class="aside-menu__item aside-menu__item--has-child"><a class="aside-menu__link" href="blog"><span>Blog</span></a></li>

			<li class="aside-menu__item"><a class="aside-menu__link" href="contact"><span>Contacto</span></a></li>

		</ul>

	</div>

	<div class="aside-dropdown__item">

		<!-- aside menu start-->
		<ul class="aside-menu">
			<li class="aside-menu__item"><a class="aside-menu__link" href="#">Documentos</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="#">Información</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="#">Historia</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="contact">Contacto</a></li>
		</ul>

		<!-- aside menu end-->
		<div class="aside-inner"><span class="aside-inner__title">Email</span><a class="aside-inner__link" href="mailto:<?php echo $organization[0]->email_organization ?>"><?php echo $organization[0]->email_organization ?></a></div>

		<div class="aside-inner"><span class="aside-inner__title">Télefono</span><a class="aside-inner__link" href="tel:+57<?php echo $organization[0]->phone_organization ?>">+57 <?php echo $organization[0]->phone_organization ?></a></div>

		<ul class="aside-socials">

			<?php 

				foreach($dataSocial as $key => $value){

					if($value['status'] != 0){

						echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value["url"].'"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

					}

				}

			?>

		</ul>

	</div>

	<div class="aside-dropdown__item"><a class="button button--squared" href="#"><span>Donar</span></a></div>

	</div>

</div>