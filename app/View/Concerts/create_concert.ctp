<div class="concerts form">
<?php echo $this->Form->create('Concert');?>
	<fieldset>
		<legend><?php echo __('Agregar concierto'); ?></legend>
	<?php
		echo $this->Form->input('group_id',array('label' => __('Id del grupo')));
		echo $this->Form->input('name');
		echo $this->Form->input('data');
		echo $this->Form->input('Song');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
