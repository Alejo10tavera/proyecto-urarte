<header class="header header--front_3">
	<div class="container-fluid">
		<div class="row no-gutters justify-content-between">
			<div class="col-auto d-flex align-items-center">
				<div class="dropdown-trigger d-none d-sm-block">
					<div class="dropdown-trigger__item"></div>
				</div>
				<div class="header-logo"><a class="header-logo__link" href="<?php $path ?>"><img class="header-logo__img" src="<?php echo $backoffice ?>views/img/template/<?php echo $organization[0]->logodark_organization ?>" alt="<?php echo $organization[0]->name_organization ?>"/></a></div>
			</div>
			<div class="col-auto">
				<!-- main menu start-->
				<nav>
					<ul class="main-menu">

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link main-menu__item--active" href="<?php $path ?>"><span>Inicio</span></a></li>

						
						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="javascript:void(0);"><span>Páginas</span></a>
							<!-- sub menu start-->
							<ul class="main-menu__sub-list sub-list--style-2">
								<li><a href="about.html"><span>About</span></a></li>
								<li><a href="typography.html"> <span>Typography</span></a></li>
								<li><a href="donors.html"><span>Donors & Partners</span></a></li>
								<li><a href="volunteer.html"><span>Become a Volunteer</span></a></li>
								<li><a href="team-member.html"><span>Team Member</span></a></li>
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

						<li class="main-menu__item main-menu__item--has-child"><a class="main-menu__link" href="projects"><span>Proyectos</span></a></li>

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
				
				<a class="button button--squared" href="donation"><span>Donar</span></a>

				<div class="dropdown-trigger d-block d-sm-none">
					<div class="dropdown-trigger__item"></div>
				</div>
			</div>
		</div>
	</div>
</header>