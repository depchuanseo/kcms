<div class="albumsimages view">
<h2><?php echo __('Albumsimage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($albumsimage['Albumsimage']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Albumsimage'), array('action' => 'edit', $albumsimage['Albumsimage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Albumsimage'), array('action' => 'delete', $albumsimage['Albumsimage']['id']), null, __('Are you sure you want to delete # %s?', $albumsimage['Albumsimage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albumsimages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albumsimage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
