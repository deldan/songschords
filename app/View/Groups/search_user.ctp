<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>


<div class="users form well span8">
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