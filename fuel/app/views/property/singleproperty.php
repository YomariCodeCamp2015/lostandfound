<section id="register">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3> Preview Property. </h3>

				<div class="col-md-8">

					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->


						<!--							<ol class="carousel-indicators">
														<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
														<li data-target="#carousel-example-generic" data-slide-to="1"></li>
														<li data-target="#carousel-example-generic" data-slide-to="2"></li>
													</ol>-->

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">

							<?php
							if(!empty($property_img)):
								$i=1;
								foreach($property_img as $property_image):
									?>
									<div class ="item <?php echo ($i==1)?'active':'';?>" style="width:100%; ">
										<img style="display: block; margin-left: auto; margin-right: auto; max-height:100%; max-width:100%; " src="<?php echo Uri::create($property_image);?>">
									</div>
									<?php
									$i++;
								endforeach;
							else:
								?>
								<img src="<?php echo Uri::create('assets/img/property.jpg');?>" alt="#" style='display: block; margin-left: auto; margin-right: auto; max-height:100%; max-width:100%;'></a>
							<?php endif;
							?>
							<!--								<div class="item active">
																<img src="..." alt="...">
															</div>
							
															<div class="item">
																<img src="..." alt="...">
															</div>-->
						</div>

						<ol id="thumbnail">
							<?php
							if(!empty($property_img)):
								$i=0;
								foreach($property_img as $property_image):
									?>
									<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php echo ($i==0)?'active':'';?>">
										<img style="width:100%; cursor:pointer;" src="<?php echo Uri::create($property_image);?>">
									</li>
									<?php
									$i++;
								endforeach;

							endif;
							?>
						</ol>

						<!-- Controls -->
						<!--							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
														<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
														<span class="sr-only">Previous</span>
													</a>
													<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
														<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
														<span class="sr-only">Next</span>
													</a>-->
					</div>

				</div>
				<div class="col-md-4">

					<p class="for-sale-tag">							
<?php echo $property->purpose_name;?>
					</p>
					<p>							
					<h4 style="font-size: 25px;"><?php echo "Name:". $property->name;?></h4>
					</p>

					<p style="font-size: 15px;">							
						<?php echo "Location:".$property->location;?></p>
					<p style="display: block;font-size: 28px; margin: 10px 0 10px 0; color: #42A0FF;">							
<?php echo 'Rs. '.$property->price;?></p>


						<strong>Property no:</strong>
<?php echo $property->propertyno;?></p>

<!--						<p>
	<strong>Type:</strong>
<?php //echo $property->type;?></p>




<p>
	<strong>View:</strong>
<?php //echo $property->view;?></p>
<p>
	<strong>Status:</strong>
<?php //echo $property->status;?></p>-->

				</div>


				<div class="col-md-11">
					<p>
					<h3>Information</h3>					

<?php echo $property->description;?></p>

					<p>
					<h3>Location</h3>
					<article>						

						<script
							src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
						</script>

						<script>
							function initialize()
							{
								var mapProp = {
									center: new google.maps.LatLng(<?php echo $property->matlon;?>, <?php echo $property->maplat;?>),
									zoom: 16,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								};
								var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
							}

							google.maps.event.addDomListener(window, 'load', initialize);
						</script>

						<div id="googleMap" style="width:100%;height:380px;"></div>

						<div style="clear:both"></div>
					</article>
					</p>
					<p>
					<h3>Owner Profile</h3>
					<article class="row">						
						<div class="col-md-2">
							<?php if(!empty($user_profile_img)):?>
								<img  style=" border:1px solid; width:125px; cursor:pointer;" src="<?php echo Uri::create($user_profile_img);?>">
							<?else:?>
								<img style=" border:1px solid; width:125px; cursor:pointer;" src="<?php echo Uri::create('assets/img/profile.jpg');?>">
							<?php endif;
							?>
						</div>
						<div class="col-md-8">
							<p><br/>
								<?php
								echo '<span style="font-size: 25px;">'.$user_profile->name.'</span><br/>'.
								$user_profile->address.'<br/>'.
								'Contact:'.$user_profile->phone.'<br/>
						Email: '.$user_profile->email;
								?>
							</p>
						</div>


					</article>
					</p>
				</div>
			</div>
		</div>
	</div>

</section>

<style>

	#register .container{
		background: #fff;

	}

	#register .row {
		border: 1px solid rgba(0, 0, 0, 0.44);
		margin: 10px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.58);
		padding: 30px;

	}

	#register h3{
		font-size: 24px;
		font-family: 'Sanchez', serif;
		padding-bottom: 10px;
		border-bottom: 1px solid #000;
	}

	#register label{
		font-weight: normal;
	}

	#register .form-control{
		border-radius: 0px;
	}

	#thumbnail li{
		display: inline-block;
		/*		padding: 4px;*/
		border: 1px solid #000;
		width:50px;
		/*		background:#f00;*/
	}
	#thumbnail{
		/*		border: 1px solid #000;
				padding: 2px;*/
		/*		margin-top: 20px;*/
		text-align: center;

	}

	.carousel-inner {
		position: relative;
		width: 100%;
		overflow: hidden;
		height: 400px;
	}

	.carousel{
		border: 1px solid #000;
	}

	.for-sale-tag {
		background: #5CBE6D;
		color: #fff;
		padding: 2px 10px 2px 10px;
		font-weight: bold;
		font-size: 15px;
		width: 89px;
		/* float: left; */
	}


</style>
