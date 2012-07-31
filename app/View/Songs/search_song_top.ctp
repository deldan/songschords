<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<div class="span8 columns well">
	<div class="page-header">
		<h1><?php echo __('Resultados de la búsqueda:');?></h1>
	</div>

	<table class="table table-condensed">
		<thead>
	    <tr>
	      <th><?php echo __('Título:');?></th>
	      <th><?php echo __('Artista:');?></th>
	      <!-- <th><?php echo __('Usuario:');?></th> -->
	      <th><?php echo __('Fecha:');?></th>
	    </tr>
	  </thead>
		<?php foreach ($results as $song): ?>
		<tr>
			<td><?php echo $this->Html->link($song['Song']['title'], array('controller' => 'songs', 'action' => 'view', $song['Song']['id'])); ?>
			<td>
				<?php echo $this->Html->link($song['Artist']['name'], array('controller' => 'artists', 'action' => 'view', $song['Song']['artist_id'])); ?>
			</td>
			<td><?php echo $song['Song']['created']; ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
