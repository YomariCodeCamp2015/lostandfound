<h2>Listing <span class='muted'>Properties</span></h2>
<br>
<?php if ($properties): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Beds</th>
			<th>Baths</th>
			<th>Type</th>
			<th>Location</th>
			<th>Maplat</th>
			<th>Matlon</th>
			<th>Propertyno</th>
			<th>Purpose</th>
			<th>View</th>
			<th>Status</th>
			<th>Package</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($properties as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->beds; ?></td>
			<td><?php echo $item->baths; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->location; ?></td>
			<td><?php echo $item->maplat; ?></td>
			<td><?php echo $item->matlon; ?></td>
			<td><?php echo $item->propertyno; ?></td>
			<td><?php echo $item->purpose; ?></td>
			<td><?php echo $item->view; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->package; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('property/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('property/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('property/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Properties.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('property/create', 'Add new Property', array('class' => 'btn btn-success')); ?>

</p>
