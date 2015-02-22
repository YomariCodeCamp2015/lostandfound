<section id="register">
	<div class="container">
		<div class="row main-container">
			<section id='recent-property'>
				<div class="container">
					<div class="row">

						<div class="col-md-12 ">
							<div class="row recent-heading">
								<h3> Properties 
									<span class="pull-right">

										<div class="list-view-trigger" style="display: inline-block;">
											<i class="glyphicon glyphicon-th-list"></i>
										</div>
										<div class="grid-view-trigger" style="display: inline-block;">
											<i class="glyphicon glyphicon-th"></i>
										</div>
									</span>
								</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class='recent-article'>

								<div class="grid-view">



									<div class='row recent-article'>

										<?php if(!empty($lost_properties)) : foreach($lost_properties as $property):?>
												<div class='col-md-3'>

											<!--							<section class="featured">

																		</section>-->

													<article>
														<div class="info-1">
															<div class="for-sale">
																<?php echo $property->purpose_name;?>
															</div>

															<!--									<div class="price">
															<?php // echo 'Rs.'.$property->price;?>
																								</div>-->
														</div>

														<?php
														$property_img='';
														$path='uploads/users/user_'.$property->user_id.'/property/property_'.$property->id.'/';

														$upload_path=DOCROOT.$path;
														$imagefile=Utils_Readfile::getFile($path);

														if($imagefile){
															$property_img=$imagefile;
														}
														?>


														<div class="property-image-div" style="width:100%; height:250px;">
															<a href="<?php echo Uri::create('page/property/'.$property->id);?>"><img src="<?php echo (!empty($property_img))?Uri::create($property_img):Uri::create('assets/img/property.jpg');?>" alt="#" style='width:100%'></a>
														</div>
														<div class="info">
															<h4><?php echo $property->name;?></h4>
															<?php echo "Property No:".$property->propertyno;?>
															<div class="features">
																<span class="area"><?php echo "Location:".$property->location;?></span>
															</div>
														</div>

													</article>

												</div>
												<?php
											endforeach;
										else:
											?>
										Nothing Found for your Search./ please register the property.
										<?php endif;?>


									</div>
									<?php /* foreach($sliver_properties as $property):?>
									  <div class='col-md-3'>
									  <article class="property-info">

									  <div class="info-1">
									  <div class="for-sale purpose">
									  <?php echo 'For '.$property->purpose_name;?>
									  </div>

									  <div class="price rate">
									  <?php echo 'Rs.'.$property->price;?>
									  </div>
									  </div>


									  <?php
									  $property_img='';
									  $path='uploads/users/user_'.$property->user_id.'/property/property_'.$property->id.'/';

									  $upload_path=DOCROOT.$path;
									  $imagefile=Utils_Readfile::getFile($path);

									  if($imagefile){
									  $property_img=$imagefile;
									  }
									  ?>

									  <div class="info">
									  <div class="property-image-div" style="width:100%;" class="img-property">
									  <a href="<?php echo Uri::create('page/property/'.$property->id);?>"><img src="<?php echo (!empty($property_img))?Uri::create($property_img):Uri::create('assets/img/property.jpg');?>" alt="#" style='width:100%'></a>
									  </div>
									  <h4 class="property-name"><?php echo $property->name;?></h4>

									  <div class="location">
									  <?php echo $property->location_name.' '.$property->propertyno;?>
									  </div>

									  <div class="features">
									  <span class="area"><?php echo $property->area;?></span>
									  <span class="bath"><?php echo $property->baths;?></span>
									  <span class="bed"><?php echo $property->beds;?></span>
									  </div>
									  </div>

									  </article>
									  </div>
									  <?php endforeach; */?>
								</div>

							</div>

						</div>
					</div>	
				</div>
		</div>

	</div>

</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<?php //echo \Pagination::create_links();?>
				<?php echo html_entity_decode($pagination);?>
				<!--							<ul class='pagination'>
												<li><a href="#">Prev</a></li>
												<li class="active"><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#">Next</a></li>
											</ul>-->

			</div>
		</div>
</section>


<style>


	.property-image-div{
		height: 175px;		
	}

	.recent-heading{
		background: #fff;
		padding-left: 25px;
		margin-top: 9px;
	}
	article{
		background: #fff;
		padding: 5px;
		border: 1px solid rgba(21, 21, 21, 0.42);
		border-bottom: 3px solid rgba(0, 0, 0, 0.47);
	}

	.property-image-div{
		border: 1px solid #DACDCD;
	}
	#register .container{
		background: #fff;

	}

	#register .main-container {
		border: 1px solid rgba(0, 0, 0, 0.44);
		margin: 10px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.58);
		padding: 0px 30px 30px;

	}

	#register h3{
		font-size: 24px;
		font-family: 'Sanchez', serif;
		padding-bottom: 10px;
		border-bottom: 1px solid #000;
	}

	.tag{
		border: 1px solid #D3173B;
		padding: 5px;
		display: inline-block;
		margin: 5px;
		background: #000;
		color: #fff;
	}
</style>

<script type="text/javascript" src="<?php echo Uri::create('assets/js/viewchange.js');?>">
</script>
