<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($category['Category']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($category['Category']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keywords'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Description'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Template'); ?></dt>
		<dd>
			<?php echo h($category['Category']['template']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terms'); ?></dt>
		<dd>
			<?php echo h($category['Category']['terms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($category['Album'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keywords'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Album'] as $album): ?>
		<tr>
			<td><?php echo $album['id']; ?></td>
			<td><?php echo $album['category_id']; ?></td>
			<td><?php echo $album['title']; ?></td>
			<td><?php echo $album['slug']; ?></td>
			<td><?php echo $album['image']; ?></td>
			<td><?php echo $album['description']; ?></td>
			<td><?php echo $album['published']; ?></td>
			<td><?php echo $album['meta_title']; ?></td>
			<td><?php echo $album['meta_keywords']; ?></td>
			<td><?php echo $album['meta_description']; ?></td>
			<td><?php echo $album['created']; ?></td>
			<td><?php echo $album['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albums', 'action' => 'view', $album['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albums', 'action' => 'edit', $album['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albums', 'action' => 'delete', $album['id']), null, __('Are you sure you want to delete # %s?', $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($category['Post'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keywords'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Terms'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['category_id']; ?></td>
			<td><?php echo $post['title']; ?></td>
			<td><?php echo $post['slug']; ?></td>
			<td><?php echo $post['image']; ?></td>
			<td><?php echo $post['description']; ?></td>
			<td><?php echo $post['meta_title']; ?></td>
			<td><?php echo $post['meta_keywords']; ?></td>
			<td><?php echo $post['meta_description']; ?></td>
			<td><?php echo $post['published']; ?></td>
			<td><?php echo $post['terms']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($category['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Price Sales'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keywords'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['category_id']; ?></td>
			<td><?php echo $product['title']; ?></td>
			<td><?php echo $product['slug']; ?></td>
			<td><?php echo $product['image']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['price_sales']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['published']; ?></td>
			<td><?php echo $product['meta_title']; ?></td>
			<td><?php echo $product['meta_keywords']; ?></td>
			<td><?php echo $product['meta_description']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
