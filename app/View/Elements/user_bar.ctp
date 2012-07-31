<?  if(isset($currentUserId)):?>
	<div class="span3 columns">
		<div class="well">
			<ul class="nav nav-list">
				<li>
					<a href="<?= $this->Html->url("/");?>songs/addSong">
					  <i class="icon-plus-sign"></i>
					  <?php echo __('Crear Canción');?>
					</a>
					<a href="<?= $this->Html->url("/");?>groups/createGroup">
					  <i class="icon-plus-sign"></i>
					  <?php echo __('Crear Grupo');?>
					</a>
					<a href="<?= $this->Html->url("/");?>concerts/createConcert">
					  <i class="icon-plus-sign"></i>
					  <?php echo __('Crear Bolo');?>
					</a>
					<a href="<?= $this->Html->url("/");?>groups/editGroup">
					  <i class="icon-th-list"></i>
					  <?php echo __('Gestionar Grupos');?>
					</a>
					<a href="#"  id="print">
					  <i class="icon-th-list"></i>
					  <?php echo __('Gestionar Bolos');?>
					</a>
				</li>
			</ul>
		</div>
	</div>
<?  endif ;?>
