<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Categories'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>            		<?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>image</th>
                                            <th>description</th>
                                            <th>published</th>
                                            <th>meta_title</th>
                                            <th>meta_keywords</th>
                                            <th>meta_description</th>
                                            <th>template</th>
                                            <th>terms</th>
                                            <th>created</th>
                                            <th>modified</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['slug']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['image']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['description']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['published']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['meta_description']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['template']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['terms']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $category['Category']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $category['Category']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
