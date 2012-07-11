<div class="users form well span6 offset2">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Añadir usuario'); ?></legend>
	<?php
		echo $this->TwitterBootstrap->input('email', array('label' => __('Email') ,'size' => '40', 'minlength'=> '4', 'maxlength' => '50'));
		echo $this->Form->input('groupid', array('value' => $groupid, 'type' => 'hidden' ));
	?>
	</fieldset>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary"><? echo __('Añadir');?></button>
    </div>
<?php echo $this->Form->end();?>
</div>