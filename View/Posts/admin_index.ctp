<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Posts'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>            		<?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index'), array('class' => 'btn btn-info btn-sm')); ?> </li>
		<?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-warning btn-sm')); ?> </li>
        </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>category_id</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>image</th>
                                            <th>description</th>
                                            <th>meta_title</th>
                                            <th>meta_keywords</th>
                                            <th>meta_description</th>
                                            <th>published</th>
                                            <th>terms</th>
                                            <th>created</th>
                                            <th>modified</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['Category']['title'], array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['slug']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['image']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['description']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['meta_description']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['published']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['terms']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $post['Post']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $post['Post']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $post['Post']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $post['Post']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
