<? $this->start('topbar') ?>
  <?= $this->element('song_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('song_bar') ?>
<? $this->end() ?>

<div class="row">
	<div class="span9 columns">
		<div id="song">
			<pre>
				<?php echo $song['Song']['song']; ?>
			</pre>
			<div id="jtab">
			</div>
		</div>
		<section class="page-header">
			<h1>Comentarios</h1>
		</section>
		<div id="comments">
			<div class="well">
				<div class="row">
				  <div class="span1">
				  	<a href="#" class="thumbnail">
				      	<img src="<?php echo $this->Html->url("/");?>img/user.png" alt="user">
				    </a>
				</div>
				<div class="span5">
				<blockquote>
					La canción me ha gustado, donde puedo conseguir el mp3?
					<small>deldan</small>
				</blockquote>
				</div>
				</div>
			</div>
			<div class="well">
			 	<div class="row">
				  <div class="span1">
				  	<a href="#" class="thumbnail">
				      	<img src="<?php echo $this->Html->url("/");?>img/user.png" alt="user">
				    </a>
				</div>
				<div class="span5">
				<blockquote>
					Los acordes están mal puestos porfavor revisarlos
					<small>yises</small>
				</blockquote>
				</div>
				</div>
			</div>
		</div>
		<div id="comment">
			<form class="form-horizontal">
			  <fieldset>
			    <legend>Comentar</legend>
			    <div class="control-group">
		            <label class="control-label" for="textarea">Comentario:</label>
		            <div class="controls">
		              <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
		            </div>
		        </div>
		        <div class="form-actions">
		            <button type="submit" class="btn btn-primary">Comentar</button>
		            <button class="btn">Cancelar</button>
		        </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
