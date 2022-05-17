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
					<li><a href="about"><span>Acerca de</span></a></li>
					<li><a href="sponsors"> <span>Patrocinadores</span></a></li>
					<li><a href="donors"><span>Donadores</span></a></li>
					<li><a href="categories"><span>Categorias</span></a></li>
					<li><a href="volunteer"><span>Voluntarios</span></a></li>
					<li><a href="events"><span>Eventos</span></a></li>
					<li><a href="blogs"><span>Blog</span></a></li>						
					<li><a href="gallery"><span>Galeria</span></a></li>
					<li><a href="faq"><span>FAQ</span></a></li>
					<li><a href="urarte"><span>Urarte</span></a></li>
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
			<li class="aside-menu__item"><a class="aside-menu__link" href="documents">Documentos</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="informations">Información</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="urarte">Historia</a></li>
			<li class="aside-menu__item"><a class="aside-menu__link" href="contact">Contacto</a></li>
		</ul>

		<!-- aside menu end-->
		<div class="aside-inner"><span class="aside-inner__title">Email</span><a class="aside-inner__link" href="mailto:<?php echo $organization[0]->email_organization ?>"><?php echo $organization[0]->email_organization ?></a></div>

		<div class="aside-inner"><span class="aside-inner__title">Télefono</span><a class="aside-inner__link" href="tel:+57<?php echo $organization[0]->phone_organization ?>">+57 <?php echo $organization[0]->phone_organization ?></a></div>

		<ul class="aside-socials">

			<?php 

				foreach($dataSocial as $key => $value){

					if($value['status'] != 0){

						echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value["url"].'" target="_blank"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

					}

				}

			?>

		</ul>

	</div>

	<div class="aside-dropdown__item"><a class="button button--squared" href="donate"><span>Donar</span></a></div>

	</div>

</div>