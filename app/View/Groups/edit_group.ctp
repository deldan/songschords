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
		      <th>#</th>
		      <th>Grupos</th>
		      <th>Fecha de subida</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>
			<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($group['Group']['name'], array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])); ?>
				<td><?php echo $group['Group']['created']; ?>&nbsp;</td>
				<td>	
					<div>	    			
	    				<i class="icon-music"></i>
	    					<?php echo $this->Html->link(__('Añadir bolo'), array('controller' => 'concerts', 'action' => 'createConcert')); ?>
    					<i class="icon-retweet"></i>
    						<a href="<?= $this->Html->url("/");?>groups/searchUser/<?php echo $group['Group']['id'] ?>"> <?php echo __('Añadir gente');?>
    					<i class="icon-remove"></i>
	    					<?php echo $this->Form->postLink(__('Borrar grupo'), array('action' => 'delete', $group['Group']['id']), null, __('¿Estás seguro de que quieres eliminar al grupo %s?', $group['Group']['name'])); ?>
    				</div>
    			</td>
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