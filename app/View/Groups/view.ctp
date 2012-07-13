<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>


<div class="groups view form well span8">
	
	<h1><?php echo h($group['Group']['name']); ?></h1>
	<br>
	<h3><?php echo __('Componentes del grupo');?></h3>
	<?php if (!empty($group['User'])):?>
	<table class="table table-condensed">
	<tr>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Nombre de usuario'); ?></th>
		<th><?php echo __('Creado'); ?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li>
    			<a href="<?= $this->Html->url("/");?>groups/searchUser/<?php echo $group['Group']['id'] ?>"> Añadir miembro</a>
    		</li>
		</ul>
	</div>

		<h3><?php echo __('Conciertos');?></h3>
		<?php if (!empty($group['Concert'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Group Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Data'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($group['Concert'] as $concert): ?>
			<tr>
				<td><?php echo $concert['id'];?></td>
				<td><?php echo $concert['group_id'];?></td>
				<td><?php echo $concert['name'];?></td>
				<td><?php echo $concert['data'];?></td>
				<td><?php echo $concert['created'];?></td>
				<td><?php echo $concert['modified'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'concerts', 'action' => 'view', $concert['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'concerts', 'action' => 'edit', $concert['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'concerts', 'action' => 'delete', $concert['id']), null, __('Are you sure you want to delete # %s?', $concert['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo concierto'), array('controller' => 'concerts', 'action' => 'createConcert'));?> </li>
		</ul>
	</div>
</div>
