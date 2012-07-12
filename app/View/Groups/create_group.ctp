<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="users form well span8 columns">
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