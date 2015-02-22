<?php echo Form::open(array("class"=>"form"));?>
<fieldset>

	<?php
	if($val->error_message()){
		$validation_errors=$val->error_message();
	};
	?>

	<!--
		<div class ="row">
			<h3> Select package for the property.</h3>
			<div class='col-md-4'>
				<article>
					<h3> Golden Package Rs.2000</h3>
					<h4> Features </h4>
	
					<input class="big-select" type='radio' name='package' value='1' <?php echo isset($property)?($property->package==1?'checked':'' ):'';?>/>
					<label> Select golden </label>
				</article>
			</div>
	
			<div class='col-md-4'>
				<article>
					<h3> Siver Package Rs.1000</h3>
					<h4> Features </h4>
	
					<input class="big-select" type='radio' name='package' value='2' <?php echo isset($property)?($property->package==2?'checked':'' ):'';?>/>
					<label> Select silver </label>
				</article>
			</div>
	
			<div class='col-md-4'>
				<article>
					<h3> Free Package Rs.0</h3>
					<h4> Features </h4>
	
					<input class="big-select" type='radio' name='package' value='3' <?php echo isset($property)?($property->package==3?'checked':'' ):'';?>/>
					<label> Select free </label>
				</article>
			</div>
		</div>-->




	<!--	<div class="form-group col-md-4">
	<?php //echo Form::label('Package','package',array('class'=>'control-label'));?>
	<?php //echo Form::input('package',Input::post('package',isset($property)?$property->package:''),array('class'=>'col-md-4 form-control','placeholder'=>'Package'));?>
		</div>-->


	<div class="row">
		<h3> Description About Property </h3>

		<div class="form-group col-md-4 <?php echo!$val->error('purpose') ?:'has-error'?>">
			<?php echo Form::label('Purpose','purpose',array('class'=>'control-label'));?>
			<?php
			echo "<select name='purpose'>";
			foreach($purposes as $purpose){

				echo "<option value=".$purpose->id.">".$purpose->name."</option>";
			}
			echo "</select>";

			//echo Form::select('country','none',array('none'=>'None','us'=>'United States'));
			?>
			<?php //echo Form::input('purpose',Input::post('purpose',isset($property)?$property->purpose:''),array('class'=>'col-md-4 form-control','placeholder'=>'Purpose'));?>

			<?php if($val->error('purpose')):?>
				<div class="control-label has-error"><?php echo $val->error('purpose')->get_message($validation_errors['purpose']);?></div>
			<?php endif;?>
		</div>


		<div class="form-group col-md-4 <?php echo!$val->error('propertyno') ?:'has-error'?>">
			<?php echo Form::label('Propertyno','propertyno',array('class'=>'control-label'));?>
			<?php echo Form::input('propertyno',Input::post('propertyno',isset($property)?$property->propertyno:''),array('class'=>'col-md-4 form-control','placeholder'=>'Propertyno'));?>

			<?php if($val->error('propertyno')):?>
				<div class="control-label has-error"><?php echo $val->error('propertyno')->get_message($validation_errors['propertyno']);?></div>
			<?php endif;?>
		</div>

		<div class="form-group col-md-6 <?php echo!$val->error('name') ?:'has-error'?>">
			<?php echo Form::label('Name of property:','name',array('class'=>'control-label'));?>
			<?php echo Form::input('name',Input::post('name',isset($property)?$property->name:''),array('class'=>'col-md-6 form-control','placeholder'=>'Name'));?>

			<?php if($val->error('name')):?>
				<div class="control-label has-error"><?php echo $val->error('name')->get_message($validation_errors['name']);?></div>
			<?php endif;?>
		</div>

		<div class="form-group col-md-11 <?php echo!$val->error('description') ?:'has-error'?>">
			<?php echo Form::label('Description','description',array('class'=>'control-label'));?>
			<?php echo Form::textarea('description',Input::post('description',isset($property)?$property->description:''),array('class'=>'col-md-8 form-control','rows'=>8,'placeholder'=>'Description'));?>

			<?php if($val->error('description')):?>
				<div class="control-label has-error"><?php echo $val->error('description')->get_message($validation_errors['description']);?></div>
			<?php endif;?>
		</div>

		<br/>

