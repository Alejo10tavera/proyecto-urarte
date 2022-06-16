<div class="container-fluid preloadTrue" style="position: absolute; left: 50%; margin: -25px 0 0 -25px;">
    
	<div class="spinner-border text-muted my-5"></div>

</div>

<header class="header header--front_3 preloadFalse">
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
								<li><a href="<?php echo $path ?>about"><span>Acerca de</span></a></li>
								<li><a href="<?php echo $path ?>donors"><span>Donadores</span></a></li>
								<li><a href="<?php echo $path ?>categories"><span>Categorias</span></a></li>
								<li><a href="<?php echo $path ?>teams"><span>Equipo</span></a></li>
								<li><a href="<?php echo $path ?>gallery"><span>Galeria</span></a></li>
								<li><a href="<?php echo $path ?>faq"><span>FAQ</span></a></li>
								<li><a href="<?php echo $path ?>urarte"><span>Urarte</span></a></li>
							</ul>
							<!-- sub menu end-->
						</li>

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="<?php echo $path ?>projects"><span>Proyectos</span></a></li>

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="<?php echo $path ?>events"><span>Eventos</span></a></li>
						
						<li class="main-menu__item"><a class="main-menu__link" href="<?php echo $path ?>contact"><span>Contacto</span></a></li>
						
					</ul>
				</nav>
				<!-- main menu end-->
			</div>

			<div class="col-auto d-flex align-items-center">
				<!-- lang select start-->
				<ul class="lang-select">
					<li class="main-menu__item"><a class="main-menu__link" href="<?php echo $path ?>account&login"><span>Mi cuenta</span></a></li>
				</ul>
				
				<a class="button button--squared" href="<?php echo $path ?>donate"><span>Donar</span></a>

				<div class="dropdown-trigger d-block d-sm-none">
					<div class="dropdown-trigger__item"></div>
				</div>
			</div>
		</div>
	</div>
</header>