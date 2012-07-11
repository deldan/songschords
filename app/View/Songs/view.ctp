<div class="row">
	<div class="span12 columns">
		<div class="hero-unit">
			<h1><?php echo $song['Song']['title']; ?></h1>
			<p><?php echo $this->Html->link($song['Artist']['name'], array('controller' => 'artists', 'action' => 'view', $song['Artist']['id'])); ?></p>
		</div>
	</div>
	<div class="span3 columns">
		<div class="well">
			<ul class="nav nav-list">
				<li>
					<a href="#" id="plus">
					  <i class="icon-plus"></i>
					  Subir tono
					</a>
					<a href="#" id="minus">
					  <i class="icon-minus"></i>
					  Bajar tono
					</a>
					<a href="#"  id="print">
					  <i class="icon-print"></i>
					  Imprimir canción
					</a>
					<a href="#">
					  <i class="icon-download"></i>
					  Descargar
					</a>
					<a href="#" id="favorite">
					  <i class="icon-star-empty"></i>
					  Guardar como favorito
					</a>
				</li>
			</ul>
		</div>
	</div>
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
