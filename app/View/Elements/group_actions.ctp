<?  if(isset($currentUserId)):?>
	<i class="icon-music"></i>
		<?php echo $this->Html->link(__('Añadir bolo'), array('controller' => $controller, 'action' => $createConcert)); ?>
	<i class="icon-retweet"></i>
		<a href="<?= $this->Html->url("/");?>groups/searchUser/<?php echo $id ?>"> <?php echo __('Añadir gente');?>
	<?echo $this->Form->postLink('<i class="icon-remove"></i>', array('action' => 'delete', $id), array('escape' => false), __('¿Estás seguro de que quieres borrar %s?', $messagedelete));?>
<?  endif ;?>