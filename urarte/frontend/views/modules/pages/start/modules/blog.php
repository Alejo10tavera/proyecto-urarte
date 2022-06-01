<?php 

/*=============================================
Traer todas las publicaciones
=============================================*/
$select = "image_blog,name_blog,title_blog,route_blog,headline_blog,date_blog,views_blog,status_blog,id_category,name_category,color_category";
$url = CurlController::api()."relations?rel=blogs,categories&type=blog,category&linkTo=process_blog&equalTo=2&linkTo_=bdelete_blog&equalTo_=0&orderBy=id_blog&orderMode=DESC&startAt=0&endAt=3&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$blogs = CurlController::request($url, $method, $fields, $header)->results;

?>

<section class="section blog blog--front_3"><img class="blog__bg" src="<?php echo $backoffice ?>views/img/template/blog_bg-2.png" alt="<?php echo $organization[0]->name_organization ?>"/>
	<div class="container">
		<div class="row margin-bottom">
			<div class="col-12">
				<div class="heading heading--primary heading--center"><span class="heading__pre-title">Blog</span>
					<h2 class="heading__title no-margin-bottom"><span>Publicaciones</span></h2>
				</div>
			</div>
		</div>
		<div class="row offset-margin">

			<?php 

				foreach ($blogs as $key => $value) {
					
					if($value->status_blog != 0){

						echo '<div class="col-md-6 col-xl-4">
								<div class="blog-item blog-item--style-1">
									<div class="blog-item__img"><img class="img--bg" src="'.$backoffice.'views/img/blogs/'.$value->id_category.'/logo/'.$value->image_blog.'" alt="'.$value->name_blog.'"/><span class="blog-item__badge" style="background-color: '.$value->color_category.';">'.$value->name_category.'</span></div>
									<div class="blog-item__content">
										<h6 class="blog-item__title"><a href="'.$path.$value->route_blog.'">'.$value->title_blog.'</a></h6>
										<p>'.$value->headline_blog.'</p>
										<div class="blog-item__details"><span class="blog-item__date">'.$value->date_blog.'</span><span>
											<i class="fa fa-eye"></i> '.$value->views_blog.'</span></div>
									</div>
								</div>
							</div>';

					}

				}

			?>
			
		</div>
	</div>
</section>