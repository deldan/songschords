<div class="row">
	<div class="span12 columns">
		<div class="hero-unit">
			<h1><?php echo $user['User']['username']; ?></h1>
		</div>
	</div>
	<div class="span3 columns">
		<div class="well">
			<ul class="nav nav-list">
				<li>
					<a href="#">
					  <i class="icon-plus-sign"></i>
					  Crear Canción
					</a>
					<a href="<?= $this->Html->url("/");?>groups/create_group">
					  <i class="icon-plus-sign"></i>
					  Crear Grupo
					</a>
					<a href="#">
					  <i class="icon-plus-sign"></i>
					  Crear Bolo
					</a>
					<a href="<?= $this->Html->url("/");?>groups/manage_group">
					  <i class="icon-th-list"></i>
					  Gestionar Grupos
					</a>
					<a href="#"  id="print">
					  <i class="icon-th-list"></i>
					  Gestionar Bolos
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="span9 columns">
		<section class="page-header">
			<h1>Mis últimas Canciones</h1>
		</section>

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
</div>