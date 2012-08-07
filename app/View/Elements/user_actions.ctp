<?php echo $this->Html->link('<i class="icon-eye-open"></i>', array('controller' => $controller, 'action' => $view, $id),array('escape' => false)); ?>

<?  if(isset($currentUserId)):?>
	<? if($currentUserId === $user_id):?>
		<?  echo $this->Html->link('<i class="icon-edit"></i>', array('controller' => $controller, 'action' => $edit, $id),array('escape' => false)); ?>
		<?  echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => $controller, 'action' => $delete, $id), array('escape' => false), __('¿Estás seguro de que quieres borrar %s?', $messagedelete)); ?>
	<?  endif ;?>
<?  endif ;?>