<div class="concerts index">
	<h2><?php echo __('Concerts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('data');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($concerts as $concert): ?>
	<tr>
		<td><?php echo h($concert['Concert']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($concert['Group']['name'], array('controller' => 'groups', 'action' => 'view', $concert['Group']['id'])); ?>
		</td>
		<td><?php echo h($concert['Concert']['name']); ?>&nbsp;</td>
		<td><?php echo h($concert['Concert']['data']); ?>&nbsp;</td>
		<td><?php echo h($concert['Concert']['created']); ?>&nbsp;</td>
		<td><?php echo h($concert['Concert']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $concert['Concert']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $concert['Concert']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $concert['Concert']['id']), null, __('Are you sure you want to delete # %s?', $concert['Concert']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

