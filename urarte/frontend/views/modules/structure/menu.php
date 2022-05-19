<header class="header header--front_3">
	<div class="container-fluid">
		<div class="row no-gutters justify-content-between">
			<div class="col-auto d-flex align-items-center">
				<div class="dropdown-trigger d-none d-sm-block">
					<div class="dropdown-trigger__item"></div>
				</div>
				<div class="header-logo"><a class="header-logo__link" href="/"><img class="header-logo__img" src="<?php echo $backoffice ?>views/img/template/<?php echo $organization[0]->logodark_organization ?>" alt="<?php echo $organization[0]->name_organization ?>"/></a></div>
			</div>
			<div class="col-auto">
				<!-- main menu start-->
				<nav>
					<ul class="main-menu">

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link main-menu__item--active" href="/"><span>Inicio</span></a></li>

						
						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link"><span>Páginas</span></a>
							<!-- sub menu start-->
							<ul class="main-menu__sub-list sub-list--style-2">
								<li><a href="about"><span>Acerca de</span></a></li>
								<li><a href="sponsors"> <span>Patrocinadores</span></a></li>
								<li><a href="donors"><span>Donadores</span></a></li>
								<li><a href="categories"><span>Categorias</span></a></li>
								<li><a href="teams"><span>Equipo</span></a></li>
								<li><a href="events"><span>Eventos</span></a></li>
								<li><a href="blogs"><span>Blog</span></a></li>						
								<li><a href="gallery"><span>Galeria</span></a></li>
								<li><a href="faq"><span>FAQ</span></a></li>
								<li><a href="urarte"><span>Urarte</span></a></li>
							</ul>
							<!-- sub menu end-->
						</li>

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="projects"><span>Proyectos</span></a></li>

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="events"><span>Eventos</span></a></li>

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="blogs"><span>Blog</span></a></li>
						
						<li class="main-menu__item"><a class="main-menu__link" href="contact"><span>Contacto</span></a></li>
						
					</ul>
				</nav>
				<!-- main menu end-->
			</div>

			<div class="col-auto d-flex align-items-center">
				<!-- lang select start-->
				<ul class="lang-select">
					<li class="main-menu__item"><a class="main-menu__link" href="login"><span>Mi cuenta</span></a></li>
				</ul>
				
				<a class="button button--squared" href="donate"><span>Donar</span></a>

				<div class="dropdown-trigger d-block d-sm-none">
					<div class="dropdown-trigger__item"></div>
				</div>
			</div>
		</div>
	</div>
</header>