<div class="span3 columns">
	<div class="well">
		<ul class="nav nav-list">
			<li>
				<a href="#" id="plus">
				  <i class="icon-plus"></i>
				  <?php echo __('Subir tono');?>
				</a>
				<a href="#" id="minus">
				  <i class="icon-minus"></i>
				  <?php echo __('Bajar tono');?>
				</a>
				<a href="#"  id="print">
				  <i class="icon-print"></i>
				  <?php echo __('Imprimir canción');?>
				</a>
				<a href="<?php echo $song['Song']['id'];?>.pdf">
				  <i class="icon-download"></i>
				  <?php echo __('Descargar');?>
				</a>
				<a href="<?php echo $song['Song']['id'];?>" id="favorite">
					<? $class="icon-star-empty";?>
					<? foreach($song['SongFavorite'] as $favorite):?>
						<? if($favorite['id'] == $currentUserId): ?>
							<? $class="icon-star";?>
						<? endif;?>
					<? endforeach;?>
				  <i class="<? echo $class;?>"></i>
				  <?php echo __('Guardar como favorito');?>
				</a>
			</li>
		</ul>
	</div>
</div>