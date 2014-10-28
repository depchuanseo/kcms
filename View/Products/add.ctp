<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('image');
		echo $this->Form->input('price');
		echo $this->Form->input('price_sales');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
