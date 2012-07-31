<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

<?  if(!isset($currentUserId)):?>
<div class="span11 columns well">
<?  else:?>
<div class="span8 columns well">
<?  endif ;?>
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
				<td><?php echo $this->Html->link($song['title'], array('controller' => 'songs', 'action' => 'view', $song['id'])); ?>
				<td><?php echo $song['User']['username'];?></td>
				<td class="actions">
					<?php echo $this->element('user_actions',array('controller' => 'songs', 'view' => 'view', 'edit' => 'edit', 'delete' => 'delete', 'id' => $song['id'], 'messagedelete' => $song['title'], 'user_id' => $song['user_id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
</div>