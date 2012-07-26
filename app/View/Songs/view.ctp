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
		<section class="page-header">
			<h1><?php echo __('Comentarios');?></h1>
		</section>
		<div id="comments">
		    <?php foreach ($comentarios as $comentario): ?>
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
		</div>
		<div id="comment">
			<?php echo $this->Form->create('Comment', array('action' => 'addComment')); ?>
			  <fieldset>
			    <legend><?php echo __('Add Comment');?></legend>
			    <div class="control-group">
		            <div class="controls">
		              <?php	echo $this->Form->input('body', array('label'=>__('Text'), 'rows' => '3'));?>
		              <?php	echo $this->Form->input('song_id', array('value' => $song['Song']['id'], 'type' => 'hidden'));?>
		            </div>
		        </div>
		        <div class="form-actions">
		            <?php	echo $this->Form->end(__('Save Comment')); ?>
		        </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
