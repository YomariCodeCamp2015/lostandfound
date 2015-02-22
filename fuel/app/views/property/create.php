<section id="register">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3> User Dashboard </h3>
			</div>
			<div class="col-md-12" style="background: rgba(233, 220, 220, 0.21);
				 border: 1px solid rgba(0, 0, 0, 0.23);
				 padding: 15px;">
				<h3> Add New Property. </h3>				
				<?php echo render('property/_form',array('purposes'=>$purposes,'val'=>$val),false);?>
			</div>
			<p><?php echo Html::anchor('property','Back');?></p>
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

</style>
