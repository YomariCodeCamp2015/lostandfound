

<?php echo Form::open(array("class"=>"form-horizontal","id"=>"profile-edit-form",));?>

<fieldset>
    <div class="col-md-6">

        <div class="form-group">
			<?php echo Form::label('First name','firstname',array('class'=>'control-label'));?>

			<?php echo Form::input('firstname',Input::post('firstname',isset($fitner)?$fitner->firstname:''),array('class'=>'col-md-8 form-control','placeholder'=>'First name'));?>

        </div>
        <div class="form-group">
			<?php echo Form::label('Last name','lastname',array('class'=>'control-label'));?>

			<?php echo Form::input('lastname',Input::post('lastname',isset($fitner)?$fitner->lastname:''),array('class'=>'col-md-8 form-control','placeholder'=>'Last name'));?>

        </div>

        <div class="form-group">
			<?php echo Form::label('Address','address',array('class'=>'control-label'));?>
			<?php echo Form::input('address',Input::post('address',isset($fitner)?$fitner->address:''),array('class'=>'col-md-8 form-control','placeholder'=>'Address'));?>

        </div>
        <div class="form-group">
			<?php echo Form::label('Phone','phone',array('class'=>'control-label'));?>
			<?php echo Form::input('phone',Input::post('state',isset($fitner)?$fitner->phone:''),array('class'=>'col-md-8 form-control','placeholder'=>'phone'));?>

        </div>
    </div>

    <!--    <div class="form-group">
            <label class='control-label'>&nbsp;</label>
	<?php //echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>-->
</fieldset>
<?php echo Form::close();?>
   