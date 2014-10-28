<div class="albums index">
	<h2><?php echo __('Albums'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_title'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($albums as $album): ?>
	<tr>
		<td><?php echo h($album['Album']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($album['Category']['title'], array('controller' => 'categories', 'action' => 'view', $album['Category']['id'])); ?>
		</td>
		<td><?php echo h($album['Album']['title']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['slug']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['image']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['description']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['published']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['meta_description']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['created']); ?>&nbsp;</td>
		<td><?php echo h($album['Album']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $album['Album']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $album['Album']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $album['Album']['id']), null, __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
