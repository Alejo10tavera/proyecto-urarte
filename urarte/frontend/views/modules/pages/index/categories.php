<?php 

/*=============================================
Traer todas las categorias
=============================================*/
$select = "*";
$url = CurlController::api()."categories?linkTo=status_category&equalTo=1&linkTo_=bdelete_category&equalTo_=0&orderBy=id_category&orderMode=ASC&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$categories = CurlController::request($url, $method, $fields, $header)->results;

?>

<section class="section">

	<div class="container">

		<div class="row margin-bottom">
			<div class="col-12">
				<div class="heading heading--primary heading--center">
					<span class="heading__pre-title">Categorías</span>					
				</div>
			</div>
		</div>

		<div class="row offset-margin">

			<?php 

				foreach ($categories as $key => $value) {
					
					echo '<div class="col-6 col-md-4 col-lg-3">
							<div class="icon-item">
								<div class="icon-item__img"><img src="'.$backoffice.'views/img/categories/'.$value->image_category.'" alt="icon"/></div>
								<div class="icon-item__text">
									<h6 class="causes-item__title"> <a href="'.$value->route_category.'">'.$value->name_category.'</a></h6>
								</div>
							</div>
						</div>';

				}

			?>

		</div>

	</div>

</section>