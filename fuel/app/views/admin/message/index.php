<h2>Listing Messages</h2>
<br>
<?php if ($messages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($messages as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<?php echo Html::anchor('admin/message/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/message/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/message/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/message/create', 'Add new Message', array('class' => 'btn btn-success')); ?>

</p>
