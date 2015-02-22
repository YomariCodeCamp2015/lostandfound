
<section id='recent-property' style="background: rgba(219, 19, 95, 0.28);">
	<div class="container">
		<div class="row">

			<div class="col-md-12 ">
				<div class="row recent-heading">
					<h3> Recent Lost Properties</h3>
				</div>




				<div class='row recent-article'>

					<?php foreach($lost_properties as $property):?>
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
					<?php endforeach;?>


				</div>

			</div>
			<!--			<div class="col-md-3">
							<div id="property-search">
								<article>
									<h3><i class="icon-search icon-1x"></i>Find Your Home</h3>
									<form class=''>
										<div class="form-group">
											<label>Location</label>					
											<select class='form-control' name="">
												<option>Any</option>
												<option>Bentleigh East</option>
												<option>McKinnon</option>
												<option>Narrabeen</option>
												<option>Ormond</option>
											</select>
										</div>
			
										<div class="form-group">
											<label>Type</label>	
											<select class='form-control' name="">
												<option>All</option>
												<option>House</option>
												<option>Apartment</option>
												<option>Townhouse</option>
												<option>Villa</option>
												<option>Land</option>
												<option>Acreage</option>
												<option>Rural</option>
												<option>Blocks of Units</option>
												<option>Retirement Living</option>
											</select>
										</div>
			
										<div class="form-group half">
											<label>Beds</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>5+</option>
											</select>
										</div>
			
										<div class="form-group half last">
											<label>Baths</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>5+</option>
											</select>
										</div>
			
										<div class="form-group half">
											<label>Price From</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>50,000</option>
												<option>100,000</option>
												<option>150,000</option>
												<option>200,000</option>
												<option>250,000</option>
												<option>300,000</option>
												<option>350,000</option>
												<option>400,000</option>
												<option>450,000</option>
												<option>500,000+</option>
											</select>
										</div>
			
										<div class="form-group half last">
											<label>Price To</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>50,000</option>
												<option>100,000</option>
												<option>150,000</option>
												<option>200,000</option>
												<option>250,000</option>
												<option>300,000</option>
												<option>350,000</option>
												<option>400,000</option>
												<option>450,000</option>
												<option>500,000+</option>
											</select>
										</div>
			
										<input type="submit" value="Search Now" class="btn btn-primary">
									</form>
								</article>
								<div class="clearfix"></div>
			
							</div>
						</div>-->

		</div>		

	</div>

</section>

<section id='recent-property' style="background: rgba(19, 60, 219, 0.28);">
	<div class="container">
		<div class="row">

			<div class="col-md-12 ">
				<div class="row recent-heading">
					<h3> Recent Found Properties</h3>
				</div>

				<div class='row recent-article'>

					<?php foreach($found_properties as $property):?>
						<div class='col-md-3'>

			<!--							<section class="featured">

										</section>-->

							<article>
								<div class="info-1">
									<div class="for-sale">
										<?php echo $property->purpose_name;?>
									</div>

									<!--									<div class="price">
									<?php //echo 'Rs.'.$property->price;?>
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
					<?php endforeach;?>


				</div>

			</div>
			<!--			<div class="col-md-3">
							<div id="property-search">
								<article>
									<h3><i class="icon-search icon-1x"></i>Find Your Home</h3>
									<form class=''>
										<div class="form-group">
											<label>Location</label>					
											<select class='form-control' name="">
												<option>Any</option>
												<option>Bentleigh East</option>
												<option>McKinnon</option>
												<option>Narrabeen</option>
												<option>Ormond</option>
											</select>
										</div>
			
										<div class="form-group">
											<label>Type</label>	
											<select class='form-control' name="">
												<option>All</option>
												<option>House</option>
												<option>Apartment</option>
												<option>Townhouse</option>
												<option>Villa</option>
												<option>Land</option>
												<option>Acreage</option>
												<option>Rural</option>
												<option>Blocks of Units</option>
												<option>Retirement Living</option>
											</select>
										</div>
			
										<div class="form-group half">
											<label>Beds</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>5+</option>
											</select>
										</div>
			
										<div class="form-group half last">
											<label>Baths</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>5+</option>
											</select>
										</div>
			
										<div class="form-group half">
											<label>Price From</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>50,000</option>
												<option>100,000</option>
												<option>150,000</option>
												<option>200,000</option>
												<option>250,000</option>
												<option>300,000</option>
												<option>350,000</option>
												<option>400,000</option>
												<option>450,000</option>
												<option>500,000+</option>
											</select>
										</div>
			
										<div class="form-group half last">
											<label>Price To</label>
											<select class='form-control' name="">
												<option>Any</option>
												<option>50,000</option>
												<option>100,000</option>
												<option>150,000</option>
												<option>200,000</option>
												<option>250,000</option>
												<option>300,000</option>
												<option>350,000</option>
												<option>400,000</option>
												<option>450,000</option>
												<option>500,000+</option>
											</select>
										</div>
			
										<input type="submit" value="Search Now" class="btn btn-primary">
									</form>
								</article>
								<div class="clearfix"></div>
			
							</div>
						</div>-->

		</div>		

	</div>

</section>




