<? $this->start('topbar') ?>
  <?= $this->element('user_top', array('name' => $currentUser)) ?>
<? $this->end() ?>

<? $this->start('sidebar') ?>
  <?= $this->element('user_bar') ?>
<? $this->end() ?>


<div class="concerts form well span8">
<?php echo $this->Form->create('Concert');?>
	<fieldset>
		<legend><?php echo __('Agregar concierto'); ?></legend>



		<div class="input select">
			<label for="ConcertGroupId">Id del grupo</label>
			<select name="data[Concert][group_id]" id="ConcertGroupId">
				<?php
					foreach($groups as $group){
						echo '<option value="'.$group['groups']['id'].'">'.$group['groups']['name'].'</option>';
					}
				?>
				
			</select>
		</div>



	<?php
		echo $this->Form->input('name', array('label' => __('Nombre del concierto')));
		echo $this->Form->input('data', array('label' => __('Nombre del fecha')));
		echo $this->Form->input('Song', array('label' => __('Canciones')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
