<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>

	<div class="span8 columns well">
		<div class="page-header">
			<h1>Mis grupos</h1>
		</div>

		<table class="table table-condensed">
			<thead>
		    <tr>
		      <th>Grupos</th>
		      <th>Fecha de subida</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>
			<?php foreach ($usergroups as $group): ?>
			<tr>
				<td><?php echo $this->Html->link($group['groups']['name'], array('controller' => 'groups', 'action' => 'view', $group['groups']['id'])); ?>
				<td><?php echo $group['groups']['created']; ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->element('group_actions',array('controller' => 'concerts', 'createConcert' => 'createConcert','delete' => 'delete', 'id' => $group['groups']['id'], 'messagedelete' => $group['groups']['name'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>