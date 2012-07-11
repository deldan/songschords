	<div class="span9 columns">
		<section class="page-header">
			<h1>Mis grupos</h1>
		</section>

		<table class="table table-condensed">
			<thead>
		    <tr>
		      <th>#</th>
		      <th>Grupos</th>
		      <th>Fecha de súbida</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>
			<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($group['Group']['name'], array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])); ?>
				<td><?php echo $group['Group']['created']; ?>&nbsp;</td>
				<td>	
					<div class="form-actions">
	    				<li><?php echo $this->Form->postLink(__('Borrar grupo'), array('action' => 'delete', $group['Group']['id']), null, __('¿Estás seguro de que quieres eliminar al grupo %s?', $group['Group']['name'])); ?> </li>
	    				<li><?php echo $this->Html->link(__('Añadir bolo'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
    					<li><a href="<?= $this->Html->url("/");?>groups/search_user/<?php echo $group['Group']['id'] ?>">Añadir gente</li>
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