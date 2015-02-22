<h2>Viewing #<?php echo $message->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $message->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $message->email; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $message->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $message->description; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $message->status; ?></p>

<?php echo Html::anchor('admin/message/edit/'.$message->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/message', 'Back'); ?>