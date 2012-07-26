<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="songs form well span8 columns">
<?php echo $this->Form->create('Song');?>
	<fieldset>
		<legend><?php echo __('Editar canción'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('label'=>__('Título')));
		echo $this->Form->input('song',array('style'=>'width:450px; height:350px;', 'label'=>__('Letra')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
</div>
