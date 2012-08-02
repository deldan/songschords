<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="span8 columns well">
	<div class="page-header">
		<h1><?php echo __('Canciones Favoritas:');?></h1>
	</div>

	<table class="table table-condensed">
		<thead>
	    <tr>
	      <th><?php echo __('Título:');?></th>
	      <th><?php echo __('Fecha de subida:');?></th>
	      <th><?php echo __('Acciones:');?></th>
	    </tr>
	  </thead>
		<?php foreach ($songs as $song): ?>
		<tr>
			<td><?php echo $this->Html->link($song['title'], array('controller' => 'songs', 'action' => 'view', $song['id'])); ?>
			<td><?php echo $song['created']; ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->element('user_actions',array('controller' => 'songs', 'view' => 'view', 'edit' => 'edit', 'delete' => 'delete', 'id' => $song['id'], 'messagedelete' => $song['title'], 'user_id' => $song['user_id'])); ?>
				</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
</div>
