<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="songs form span8 columns well">
<?php echo $this->Form->create('Song');?>
	<fieldset>
		<legend><?php echo __('Añade una canción'); ?></legend>
	<?php
		echo $this->Form->input('artist_id',array('label'=>__('Artista')));
		echo $this->Form->input('title',array('label'=>__('Título')));
		echo $this->Form->input('song',array('label'=>__('Letra de la canción')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

