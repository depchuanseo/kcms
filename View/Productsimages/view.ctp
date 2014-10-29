<div class="productsimages view">
<h2><?php echo __('Productsimage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($productsimage['Productsimage']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Productsimage'), array('action' => 'edit', $productsimage['Productsimage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Productsimage'), array('action' => 'delete', $productsimage['Productsimage']['id']), null, __('Are you sure you want to delete # %s?', $productsimage['Productsimage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productsimages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productsimage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