<!--</div>
</div>
</section>-->


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

	#body-container .container{
		background: #fff;

	}

	#body-container .body-row {
		border: 1px solid rgba(0, 0, 0, 0.44);		
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.58);
		padding: 30px;
		margin: 10px -3px;

	}

	#featured-property .carousel-control{
		position: relative;
		padding: 10px;
		background: #fff;
		color: #191720;
		opacity: 1;
		border: 1px solid #000;
	}


	.ribbon-wrapper {
		margin: 50px auto;
		width: 280px;
		height: 370px;
		background: white;
		border-radius: 10px;
		-webkit-box-shadow: 0px 0px 8px rgba(0,0,0,0.3);
		-moz-box-shadow:    0px 0px 8px rgba(0,0,0,0.3);
		box-shadow:         0px 0px 8px rgba(0,0,0,0.3);
		position: relative;
		z-index: 90;
	}

	.ribbon-wrapper-green {
		width: 85px;
		height: 88px;
		overflow: hidden;
		position: absolute;
		top: -3px;
		right: -3px;
	}

	.ribbon-green {
		font: bold 15px Sans-Serif;
		color: #333;
		text-align: center;
		text-shadow: rgba(255,255,255,0.5) 0px 1px 0px;
		-webkit-transform: rotate(45deg);
		-moz-transform:    rotate(45deg);
		-ms-transform:     rotate(45deg);
		-o-transform:      rotate(45deg);
		position: relative;
		padding: 7px 0;
		left: -5px;
		top: 15px;
		width: 120px;
		background-color: #BFDC7A;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#BFDC7A), to(#8EBF45)); 
		background-image: -webkit-linear-gradient(top, #BFDC7A, #8EBF45); 
		background-image:    -moz-linear-gradient(top, #BFDC7A, #8EBF45); 
		background-image:     -ms-linear-gradient(top, #BFDC7A, #8EBF45); 
		background-image:      -o-linear-gradient(top, #BFDC7A, #8EBF45); 
		color: #6a6340;
		-webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
		-moz-box-shadow:    0px 0px 3px rgba(0,0,0,0.3);
		box-shadow:         0px 0px 3px rgba(0,0,0,0.3);
	}

	.ribbon-green:before, .ribbon-green:after {
		content: "";
		border-top:   3px solid #6e8900;   
		border-left:  3px solid transparent;
		border-right: 3px solid transparent;
		position:absolute;
		bottom: -3px;
	}

	.ribbon-green:before {
		left: 0;
	}
	.ribbon-green:after {
		right: 0;
	}



	.featured{
		margin: 40px auto 30px auto;
		width: 200px;
		height: 180px;
		background: white;
		box-shadow: -1px -1px 10px #DDD;
	}

	/* This bit does the rhombus that sits in the top left hand corner */
	.featured:before{
		content: "";
		display: block;
		position: relative;
		width:0px;
		height: 0px;
		top: 5px;
		left: -40px;

		width: 80px;
		height: 20px;
		box-shadow: 0 2px 0 #DDD;

		text-align: center;
		-webkit-transform: rotateZ(-45deg);
		-moz-transform: rotateZ(-45deg);

		/* Rhombus */
		border-width: 0 30px 30px 30px;
		border-style: solid;
		border-color: transparent transparent #3AE transparent;


	}

	/* This does the text "featured" and the gradient that makes it look curved */
	.featured:after{
		display: block;
		position: relative;
		content: "featured";

		color: green;
		top: -29px;
		left: -33px;
		width: 140px;
		height: 28px;
		padding-top: 5px;

		background: transparent;
		background-image:

			-webkit-linear-gradient(45deg, 
			transparent 0%,
			transparent 77%,
			rgba(255,255,255,0.3) 80%,
			rgba(255,255,255,0.3) 81%, 
			rgba(0,0,0,0.4) 82%,
			transparent 83%
			),

			-webkit-linear-gradient(-45deg,
			transparent 0%,
			transparent 17%,
			rgba(0,0,0,0.5) 18%,
			rgba(255,255,255,0.3) 19%,
			rgba(255,255,255,0.3) 20%,
			transparent 23%
			);
		background-image:
			-moz-linear-gradient(45deg, 
			transparent 0%,
			transparent 77%,
			rgba(255,255,255,0.3) 80%,
			rgba(255,255,255,0.3) 81%, 
			rgba(0,0,0,0.4) 82%,
			transparent 83%
			),
			-moz-linear-gradient(-45deg,
			transparent 0%,
			transparent 17%,
			rgba(0,0,0,0.5) 18%,
			rgba(255,255,255,0.3) 19%,
			rgba(255,255,255,0.3) 20%,
			transparent 23%
			);

		-webkit-transform: rotateZ(-45deg);
		-moz-transform: rotateZ(-45deg);

		color: rgba(0,0,0,0.5);
		font-weight: bold;
		font-family: georgia, 'Times New Roman', Times, serif;
		text-align: center;
		text-shadow: 0 1px rgba(255,255,25,0.1);
	}

	/*
		body{
	
			background:
				-webkit-radial-gradient(rgba(0,0,0,0.05) 15%, transparent 16%) 0 0,
				-webkit-radial-gradient(rgba(0,0,0,0.05) 15%, transparent 16%) 8px 8px,
				-webkit-radial-gradient(rgba(0,0,0,.05) 15%, transparent 20%) 0 1px,
				-webkit-radial-gradient(rgba(0,0,0,.05) 15%, transparent 20%) 8px 9px;
	
			background:
				-moz-radial-gradient(rgba(0,0,0,0.05) 15%, transparent 16%) 0 0,
				-moz-radial-gradient(rgba(0,0,0,0.05) 15%, transparent 16%) 8px 8px,
				-moz-radial-gradient(rgba(0,0,0,.05) 15%, transparent 20%) 0 1px,
				-moz-radial-gradient(rgba(0,0,0,.05) 15%, transparent 20%) 8px 9px;
	
			background-color:#FAFAFA;
			background-size:16px 16px;
		}*/
</style>