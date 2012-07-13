<div class="concerts view">
<h2><?php  echo __('Concert');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concert['Group']['name'], array('controller' => 'groups', 'action' => 'view', $concert['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concert'), array('action' => 'edit', $concert['Concert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concert'), array('action' => 'delete', $concert['Concert']['id']), null, __('Are you sure you want to delete # %s?', $concert['Concert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Songs'), array('controller' => 'songs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Song'), array('controller' => 'songs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Songs');?></h3>
	<?php if (!empty($concert['Song'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Artist Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Song'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($concert['Song'] as $song): ?>
		<tr>
			<td><?php echo $song['id'];?></td>
			<td><?php echo $song['artist_id'];?></td>
			<td><?php echo $song['user_id'];?></td>
			<td><?php echo $song['title'];?></td>
			<td><?php echo $song['song'];?></td>
			<td><?php echo $song['created'];?></td>
			<td><?php echo $song['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'songs', 'action' => 'view', $song['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'songs', 'action' => 'edit', $song['id'])); ?>
				<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'songs', 'action' => 'delete', $song['id']), null, __('¿Estás seguro de que quieres borrar # %s?', $song['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Song'), array('controller' => 'songs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
