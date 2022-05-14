<div class="top-bar d-none d-lg-block">

	<div class="container-fluid">

		<div class="row align-items-end">

			<div class="col-lg-9">

				<a class="top-bar__link" href="tel:+57 <?php echo $organization[0]->phone_organization ?>">+57 <?php echo $organization[0]->phone_organization ?></a>
				<a class="top-bar__link" href="mailto:<?php echo $organization[0]->email_organization ?>"><?php echo $organization[0]->email_organization ?></a>

			</div>

			<div class="col-lg-3 text-right">

				<ul class="socials">

					<?php 

						foreach($dataSocial as $key => $value){

							if($value['status'] != 0){

								echo '<li class="socials__item"><a class="socials__link" href="'.$value["url"].'" target="_blank"><i class="fa '.$value["red"].'" aria-hidden="true"></i></a></li>';

							}

						}

					?>

				</ul>

			</div>

		</div>

	</div>

</div>