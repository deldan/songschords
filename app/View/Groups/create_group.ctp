<div class="users form well span6 offset2">
<?php echo $this->Form->create('Group', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Crear grupo'); ?></legend>
	<?php
		echo $this->TwitterBootstrap->input('name', array('label' => __('Nombre del grupo') ,'size' => '40', 'minlength'=> '4', 'maxlength' => '50'));
	?>
	</fieldset>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary"><? echo __('Crear grupo');?></button>
    </div>
<?php echo $this->Form->end();?>
</div>