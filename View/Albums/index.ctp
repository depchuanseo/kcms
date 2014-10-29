<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Albums'); ?></h2>
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
                                            <th>published</th>
                                            <th>meta_title</th>
                                            <th>meta_keywords</th>
                                            <th>meta_description</th>
                                            <th>created</th>
                                            <th>modified</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
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
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $album['Album']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $album['Album']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $album['Album']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $album['Album']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
