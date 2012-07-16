<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>


<div class="span8 columns well">
	<div class="page-header">
		<h2>Temas de <?php echo h($artist['Artist']['name']); ?>
	</div>

		<table class="table table-condensed">
			<thead>
		    <tr>
		      <th>Título</th>
		      <th>Subida por</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>


		<?php if (!empty($artist['Song'])):?>
		<?php
			$i = 0;
			foreach ($artist['Song'] as $song): ?>
			<tr>
				<td><?php echo $song['title'];?></td>
				<td><?php echo $song['User']['username'];?></td>
				<td class="actions">
					<?php echo $this->element('actions',array('controller' => 'songs', 'view' => 'view', 'edit' => 'edit', 'delete' => 'delete', 'id' => $song['id'], 'messagedelete' => $song['title'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>