<div class="panel panel-default">
    <h2 class="panel-heading panel-title"><?php echo __('Banners'); ?></h2>
    <div class="panel-body">
        <div class="toolbarMenu">
            <?php echo $this->Html->link(__('Thêm mới'), array('action' => 'add'), array('class' => 'btn btn-danger btn-sm')); ?>                    </div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                                            <th>id</th>
                                            <th>terms</th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>image</th>
                                            <th>description</th>
                                            <th>published</th>
                                            <th>params</th>
                                            <th>created</th>
                                        <th class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($banners as $banner): ?>
	<tr>
		<td><?php echo h($banner['Banner']['id']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['terms']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['title']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['slug']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['image']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['description']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['published']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['params']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem'), array('action' => 'view', $banner['Banner']['id']), array('class'=>'btn btn-info btn-xs')); ?>
			<?php echo $this->Html->link(__('Sửa'), array('action' => 'edit', $banner['Banner']['id']), array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'btn btn-danger btn-xs'), __('Bạn có chắc chắn muốn xóa %s?', $banner['Banner']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
        </table>
        <?php echo $this->element('backend/pagination'); ?>    </div>
</div>
