<?php foreach ($comments as $comentario): ?>
	<div class="well">
		<div class="row">
		  <div class="span1">
		  	<a href="#" class="thumbnail">
		      	<?php echo $this->Gravatar->image($comentario['User']['email'], array('size' => 50));?>
		    </a>
		</div>
		<div class="span5">
		<blockquote>
			<?php echo $comentario['Comment']['body']; ?>
			<small><?php echo $comentario['User']['username']; ?></small>
		</blockquote>
		</div>
		</div>
	</div>
<?php endforeach; ?>