<!--		<div class="form-group col-md-4 <?php echo!$val->error('beds') ?:'has-error'?>">
		<?php echo Form::label('Beds','beds',array('class'=>'control-label'));?>

		<?php echo Form::input('beds',Input::post('beds',isset($property)?$property->beds:''),array('class'=>'col-md-4 form-control','placeholder'=>'Beds'));?>

		<?php if($val->error('beds')):?>
					<div class="control-label has-error"><?php echo $val->error('beds')->get_message($validation_errors['beds']);?></div>
		<?php endif;?>
		</div>-->

<!--		<div class="form-group col-md-4 <?php echo!$val->error('area') ?:'has-error'?>">
		<?php echo Form::label('Area','area',array('class'=>'control-label'));?>

		<?php echo Form::input('area',Input::post('area',isset($property)?$property->area:''),array('class'=>'col-md-4 form-control','placeholder'=>'Area'));?>

		<?php if($val->error('area')):?>
					<div class="control-label has-error"><?php echo $val->error('area')->get_message($validation_errors['area']);?></div>
		<?php endif;?>
		</div>-->

<!--		<div class="form-group col-md-4 <?php echo!$val->error('baths') ?:'has-error'?>">
		<?php echo Form::label('Baths','baths',array('class'=>'control-label'));?>

		<?php echo Form::input('baths',Input::post('baths',isset($property)?$property->baths:''),array('class'=>'col-md-4 form-control','placeholder'=>'Baths'));?>

		<?php if($val->error('baths')):?>
					<div class="control-label has-error"><?php echo $val->error('baths')->get_message($validation_errors['baths']);?></div>
		<?php endif;?>
		</div>-->



		<!--		<div class="form-group col-md-4">
		
		<?php echo Form::label('Type','type',array('class'=>'control-label'));?>
		<?php echo Form::input('type',Input::post('type',isset($property)?$property->type:''),array('class'=>'col-md-4 form-control','placeholder'=>'Type'));?>
		
				</div>-->



		<!--		<div class="form-group col-md-4">
		<?php echo Form::label('View','view',array('class'=>'control-label'));?>
		<?php echo Form::input('view',Input::post('view',isset($property)?$property->view:''),array('class'=>'col-md-4 form-control','placeholder'=>'View'));?>
				</div>-->

	</div>

	<div class="row">
		<h3> Locate your property </h3>
		<div class="form-group col-md-4">
			<?php echo Form::label('Location','location',array('class'=>'control-label'));?>

			<?php echo Form::input('location',Input::post('location',isset($property)?$property->location:''),array('class'=>'col-md-4 form-control','placeholder'=>'Location'));?>

		</div>
		<div class="form-group col-md-4">
			<?php echo Form::label('Maplat','maplat',array('class'=>'control-label'));?>

			<?php echo Form::input('maplat',Input::post('maplat',isset($property)?$property->maplat:''),array('class'=>'col-md-4 form-control','placeholder'=>'Maplat'));?>

		</div>
		<div class="form-group col-md-4">
			<?php echo Form::label('Matlon','matlon',array('class'=>'control-label'));?>

			<?php echo Form::input('matlon',Input::post('matlon',isset($property)?$property->matlon:''),array('class'=>'col-md-4 form-control','placeholder'=>'Matlon'));?>

		</div>

	</div>
<!--	<div class ="row">
		<h3> Price Rate </h3>
		<div class="form-group col-md-6">
			<?php echo Form::label('Price','price',array('class'=>'control-label'));?>
			<?php echo Form::input('price',Input::post('price',isset($property)?$property->price:''),array('class'=>'col-md-6 form-control','placeholder'=>'Price'));?>
		</div>

		<div class="form-group col-md-4">
			<?php echo Form::label('Status','status',array('class'=>'control-label'));?>
			<?php echo Form::input('status',Input::post('status',isset($property)?$property->status:''),array('class'=>'col-md-4 form-control','placeholder'=>'Status'));?>
		</div>
	</div>-->

	<div class="form-group">
		<label class='control-label'>&nbsp;</label>
		<?php echo Form::submit('submit','Save and Preview',array('class'=>'btn btn-primary'));?>		</div>
</fieldset>
<?php echo Form::close();?>