<div class="users form well span6 offset2">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
	<?php
		echo $this->TwitterBootstrap->input('username', array('label' => __('Usuario') ,'size' => '40', 'minlength'=> '4', 'maxlength' => '50'));
		echo $this->TwitterBootstrap->input('password', array('label' => __('Contraseña') ,'size' => '40', 'type' => 'password', 'id' => 'password'));
	?>
	</fieldset>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary"><? echo __('Login');?></button>
	    <?php $linktext = "He olvidado mi contraseña"; ?>
		<?php echo $this->Html->link($linktext, array('controller'=>'users', 'action'=>'resetUserPassword'),array('id' => 'forgetpasswordlink'));
	?>
    </div>
<?php echo $this->Form->end();?>
</div>