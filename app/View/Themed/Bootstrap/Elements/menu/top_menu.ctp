<?php

	$current_page = $this->params['action'];

?>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#" data-bitly-type="bitly_hover_card">Songs</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li <?php if($current_page=="songs"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Canciones', array('controller' => 'app', 'action' => 'songs')); ?>
					</li>
					<li <?php if($current_page=="register"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Registrarse', '/registro'); ?>
					</li>
					<li <?php if($current_page=="loguin"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Loguearse', '/login'); ?>
					</li>
				</ul>
				<form class="navbar-search pull-left" action="">
		            <input type="text" class="search-query span2" placeholder="Buscar canciones" x-webkit-speech="">
		        </form>
			</div>
		</div>
	</div>
</div>