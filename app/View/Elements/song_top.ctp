<div class="span12 columns">
	<div class="hero-unit">
		<h1><?php echo $song['Song']['title']; ?></h1>
		<p><?php echo $this->Html->link($song['Artist']['name'], array('controller' => 'artists', 'action' => 'view', $song['Artist']['id'])); ?></p>
	</div>
</div>