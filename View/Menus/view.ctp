<div class="menus view">
<h2><?php echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Links'); ?></h3>
	<?php if (!empty($menu['Link'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Menu Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($menu['Link'] as $link): ?>
		<tr>
			<td><?php echo $link['id']; ?></td>
			<td><?php echo $link['menu_id']; ?></td>
			<td><?php echo $link['title']; ?></td>
			<td><?php echo $link['slug']; ?></td>
			<td><?php echo $link['link']; ?></td>
			<td><?php echo $link['published']; ?></td>
			<td><?php echo $link['created']; ?></td>
			<td><?php echo $link['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'links', 'action' => 'view', $link['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'links', 'action' => 'edit', $link['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'links', 'action' => 'delete', $link['id']), null, __('Are you sure you want to delete # %s?', $link['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Link'), array('controller' => 'links', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
