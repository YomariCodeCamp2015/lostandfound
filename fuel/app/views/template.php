<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>
		<?php echo Asset::css(array('bootstrap.css','custom.css','font-awesome.css'));?>
		<link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>		<?php
		echo Asset::js(array(
			'jquery-1.7.2.min.js',
			'bootstrap.js'
		));
		?>
		<script>
			$(function () {
				$('.topbar').dropdown();
			});
		</script>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<h3>Lost & Found </h3>
					</div>


					<div class="col-md-4"> 


						<form class="form-inline" method="POST" action="<?php echo Uri::create('page/search');?>">
							<div class="form-group">

								<select class="form-control" name="type">
									<option value="1" class="select-option">Lost</option>
									<option value="2" class="select-option">Found</option>
								</select>
							</div><!--
							--><div class="form-group top-form-group">
								<input type="text" name="search_key" class="form-control top-search" id="exampleInputEmail2" placeholder="Search property">

							</div><!--
							--><button type="submit" class="btn btn-default top-button"><span class="glyphicon glyphicon-search"></span></button>
						</form>

						<!--						<nav class="pull-right">
													<a href="<?php echo Uri::base();?>">Home</a>
													<a href="<?php echo Uri::create('page/properties');?>">Property </a>
													<a href="<?php echo Uri::create('user/register');?>">Sign in / Register</a>
													<a href="#">Help</a>
												</nav>-->

					</div>

					<div class="col-md-5 sociallink">

						<div class="pull-right">
							<nav class="pull-right">
								<a href="<?php echo Uri::base();?>">Home</a>
								<a href="<?php echo Uri::create('page/properties');?>">Property </a>
								<a href="<?php echo Uri::create('user/register');?>">Sign in / Register</a>
								<a href="#">Help</a>
							</nav>
<!--							<a id="call" href="#"> <i class="icon-phone icon-1x"> </i> Call Us: +977-01-6201234</a>
							<a id ="social-link" href="#"><i class="icon-facebook icon-1x"></i></a>-->
						</div>
					</div>


				</div>
			</div>
		</header>

