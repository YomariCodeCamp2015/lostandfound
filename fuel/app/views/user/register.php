<section id="register">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<article>
					<h3> Sign In </h3>
					<form action="<?php echo Uri::create('user/login');?>" method="post">

						<?php
						if(!empty($login_error)){
							echo "<h5 class='alert alert-danger'>".$login_error."</h5>";
						}
						if(($login_val->error_message())){
							$login_validation_errors=$login_val->error_message();
						};
						?>

						<div class="form-group <?php echo!$login_val->error('login_email') ?:'has-error'?>">
							<div class="form-group">
								<label>Email</label>	
								<?php echo Form::input('login_email',Input::post('login_email'),array('type'=>'email','class'=>'form-control','placeholder'=>'Email Address','autofocus'));?>
							</div>

							<?php if($login_val->error('login_email')):?>
								<span class="control-label"><?php echo $login_val->error('login_email')->get_message($login_validation_errors['login_email']);?></span>
							<?php endif;?>
						</div>

						<div class="form-group <?php echo!$login_val->error('login_password') ?:'has-error'?>">
							<div class="form-group">
								<label>Password</label>		
								<?php echo Form::input('login_password',Input::post('login_password'),array('type'=>'password','class'=>'form-control','placeholder'=>'Passsword.','autofocus'));?>
							</div>
							<?php if($login_val->error('login_password')):?>
								<span class="control-label"><?php echo $login_val->error('login_password')->get_message($login_validation_errors['login_password']);?></span>
							<?php endif;?>
						</div>
						<input type="submit" value="Sign In" class="btn btn-primary">
					</form>
				</article>

			</div>

			<div class="col-md-6">
				<article>
					<h3> Create an Account  <span class="pull-right" style="font-size: 14px;">or <a href="#signin">Sign in</a></span> </h3>
					<form method="post" action="<?php echo Uri::create('user/register');?>">
						<?php if(Session::get_flash('error')):?>
							<div class="alert alert-danger">
							<?php
							$msg=implode('<p><p>',e((array)Session::get_flash('error')));
							echo html_entity_decode($msg);
							?>
							</div>
								<?php
							endif;

							if($val->error_message()){
								$validation_errors=$val->error_message();
							};
							?>

						<div class="form-group <?php echo!$val->error('firstname') ?:'has-error'?>">
							<div class="form-group">
								<label>First Name</label>
<?php echo Form::input('firstname',Input::post('firstname'),array('class'=>'form-control','placeholder'=>'First Name','autofocus'));?>
							</div>
								<?php if($val->error('firstname')):?>
								<span class="control-label"><?php echo $val->error('firstname')->get_message($validation_errors['firstname']);?></span>
							<?php endif;?>
						</div>

						<div class="form-group <?php echo!$val->error('lastname') ?:'has-error'?>">
							<div class="form-group">
								<label>Last Name</label>	
<?php echo Form::input('lastname',Input::post('lastname'),array('class'=>'form-control','placeholder'=>'Last Name','autofocus'));?>
							</div>
								<?php if($val->error('lastname')):?>
								<span class="control-label"><?php echo $val->error('lastname')->get_message($validation_errors['lastname']);?></span>
							<?php endif;?>
						</div>

						<div class="form-group <?php echo!$val->error('email') ?:'has-error'?>">
							<div class="form-group">
								<label>Email</label>	
<?php echo Form::input('email',Input::post('email'),array('type'=>'email','class'=>'form-control','placeholder'=>'Email Address','autofocus'));?>
							</div>

<?php if($val->error('email')):?>
								<span class="control-label"><?php echo $val->error('email')->get_message($validation_errors['email']);?></span>
							<?php endif;?>
						</div>

						<div class="form-group <?php echo!$val->error('password') ?:'has-error'?>">
							<div class="form-group">
								<label>Password</label>		
<?php echo Form::input('password',Input::post('password'),array('type'=>'password','class'=>'form-control','placeholder'=>'Passsword.','autofocus'));?>
							</div>
								<?php if($val->error('password')):?>
								<span class="control-label"><?php echo $val->error('password')->get_message($validation_errors['password']);?></span>
							<?php endif;?>
						</div>


						<div class="form-group <?php echo!$val->error('re-password') ?:'has-error'?>">
							<div class="form-group">
								<label>Confirm Password</label>	
<?php echo Form::input('re-password',Input::post('re-password'),array('type'=>'password','class'=>'form-control','placeholder'=>'Type your password again.','autofocus'));?>
							</div>
								<?php if($val->error('re-password')):?>
								<span class="control-label"><?php echo $val->error('re-password')->get_message($validation_errors['re-password']);?></span>
							<?php endif;?>
						</div>


						<div class="form-group <?php echo!$val->error('address') ?:'has-error'?>">
							<div class="form-group">
								<label>Address</label>	
<?php echo Form::input('address',Input::post('address'),array('type'=>'text','class'=>'form-control','placeholder'=>'Address.','autofocus'));?>
							</div>
								<?php if($val->error('address')):?>
								<span class="control-label"><?php echo $val->error('address')->get_message($validation_errors['address']);?></span>
							<?php endif;?>
						</div>

						<p> By clicking Register. I agree to the <a>Terms and Conditions </a> and <a>Privacy policy.</a></p>

						<input type="submit" value="Register" class="btn btn-primary">
					</form>



				</article>
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

</style>