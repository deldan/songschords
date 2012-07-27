<? $this->start('topbar') ?>
  <?= $this->element('song_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('song_bar') ?>
<? $this->end() ?>

<div class="row">
	<div class="span9 columns">
		<div id="song">
			<pre><?php echo $song['Song']['song']; ?></pre>
			<div id="jtab">
			</div>
		</div>
		<div id="comment">
			<form class="form-horizontal">
			  <fieldset>
			    <legend>¿Todo bien?</legend>
		        <div class="form-actions">
		        	<?php echo $this->Html->link('<button type="submit" class="btn btn-primary">Confirmar</button>', "/users/profile/",array('escape' => false)); ?>
		        	<?php echo $this->Html->link('<button class="btn">Editar</button>', "/songs/edit/".$song['Song']['id'],array('escape' => false)); ?>
		        </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
