<section id="register">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span class="pull-right"><a href="<?php echo Uri::create('user/logout');?>">Logout</a></span>
				<h3> User Dashboard </h3>

			</div>

			<div class="col-md-4">
				<article style="text-align: center;">
					<span class="pull-right"><a href="#" id="edit-profile">Edit Profile</a></span>
					<h3> User Profile </h3>
					<div id="profile-img" title="click to change profile image.">
						<?php if(!empty($user_profile_img)):?>
							<img  style="width:60%; cursor:pointer;" src="<?php echo Uri::create($user_profile_img);?>">

						<?else:?>
							<img style="width:60%; cursor:pointer;" src="<?php echo Uri::create('assets/img/profile.jpg');?>">
						<?php endif;
						?>
					</div>
					<form id="profile-image-form">
						<input type="file" style="display:none" name="profile-img" id="profile-img-file"/>
					</form>
					<p><br/>
						<?php
						echo $user_profile->name.'<br/>'.
						$user_profile->address.'<br/>'.
						'Contact:'.$user_profile->phone.'<br/>
						Email: '.$user_profile->email;
						?>
					</p>



				</article>
			</div>

			<div class="col-md-8">
				<h3> Properties Listings.</h3>
				<?php if(!empty($properties)):?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Property No.</th>
								<th>Name</th>
								<th>Status</th>
								<th>Purpose </th>
								<th> Found By/ property owner </th>
								
	<!--								<th>Package </th>
								<th>Total Views Counts</th>
								<th>Action</th>-->
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($properties as $property):
								echo '<tr>
									<td>'.'1'.'</td>
									<td>'.$property->propertyno.'</td>
									<td>'.$property->name.'</td>
									<td>'.$property->status.'</td>
									<td>'.$property->purpose_name.'</td>
									<td> Name </td>
									<td>'.'<a href="'.Uri::create('user/property/preview/'.$property->id).'">Preview</a>'.'</td>
								</tr>';
							endforeach;
							?>
						</tbody>
					</table>
					<?php
				else:
					echo "No Properties posted yet.";
				endif;
				?>
				<a href="<?php echo Uri::create('user/property/create');?>">Add New Property.</a>
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


<!-- Modal -->
<div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">

                    Modal title

                </h4>
            </div>

            <div id="modal-error">

            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button " class="btn btn-primary modal-submit">Save changes</button>
            </div>
        </div>
    </div>
</div>

