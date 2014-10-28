<div class="albums view">
<h2><?php echo __('Album'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($album['Album']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($album['Category']['title'], array('controller' => 'categories', 'action' => 'view', $album['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($album['Album']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($album['Album']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($album['Album']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($album['Album']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($album['Album']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($album['Album']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keywords'); ?></dt>
		<dd>
			<?php echo h($album['Album']['meta_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Description'); ?></dt>
		<dd>
			<?php echo h($album['Album']['meta_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($album['Album']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($album['Album']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Album'), array('action' => 'edit', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Album'), array('action' => 'delete', $album['Album']['id']), null, __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
