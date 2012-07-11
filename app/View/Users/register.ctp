<div class="users form well span6 offset2">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Registrar'); ?></legend>
	<?php
		echo $this->TwitterBootstrap->input('email', array('label' => __('Email') , 'type' => 'email'));
		echo $this->TwitterBootstrap->input('username', array('label' => __('Usuario') ,'size' => '40', 'minlength'=> '4', 'maxlength' => '50'));
		echo $this->TwitterBootstrap->input('password', array('label' => __('Contraseña') ,'size' => '40', 'type' => 'password', 'id' => 'password'));
		echo $this->TwitterBootstrap->input('confirm_password', array('label' => __('Repetir contraseña') ,'size' => '40', 'type' => 'password' , 'id' => 'confirm_password'));
		echo $this->TwitterBootstrap->input('service', array('label' => 'Acepto los términos del servicio', 'type' =>'checkbox'));
	?>
	</fieldset>
	<div class="form-actions">
	    <button type="submit" class="btn btn-primary"><? echo __('Registrar');?></button>
    </div>
<?php echo $this->Form->end();?>
</div>