<!--		<section id="custom-slider" class="slider-background-1">
			<div class="container">
				<div class="row">

					<ul id="custom-slider-list">
						<li class="active">
							<div class="oSlideContainer oSlideContainerHeight">
								<div class="slide-content">
									<div class="slide-title">
										Get your job done—<strong class="">on demand</strong>
									</div>
									<div class="slide-description">
										<p class="slide-from-right">
											Click through below to learn how to tackle virtually any project on your timeline and terms.
										</p>
									</div>
								</div>
							</div>
						</li>

						<li class="">
							<div class="oSlideContainer oSlideContainerHeight">
								<div class="slide-content">
									<div class="slide-title">
										Locate your property—<strong class="">on google map</strong>
									</div>
									<div class="slide-description">
										<p class="slide-from-right">
											Click through below to learn how to tackle virtually any project on your timeline and terms.
										</p>
									</div>
								</div>
							</div>
						</li>

						<li class="">
							<div class="oSlideContainer oSlideContainerHeight">
								<div class="slide-content">
									<div class="slide-title">
										Sell/ get Paid—<strong class="">on google map</strong>
									</div>
									<div class="slide-description">
										<p class="slide-from-right">
											Click through below to learn how to tackle virtually any project on your timeline and terms.
										</p>
									</div>
								</div>
							</div>
						</li>
					</ul>

					<nav id="slider-nav">
						<div class="nav-border"> 

							<ul>
								<li>
									<div class="nav-list-title">
										POST
									</div>

									<div class="icons-div">										
										<span class="glyphicon glyphicon-pencil pattern-icon nav-icon-1" data-id="1" ></span>										
									</div>



								</li>
								<li>
									<div class="nav-list-title">
										LOCATE
									</div>

									<div class="icons-div">										
										<span class="glyphicon glyphicon-map-marker pattern-icon nav-icon-2 active" data-id="2"></span>										
									</div>

								</li>
								<li>
									<div class="nav-list-title">
										SELL
									</div>

									<div class="icons-div">										
										<span class="glyphicon glyphicon-usd pattern-icon nav-icon-3" data-id="3"></span>										
									</div>

								</li>


							</ul>

							<div id="nav-slider-backgroud">

							</div>

						</div>
					</nav>




				</div>
			</div>
			<div class="nav-left-right">
				<div class="nav-left">
					<span class="glyphicon glyphicon-chevron-left slider-button"></span>		
				</div>
				<div class="nav-right">

					<span class="glyphicon glyphicon-chevron-right slider-button"></span>										

				</div>
			</div>
		</section>-->

		<?php echo $content;?>

		<footer>
			<div class="container footer-container">
				<div class="col-md-4"><p> © Copyright 2014. All rights reserved.</p></div>
				<div class="col-md-4">
					<p> Site designed and developed by, <a href="#"><mark style="color: crimson;background: none;">shakyas.</mark> </a></p>
				</div>
				<div class='col-md-4'>
					<div class='pull-right'>
						<a href="">Terms of Use </a>
						<a href="" style="border-right: 2px solid; border-left: 2px solid;">Privicy Policy </a>
						<a href="">Site Map </a>
					</div>
				</div>
			</div>
		</footer>

		<script>

			$("#property-img-add").click(function () {
				//alert("hello");
				$("#property-img-file").click();
				//return false;
			});

			$('body').on('change', '#property-img-file', function (evt) {
				if (window.FileReader) {
					reader = new FileReader();
					file = $(this)[0].files[0];
					filetype = $(file).attr('type');

					if (filetype == 'image/jpeg' || filetype == 'image/png')
					{
						reader.onloadend = function (e) {
							var imageLI = $('<li style="margin: 2px;"><img src = "' + e.target.result + '" style="width:100%; cursor:pointer;"></img></li>');
							$('#property-img-add').before(imageLI.clone());
							//html('<img src = "' + e.target.result + '" style="width:100%; cursor:pointer;"></img>');
						};
						reader.readAsDataURL(file);

						//Call file uploader here.
						$.when(postProfileImage('property-image-form', 'user/property/postPropertyImage')).done().fail();
					}
					else
					{
						$('#profile-img').html('Not Image file uploaded');
					}
				}

			});



			$("#profile-img").click(function () {
				$("#profile-img-file").click();
				return false;
			});

			$('body').on('change', '#profile-img-file', function (evt) {
				if (window.FileReader) {
					reader = new FileReader();
					file = $(this)[0].files[0];
					filetype = $(file).attr('type');

					if (filetype == 'image/jpeg' || filetype == 'image/png')
					{
						reader.onloadend = function (e) {
							$('#profile-img').html('<img src = "' + e.target.result + '" style="width:60%; cursor:pointer;"></img>');
						};
						reader.readAsDataURL(file);

						//Call file uploader here.
						$.when(postProfileImage('profile-image-form', 'user/dashboard/postProfileImage')).done().fail();
					}
					else
					{
						$('#profile-img').html('Not Image file uploaded');
					}
				}

			});

			function postProfileImage(imageID, url) {
				var ajaxform = document.getElementById(imageID);
				//          var ajaxform = $('form#photo-upload-form');
				var formdata = new FormData(ajaxform);
				//var url = url;
				return $.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: formdata,
					url: "<?php echo Uri::base();?>" + url,
//					success: function(response)
//					{
//						if (response.success) {
//							$('#profile_display').html(response.html);
//							$('#profileEditModal').modal('hide');
//						}
//						else
//						{
//							console.log(response.error);
//							$('#modal-error').html(response.error);
//						}
//					},
					processData: false,
					contentType: false,
				});
			}



			$('body').on('click', '#edit-profile', function (e) {
				$("#profileEditModal .modal-title").html('Edit Profile');
				$.get("<?php echo Uri::create('user/dashboard/profileEdit');?>", function (data) {
					$("#profileEditModal .modal-body").html(data);
				});
				$("#profileEditModal .modal-footer .modal-submit").html('Edit Profile').removeClass().addClass('btn btn-primary modal-submit profile-edit');
				$('#modal-error').html('');
				$('#profileEditModal').modal('show');

			})



			$('#profileEditModal').on('click', '.profile-edit ', function (e) {
				var ajaxform = document.getElementById('profile-edit-form');
// var ajaxform = $('form#photo-upload-form');
				var formdata = new FormData(ajaxform);
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: formdata,
					url: "<?php echo Uri::create('user/dashboard/profileEdit');?>",
					success: function (response)
					{
						if (response.success) {
							$('#profile_display').html(response.html);
							$('#profileEditModal').modal('hide');
							location.reload();
						}
						else
						{
							console.log(response.error);
							$('#modal-error').html(response.error);
						}
					},
					processData: false,
					contentType: false,
				});
			});



			$(".nav-left").click(function () {
			
				var activeSlide = $(".pattern-icon.active").attr('data-id');
				var nextslide = parseInt(activeSlide) - 1;
				if ((nextslide) > 0)
				{
					$(".nav-icon-" + nextslide).click();
				}
			})
			
			
			$(".nav-right").click(function () {
				
				var activeSlide = $(".pattern-icon.active").attr('data-id');
				var nextslide = parseInt(activeSlide) + 1;
			
				if ((nextslide) < 4)
				{
					$(".nav-icon-" + nextslide).click();
				}
			})



			$(".pattern-icon").click(function () {
				var offset = $(this).offset();

				var listNumber = $(this).attr('data-id');
				$(".pattern-icon").removeClass('active');
				$(this).addClass('active');

				$("#custom-slider-list li.active").animate({
					left: "-=1024",
				}, 1200, function () {
					// Animation complete.
					$("#custom-slider-list li").removeClass('active').css("left", "0");

					$("#custom-slider").removeClass().addClass("slider-background-" + listNumber + "");
					$("#custom-slider-list li:nth-child(" + listNumber + ")").addClass('active');


				});

				$("#nav-slider-backgroud").animate({
					left: offset.left - 410,
				}, 200, function () {
					// Animation complete.
				});
			});

		</script>


	</body>
</html>



