<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="span8 columns well">
	<div class="page-header">
		<h1>Mis últimas Canciones</h1>
	</div>

	<table class="table table-condensed">
		<thead>
	    <tr>
	      <th>#</th>
	      <th>Título</th>
	      <th>Artísta</th>
	      <th>Fecha de súbida</th>
	    </tr>
	  </thead>
		<?php foreach ($songs as $song): ?>
		<tr>
			<td><?php echo h($song['Song']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($song['Song']['title'], array('controller' => 'songs', 'action' => 'view', $song['Song']['id'])); ?>
			<td>
				<?php echo $this->Html->link($song['Artist']['name'], array('controller' => 'artists', 'action' => 'view', $song['Artist']['id'])); ?>
			</td>
			<td><?php echo $song['Song']['created']; ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="pagination">
	<?php
		echo $this->Paginator->prev('<< ' . __(''), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('') . ' >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
