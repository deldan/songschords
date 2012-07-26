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
		echo $this->Form->input('name',array('label'=>__('Artista'), 'id' => 'query_artist'));
		echo $this->Form->input('title',array('label'=>__('Título'), 'id' => 'query_song'));
		echo $this->Form->input('song',array('style'=>'width:450px; height:350px;', 'label'=>__('Letra')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>