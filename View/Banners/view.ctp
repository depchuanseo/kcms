<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terms'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['terms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
	</ul>
</div>
