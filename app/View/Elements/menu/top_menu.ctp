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
						<?php echo $this->Html->link(__('Canciones'), array('controller' => 'songs', 'action' => 'principal')); ?>
					</li>
					<? if(!$currentUser): ?>
					<li <?php if($current_page=="registro"){echo'class="active"';} ?>>
						<?php echo $this->Html->link(__('Registrarse'), '/registro'); ?>
					</li>
					<? endif;?>
					<li<?php if($current_page=="loguin"){echo'class="active"';} ?>>
						<a href="<?= $this->Html->url("/");?>users/profile"><?= $currentUser; ?></a>
						<li>
							<? if($currentUser): ?> <a href="<?= $this->Html->url("/");?>users/logout"><?php echo __('Logout');?></a></li>
						<? else : ?>
							<?php echo $this->Html->link(__('Loguearse'), '/login'); ?>
						<? endif;?>
					</li>
					<li>
						<? 
						if(isset($this->params['pass'][0])){
							echo $this->Html->link(
								$this->Html->image("esp-flag.png"),
								array('language'=>'esp', $this->params['pass'][0]),
								array('escape' => false) );
						}else{
							echo $this->Html->link($this->Html->image("esp-flag.png"),
							array('language'=>'esp'),
							array('escape' => false) );
						}
						?></li>
					<li>
						<?
						if(isset($this->params['pass'][0])){
							echo $this->Html->link(
								$this->Html->image("eng-flag.png"),
								array('language'=>'eng', $this->params['pass'][0]),
								array('escape' => false) );
						}else{
							echo $this->Html->link($this->Html->image("eng-flag.png"),
							array('language'=>'eng'),
							array('escape' => false) );
						}
						?></li>
				</ul>

				<?  echo $this->Form->create('Song', array(
					'url' => array('controller' => 'songs', 'action' => 'searchSongTop'),
			        'class' => 'navbar-search pull-left')
				);?>
		            <input name="data[Song][search]" type="text" class="search-query span2" placeholder=<?php echo __('Buscar');?> x-webkit-speech="">
		        </form>

			</div>
		</div>
		<ul class="right">
		</ul>
	</div>
</div>